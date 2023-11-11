<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'داشبورد',
            'root' => true,
            'icon' => 'home', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/admin/dashboard',
            'new-tab' => false,
        ],


        [
            'title' => "دسته بندی",
            'root' => true,
            'icon' => 'folder', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'ساخت دسته بندی',
                    'new-tab' => false,
                    'page'  =>  'admin/category/create'
                ] ,
                [
                    'title' => 'دسته بندی ها',
                    'new-tab' => false,
                    'page'  =>  'admin/category/index'
                ]
            ]
        ] ,


        [
        'title' => "انواع محتوا",
        'root' => true,
        'icon' => 'category', // or can be 'flaticon-home' or any flaticon-*
        'new-tab' => false,
        'submenu' => [
            [
                'title' => 'محتوا ها',
                'new-tab' => false,
                'page'  =>  'admin/content-type/index'
            ] ,
            [
                'title' => 'ساخت نوع محتوا',
                'new-tab' => false,
                'page'  =>  'admin/content-type/create'
            ]
        ]
    ] ,
     [
            'title' => "پست ها",
            'root' => true,
            'icon' => 'notepad-edit', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'همه ی پست ها',
                    'new-tab' => false,
                    'page'  =>  'admin/post/index'
                ] ,
                [
                    'title' => 'ساخت پست',
                    'new-tab' => false,
                    'page'  =>  'admin/post/create'
                ]
            ]
     ] ,

        [
            'title' => "گالری",
            'root' => true,
            'icon' => 'picture', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'همه عکس ها',
                    'new-tab' => false,
                    'page'  =>  'admin/image/index'
                ],
                [
                    'title' => 'عکس جدید',
                    'new-tab' => false,
                    'page'  =>  'admin/image/create'
                ]

            ]
        ] ,



        [
            'title' => 'تنطیمات سایت',
            'root' => true,
            'icon' => "setting", // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'page'  =>  '/admin/options'
        ] ,



    ]

];
