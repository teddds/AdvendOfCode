<?php
declare(strict_types=1);

$includes = [
	__DIR__ . '/advent-of-code',
	__DIR__ . '/test',
	__DIR__ . '/utils'
];

$finder = PhpCsFixer\Finder::create();

$finder->in($includes);
$finder->exclude($excludes);

return (new PhpCsFixer\Config())
	->setRiskyAllowed(true)
	->setRules([
		'@PSR2' => true,
		'@PhpCsFixer' => true,
		// '@PhpCsFixer:risky' => true
		'@PHP81Migration' => true,

		'indentation_type' => true,
		'strict_param' => true,
		'no_unused_imports' => true,
		'array_syntax' => ['syntax' => 'short'],
		'no_null_property_initialization' => true,
		'global_namespace_import' => true,

		// zusätzlich von @Symfony
		'trim_array_spaces' => true,
		'ternary_operator_spaces' => true,
		'concat_space' => ['spacing' => 'one'],
		'blank_line_before_statement' => ['statements' => ['return', 'try']], // ohne 'break', 'continue', 'throw', 'declare'

		// feinjustage von @PhpCsFixer
		'phpdoc_summary' => false,
		'phpdoc_separation' => true,
		'phpdoc_to_comment' => false,
		'phpdoc_align' => ['align' => 'left'],
		'yoda_style' => false,
		'blank_line_after_opening_tag' => false,
		'return_assignment' => false,
		'no_superfluous_phpdoc_tags' => false,
		'phpdoc_no_useless_inheritdoc' => true,

		// Feinjustage für PHPUnit
		'php_unit_method_casing' => false,
		'php_unit_test_class_requires_covers' => false,
		'php_unit_dedicate_assert' => true,
		'php_unit_no_expectation_annotation' => true,
		'php_unit_expectation' => true,
		'php_unit_dedicate_assert_internal_type' => true,

		'single_line_comment_style' => ['comment_types' => ['hash']],

		// DocBlocks nicht erweitern, Reduktion ist das Ziel!
		'phpdoc_add_missing_param_annotation' => false,

		'phpdoc_order' => [
			'order' => [
				'param',
				'throws',
				'return',
			],
		],

		'ordered_imports' => [
			'sort_algorithm' => 'alpha',
			'imports_order' => [
				'const',
				'class',
				'function',
			],
		],

		'declare_strict_types' => true,
		'class_definition' => [
			'multi_line_extends_each_single_line' => true,
			'single_line' => false,
		],
	])
	->setIndent("\t")
	->setLineEnding("\n")
	->setFinder($finder)
;
