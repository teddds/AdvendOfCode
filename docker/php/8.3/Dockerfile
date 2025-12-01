FROM composer:2.8 AS composer
FROM ubuntu:24.04 AS app

SHELL ["/usr/bin/env", "bash", "-euo", "pipefail", "-O", "extglob", "-c"]

ARG PHP_VERSION=8.3
ARG PHP_FPM_INI_DIR=/etc/php/${PHP_VERSION}/fpm
ARG PHP_CLI_INI_DIR=/etc/php/${PHP_VERSION}/cli

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y --no-install-recommends ca-certificates apt-transport-https \
    && update-ca-certificates

RUN rm -f /etc/apt/apt.conf.d/docker-clean; echo 'Binary::apt::APT::Keep-Downloaded-Packages "true";' > /etc/apt/apt.conf.d/keep-cache;
RUN sed -i 's|http://|https://|g' /etc/apt/sources.list.d/ubuntu.sources


RUN --mount=type=cache,target=/var/cache/apt,sharing=locked \
    --mount=type=cache,target=/var/lib/apt,sharing=locked \
   apt-get update && apt-get --no-install-recommends install -y \
    	curl \
    	gpg-agent \
		software-properties-common;

# Axilaris root CA hinzufügen
ADD --chmod=664 https://pki.axs-net.de/current_axilaris_root.crt /usr/local/share/ca-certificates/axilaris_ca.crt
RUN update-ca-certificates;

RUN --mount=type=cache,target=/var/cache/apt,sharing=locked \
    --mount=type=cache,target=/var/lib/apt,sharing=locked \
   apt-get update && apt-get --no-install-recommends install -y \
		sqlite3 \
		zip \
    	zstd \
		unzip \
		git \
		mariadb-client \
		php${PHP_VERSION} \
		php${PHP_VERSION}-cli \
		php${PHP_VERSION}-fpm \
		php${PHP_VERSION}-bcmath \
		php${PHP_VERSION}-bz2 \
		php${PHP_VERSION}-common \
		php${PHP_VERSION}-curl \
		php${PHP_VERSION}-gd \
		php${PHP_VERSION}-igbinary \
		php${PHP_VERSION}-imagick \
		php${PHP_VERSION}-intl \
		php${PHP_VERSION}-ldap \
		php${PHP_VERSION}-mbstring \
		php${PHP_VERSION}-mysql \
		php${PHP_VERSION}-opcache \
		php${PHP_VERSION}-readline \
		php${PHP_VERSION}-soap \
		php${PHP_VERSION}-sqlite3 \
		php${PHP_VERSION}-tidy \
		php${PHP_VERSION}-xml \
		php${PHP_VERSION}-zip \
		php${PHP_VERSION}-apcu \
		php${PHP_VERSION}-redis \
		php${PHP_VERSION}-phpdbg \
    	php${PHP_VERSION}-xdebug \
    	htop \
    	golang-go \
		gettext; \
	# apcu evtl. bald raus, da Ersatz durch redis \
	ln -s "/usr/sbin/php-fpm${PHP_VERSION}" /usr/local/bin/php-fpm; \
	apt-get autoremove --purge -o APT::AutoRemove::RecommendsImportant=false --quiet --quiet; \
	apt-get clean; \
    	rm -rf /var/lib/apt/lists/!(partial) /var/tmp/* /tmp/*;

RUN go install github.com/mailhog/mhsendmail@latest;
RUN cp /root/go/bin/mhsendmail /usr/local/bin/mhsendmail && chmod +x /usr/local/bin/mhsendmail

# Die Installation von gettext in der gleichen Layer wie die Benutzung von envsubst, \
# macht zu viele Anfragen an das Paket-Repo.
# /usr/share/doc (~1.6MB) könnte man noch löschen

# ===== Composer ========================================
COPY --from=composer /usr/bin/composer /usr/local/bin

# git config --global --bool --add http.https://scm.axilaris.intern.sslVerify false; \
RUN	git config --global core.fileMode false; \
	git config --global --add safe.directory /var/www;

# ===== Nginx & PHP-FPM & xDebug Log ========================================
RUN groupadd -r nginx; \
	useradd -r -g nginx nginx; \
    mkdir -p /run/php && chown -R www-data:www-data /run/php; \
    touch /var/log/xdebug.log && chmod 777 /var/log/xdebug.log;

# ===== Konfigs, die sich häufiger ändern ========================================
COPY 30-settings.ini $PHP_FPM_INI_DIR/conf.d
COPY 30-settings.ini $PHP_CLI_INI_DIR/conf.d
COPY fpm/zz-docker.conf $PHP_FPM_INI_DIR/pool.d/zz-docker.conf
COPY fpm/zz-docker-env.conf $PHP_FPM_INI_DIR/pool.d/zz-docker-env.conf
ARG XDEBUG_LOG_LEVEL=3
ARG XDEBUG_FPM_MODE=debug
ARG XDEBUG_CLI_MODE=debug
ARG XDEBUG_FPM_START_WITH_REQUEST=default
# xdebug.start_with_request auf default belassen,
# Das bedeutet, dass beim Mode debug die Debugging-Session nur startet,
# wenn der Browser einen XDEBUG-Cookie mitsendet.
RUN --mount=source=.,target=/build_context \
	env \
		XDEBUG_MODE="$XDEBUG_FPM_MODE" \
		XDEBUG_START_WITH_REQUEST="$XDEBUG_FPM_START_WITH_REQUEST" \
		XDEBUG_LOG_LEVEL="$XDEBUG_LOG_LEVEL" \
		envsubst < /build_context/fpm/30-xdebug.ini > "$PHP_FPM_INI_DIR/conf.d/30-xdebug.ini"; \
	env \
		XDEBUG_MODE="$XDEBUG_CLI_MODE" \
		XDEBUG_LOG_LEVEL="$XDEBUG_LOG_LEVEL" \
		envsubst < /build_context/cli/30-xdebug.ini > "$PHP_CLI_INI_DIR/conf.d/30-xdebug.ini";

# ===== Letztes ========================================
# Override stop signal to stop process gracefully
STOPSIGNAL SIGQUIT

WORKDIR /var/www
CMD ["php-fpm"]