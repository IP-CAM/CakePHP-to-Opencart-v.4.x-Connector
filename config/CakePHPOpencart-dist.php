<?php

return [
    'CakePHPOpencart' => [ // Must match the name of this plugin
        'cartList' => [
            'ABC' => [ // Arbitrary key used as shorthand to this configuration
                'name' => 'ABC Shop', // Display name for this cart/multistore
                'datasource' => 'opencart', // Opencart DB in APP/config/app.php
                'type' => 'Opencart4', // Opencart2 or Opencart4
                'localPath' => 'ABC', // Local overrides expected in APP/src/Model/Entity/$localPath
                'languageId' => 1, // Default Opencart language for translations
            ],
        ],
    ],
];
