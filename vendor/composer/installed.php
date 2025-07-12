<?php return array(
    'root' => array(
        'name' => 'task-manager/app',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => '25789000ba947876314d67d057729be60cf761dc',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'squizlabs/php_codesniffer' => array(
            'pretty_version' => '3.13.2',
            'version' => '3.13.2.0',
            'reference' => '5b5e3821314f947dd040c70f7992a64eac89025c',
            'type' => 'library',
            'install_path' => __DIR__ . '/../squizlabs/php_codesniffer',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'task-manager/app' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => '25789000ba947876314d67d057729be60cf761dc',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
