<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'My Site Package',
    'description' => 'Site package to follow the tutorial.',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-13.4.99',
            'fluid_styled_content' => '13.4.0-13.4.99',
            'rte_ckeditor' => '13.4.0-13.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'MyVendor\\MySitePackage\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'J. Doe',
    'author_email' => 'j.doe@example.org',
    'author_company' => 'My Vendor',
    'version' => '1.0.0',
];
