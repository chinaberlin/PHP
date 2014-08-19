<?php

return [

    'kp-blog' => [
        'date_format' => 'Y-m-d'
    ],
    'router' => [
        'routes' => [
            'kp-blog-admin' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/kp-blog-admin[/:controller[/:action[/:id]]]',
                    'defaults' => [
                        '__NAMESPACE__' => 'KpBlog\Controller\Admin',
                        'action' => 'index',
                        'controller' => 'posts'
                    ]
                ]
            ]
        ]
    ],

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'navigation' => [
        'kp-admin' => [
            [
                'label' => 'Blog',
                'uri' => '',
                'class' => 'heading',
                'pages' => [
                    [
                        'label' => 'Post',
                        'route' => 'kp-blog-admin',
                        'controller' => 'posts',
                        'action' => 'index',
                        'pages' => [
                            [
                                'label' => 'Add Post',
                                'route' => 'kp-blog-admin',
                                'controller' => 'posts',
                                'action' => 'add',
                            ],
                            [
                                'label' => 'edit Post',
                                'route' => 'kp-blog-admin',
                                'controller' => 'posts',
                                'action' => 'edit',
                            ]
                        ]
                    ],
                    [
                        'label' => 'Category',
                        'route' => 'kp-blog-admin',
                        'controller' => 'category',
                        'action' => 'index',
                    ],
                    [
                        'label' => 'Tag',
                        'route' => 'kp-blog-admin',
                        'controller' => 'tag',
                        'action' => 'index',
                    ],
                ]
            ],

        ]
    ]

];