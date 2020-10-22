<?php

return [
    '__name' => 'api-user-register',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/api-user-register.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/api-user-register' => ['install','update','remove'],
        'app/api-user-register' => ['install','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-user-main' => NULL
            ],
            [
                'lib-form' => NULL
            ],
            [
                'api' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'ApiUserRegister\\Controller' => [
                'type' => 'file',
                'base' => 'app/api-user-register/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'api' => [
            'apiMeRegister' => [
                'path' => [
                    'value' => '/me/register'
                ],
                'handler' => 'ApiUserRegister\\Controller\\Register::create',
                'method' => 'POST'
            ]
        ]
    ],
    'libForm' => [
        'forms' => [
            'api.me.register' => [
                'name' => [
                    'label' => 'Name',
                    'type' => 'text',
                    'rules' => [
                        'required' => TRUE,
                        'empty' => FALSE,
                        'text' => 'slug',
                        'unique' => [
                            'model' => 'LibUserMain\\Model\\User',
                            'field' => 'name'
                        ]
                    ]
                ],
                'fullname' => [
                    'label' => 'Fullname',
                    'type' => 'text',
                    'rules' => [
                        'required' => TRUE,
                        'empty' => FALSE
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'meter' => FALSE,
                    'rules' => [
                        'required' => TRUE,
                        'empty' => FALSE,
                        'length' => [
                            'min' => 6
                        ]
                    ]
                ]
            ]
        ]
    ]
];