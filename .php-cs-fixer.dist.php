<?php

declare(strict_types=1);

use ErickSkrauch\PhpCsFixer\Fixers;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude('var');

$erickSkrauchFixers = new Fixers();
new DateTime('now', new DateTimeZone('UTC'));
return (new PhpCsFixer\Config())
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->registerCustomFixers($erickSkrauchFixers)
    ->setRules([
        '@Symfony'                                 => true,
        'binary_operator_spaces'                   => [
            'operators' => [
                '=>' => 'align_single_space',
                '='  => 'align_single_space',
            ],
        ],
        'concat_space'                             => ['spacing' => 'one'],
        'global_namespace_import'                  => [
            'import_classes' => true,
        ],
        'phpdoc_param_order'                       => true,
        'assign_null_coalescing_to_coalesce_equal' => true,
        'method_argument_space'                    => ['on_multiline' => 'ensure_fully_multiline'], // Replaces Symfony's method_argument_space = ['on_multiline' => 'ignore']
        'cast_spaces'                              => ['space' => 'none'],
        'visibility_required'                      => ['elements' => ['property', 'method', 'const']], // Already part of PSR12 but I don't know what's the config
        'trailing_comma_in_multiline'              => [
            'elements' => ['arguments', 'arrays', 'match', 'parameters'],
        ],
        'ErickSkrauch/align_multiline_parameters'  => true,
    ])
    ->setFinder($finder);
