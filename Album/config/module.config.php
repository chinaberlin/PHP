<?php

return [

    /**
     * 路由配置
     * <code>
     *      'router'=>[
     *          'routes'=>[
     *              '路由名'=>[
     *                  # 路由类型在Zend\Mvc\Router\Http\文件夹下
     *                  # 路由服务名
     *                  'type'=>'路由类型',
     *                  # 路由配置 具体看每个路由类型里的factory方法
     *                  'options'=>[
     *
     *                  ]
     *              ]
     *          ]
     *      ]
     * </code>
     */
    'router' => [
        'routes' => [
            /**
             *  http://www.zf2.com/album
             *  controller=>albumController | action=>index
             *  http://www.zf2.com/album/index
             *  controller=>albumController | action=>index
             *  http://www.zf2.com/album/edit
             *  controller=>albumController | action=>edit
             */
            'album' => [
                'type' => 'Segment',
                'options' => [
                    'route'=>'/album[[/[:action[/[:id]]]]]',
                    'defaults'=>[
                        # AlbumController 也是一个服务名字 是通过 Zend\Mvc\Controller\PluginManager
                        'controller'=>'AlbumController',
                        'action'=>'index'
                    ]
                ]
            ]
        ]
    ],

    /**
     * 告诉zf2添加当前模块的模板位置到模板路径stack
     */
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),


];