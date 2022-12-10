<?php
declare(strict_types=1);
namespace AdventOfCode\Y2020\Day13\Part2;
$source = '1002632
23,x,x,x,x,x,x,x,x,x,x,x,x,41,x,x,x,x,x,x,x,x,x,829,x,x,x,x,x,x,x,x,x,x,x,x,13,17,x,x,x,x,x,x,x,x,x,x,x,x,x,x,29,x,677,x,x,x,x,x,37,x,x,x,x,x,x,x,x,x,x,x,x,19';
//$source = '939
//7,13,x,x,59,x,31,19';

class Navigator
{
	private const MAX_PARALLEL_PROCESSES = 4;
	private const DEBUG = false;
	/** @var Bus[] */
	private array $busses;
	private int $length;
	private int $start = 0;
	private ?int $ende = null;
	//private int $start = 1001076912749;
	private array $processes = [];
	private int $timestamp = 0;
	private ?int $result = null;
	private string $p_id;
	private static $idCounter = 0;
	private array $_descriptor = [
		0 => ['pipe', 'r'],    // STDIN
		1 => ['pipe', 'w'],    // STDOUT
		2 => ['pipe', 'a'],        // STDERR
	];

	public function __construct(string $input)
	{
		$rows = explode("\n", $input);
		$busses = [];
		foreach (explode(',', $rows[1]) as $key => $id) {
			if ($id === 'x') {
				continue;
			}
			$busses[] = new Bus((int) $id, $key);
		}
		$this->busses = $busses;
		$this->length = count($busses);

		$result = getopt('s:e:n', ['start:', 'ende:', 'name:']);
		if (isset($result['start'])) {
			$this->start = (int) $result['start'];
		}

		if (isset($result['ende'])) {
			$this->ende = (int) $result['ende'];
		}

		if (isset($result['name'])) {
			$this->p_id = $result['name'];
		}
	}

	public function findSequenzTimestamp(): int
	{
		if ($this->start === 0) {
			$this->createInstances();

			return $this->result;
		}

		if (count($this->busses) < 2) {
			return 0;
		}

		usort($this->busses, static fn (Bus $a, Bus $b) => $a->getId() < $b->getId());

		$bus = $this->busses[0];
		$bus->reset($this->start);

		do {
			$timestamp = $bus->getNextDepartTime();
			if ($this->ende && $timestamp > $this->ende) {
				return -1;
			}
			if ($this->checkNextBus($timestamp, 1, true)) {
				break;
			}
		} while (!$this->result);

		return $timestamp;
	}

	public function createProcesses(int $start, int $ende, string $name)
	{
		$path = sprintf('%s', str_replace('ext', 'php.exe', ini_get('extension_dir')));

		if (self::DEBUG) {
			$path .= ' -dxdebug.remote_autostart=1 -dxdebug.remote_enable=1 -dxdebug.remote_mode=req -dxdebug.remote_port=9000 -dxdebug.remote_host=localhost -dxdebug.remote_connect_back=0';
		}

		$path .= ' "' . __FILE__ . '" --start=' . $start . ' --ende=' . $ende. ' --name='.$name;

		$p_id = md5($start . $ende);
		$this->processes[$p_id] = [
			'prozess' => null,
			'pipes' => [],
			'start' => $start,
			'ende' => $ende,
			'log' => '',
		];

		$prozess = proc_open($path, $this->_descriptor, $this->processes[$p_id]['pipes']);
		$this->processes[$p_id]['prozess'] = $prozess;
	}

	private function createInstances(): void
	{
		$delta = 10010769127490;
		$start = 140000000000000;
		//Wir haben die maximale Anzahl an parallelarbeitenen Prozesse erreicht, jetzt heißt es warten (Nur bei MP)
		do {
			$this->createProcesses($start, $start + $delta, 'p_'.self::$idCounter++);
			while (count($this->processes) >= self::MAX_PARALLEL_PROCESSES) {
				sleep(1);
				$this->checkProcesses();
			}
			if ($this->result) {
				break;
			}
			$start += $delta;
		} while (true);
	}

	private function checkProcesses(): void
	{
		foreach ($this->processes as $p_id => $prozess) {
			if (is_resource($prozess['prozess'])) {
				$status = proc_get_status($prozess['prozess']);

				$result =fgets($prozess['pipes'][1], 512);
				if(!empty($result)){
					$result = trim($result, " ");
					$prozess['log'] .= $result;
					echo $result;
				}

				if (!$status['running']) {
					// Prozess aufräumen
					proc_close($prozess['prozess']);
					unset($this->processes[$p_id]);

					if (preg_match('/Lösung: (\d+)$/u', $prozess['log'], $match)) {
						//Lösung gefunden Alle Prozess beenden!
						$this->stopAll();
						$this->result = (int) $match[1];
						break;
					}
				}
			} else {
				unset($this->processes[$p_id]);
			}
		}
	}

	private function stopAll()
	{
		foreach ($this->processes as $p_id => $prozess) {
			if (is_resource($prozess['prozess'])) {
				proc_close($prozess['prozess']);
				unset($this->processes[$p_id]);
			} else {
				unset($this->processes[$p_id]);
			}
		}
	}

	private function checkNextBus(int $timestamp, int $index, $reset = false): bool
	{
		if ($index >= $this->length) {
			return true;
		}

		$zeit = time();
		if ($zeit - $this->timestamp > 1) {
			echo sprintf('[%s] - %s : %u' . "\n", $this->p_id, date('H:i:s'), $timestamp);
			flush();
			$this->timestamp = $zeit;
		}

		$bus = $this->busses[$index];
		if ($reset) {
			$bus->reset($timestamp);
		}

		$departTime = $bus->getNextDepartTime();
		if ($departTime === $timestamp) {
			return $this->checkNextBus($timestamp, ++$index, true);
		}

		if ($departTime > $timestamp) {
			return false;
		}

		return $this->checkNextBus($timestamp, $index, false);
	}
}

class Bus
{
	public array $results = [];
	private int $offset;
	private int $id;
	private int $vielfaches = 1;

	public function __construct(int $id, int $offset)
	{
		$this->id = $id;
		$this->offset = $offset;
	}

	public function reset(int $timestamp): void
	{
		$this->vielfaches = (int) floor(($timestamp + $this->offset) / $this->id);
	}

	public function getNextDepartTime(): int
	{
//		++$this->vielfaches;
//		$this->results[$this->vielfaches] ??= $this->vielfaches * $this->id - $this->offset;
//
//		return $this->results[$this->vielfaches];

		return $this->vielfaches++ * $this->id - $this->offset;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}
}

$navigator = new Navigator($source);
$result = $navigator->findSequenzTimestamp();
if ($result !== -1) {
	echo 'Lösung: ' . $result;
}
