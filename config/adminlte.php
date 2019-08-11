<?php
use App\Http\Controllers\UsersController;

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'AuroraWMS',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => 'Aurora<b>WMS</b>',

    'logo_mini' => '<b>A</b>LT',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'yellow',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'MENU',
        [
            'text'    => 'Master',
            'icon'    => 'database',
            'icon_color' => 'red',
            'submenu' => [
                [
                    'text' => 'Barang',
                    'icon'    => 'cube',
                    'url'  => '#',
                    'icon_color' => 'red',
                ],
                [
                    'text'    => 'Pelanggan',
                    'icon'    => 'users',
                    'url'     => '#',
                    'icon_color' => 'orange',
                ],
                [
                    'text' => 'Gudang',
                    'icon'    => 'university',
                    'url'  => '#',
                    'icon_color' => 'purple',
                ],
                [
                    'text' => 'Perusahaan',
                    'icon'    => 'building-o',
                    'url'  => 'admin/perusahaan',
                    'icon_color' => 'green',
                ],
                [
                    'text' => 'Kategori',
                    'icon'    => 'filter',
                    'url'  => '/admin/kategori',
                    'icon_color' => 'yellow',
                ],
                [
                    'text' => 'Jenis',
                    'icon'    => 'filter',
                    'url'  => '/admin/jenis',
                    'icon_color' => 'blue',
                ],
                [
                    'text' => 'Supplier',
                    'icon'    => 'truck',
                    'url'  => '#',
                    'icon_color' => 'teal',
                ],
            ],
        ],
        [
            'text'       => 'Management Barang',
            'icon'    => 'cubes',
            'icon_color' => 'blue',
            'submenu' => [
                [
                    'text'       => 'Inbound',
                    'icon'    => 'truck',
                    'icon_color' => 'red',
                ],
                [
                    'text'       => 'Outbound',
                    'icon'    => 'truck',
                    'icon_color' => 'yellow',
                ],
                [
                    'text'       => 'Put Away',
                    'icon'    => 'download',
                    'icon_color' => 'aqua',
                ],
                [
                    'text'       => 'Stock Opname',
                    'icon'    => 'cubes',
                    'icon_color' => 'red',
                ],
                [
                    'text'       => 'Aging Stock',
                    'icon'    => 'check',
                    'icon_color' => 'red',
                ],
                [
                    'text'       => 'FIFO',
                    'icon'    => 'refresh',
                    'icon_color' => 'yellow',
                ],
                [
                    'text'       => 'Fast Moving',
                    'icon'    => 'download',
                    'icon_color' => 'aqua',
                ],
                [
                    'text'       => 'Audit Trail',
                    'icon'    => 'share',
                    'icon_color' => 'red',
                ],
            ]
        ],
        'Management Gudang',

        [
            'text'       => 'Transport',
            'icon'    => 'truck',
            'icon_color' => 'yellow',
        ],
        'Laporan',
        [
            'text'       => 'Order',
            'icon'    => 'truck',
            'icon_color' => 'red',
        ],
        [
            'text'       => 'Monitoring',
            'icon'    => 'truck',
            'icon_color' => 'yellow',
        ],
        'PENGATURAN',
        [
            'text'    => 'Pengaturan User',
            'icon'    => 'user',
            'url'     => 'admin/users',
        ],
        [
            'text'    => 'Pengaturan Role',
            'icon'    => 'refresh',
            'url'    => 'admin/roles',
        ],
        [
            'text'    => 'Pengaturan Hak Akses',
            'icon'    => 'key',
            'url'    => 'admin/permission',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
