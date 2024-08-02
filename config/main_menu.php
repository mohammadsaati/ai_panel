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
                    'permission' => 'category create' ,
                    'page'  =>  'admin/category/create'
                ] ,
                [
                    'title' => 'دسته بندی ها',
                    'new-tab' => false,
                    'permission' => 'category read all' ,
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
                'permission' => 'content_type read all' ,
                'page'  =>  'admin/content-type/index'
            ] ,
            [
                'title' => 'ساخت نوع محتوا',
                'new-tab' => false,
                'permission' => 'content_type create' ,
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
                    'permission' => 'post read all' ,
                    'new-tab' => false,
                    'page'  =>  'admin/post/index'
                ] ,
                [
                    'title' => 'ساخت پست',
                    'new-tab' => false,
                    'permission' => 'post create' ,
                    'page'  =>  'admin/post/create'
                ]
            ]
     ] ,
        [
            'title' => "بنر ها",
            'root' => true,
            'icon' => 'row-horizontal',
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'بنر جدید',
                    'new-tab' => false,
                    'permission' => 'banner create' ,
                    'page'  =>  'admin/banner/create'
                ] ,
                [
                    'title' => 'بنر ها',
                    'new-tab' => false,
                    'permission' => 'banner read all' ,
                    'page'  =>  'admin/banner/index'
                ]
            ]
        ],
        [
            'title' => "سکشن",
            'root' => true,
            'icon' => 'gift',
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'سکشن جدید',
                    'new-tab' => false,
                    'permission' => 'section create' ,
                    'page'  =>  'admin/section/create'
                ] ,
                [
                    'title' => 'سکشن ها',
                    'new-tab' => false,
                    'permission' => 'section read all' ,
                    'page'  =>  'admin/section/index'
                ]
            ]
        ],

        [
            'title' => "گالری",
            'root' => true,
            'icon' => 'picture', // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'submenu' => [
                [
                    'title' => 'همه عکس ها',
                    'new-tab' => false,
                    'permission' => 'gallery read all' ,
                    'page'  =>  'admin/image/index'
                ],
                [
                    'title' => 'عکس جدید',
                    'new-tab' => false,
                    'permission' => 'gallery create' ,
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
        [
            'title' => 'تنطیمات سایت',
            'root' => true,
            'icon' => "setting", // or can be 'flaticon-home' or any flaticon-*
            'new-tab' => false,
            'permission' => 'permission_mange read all' ,
            'page'  =>  '/admin/permission/users'
        ] ,



    ]

];
