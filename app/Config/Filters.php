<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>> [filter_name => classname]
     *                                                     or [filter_name => [classname1, classname2, ...]]
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filterAdmin' => \App\Filters\FilterAdmin::class,
        'filterKaryawan' => \App\Filters\FilterKaryawan::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, list<string>>
     */
    
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'filterAdmin' => [
                'except' => ['login/*', 'login/', '/'],
            ],
            'filterKaryawan' => [
                'except' => ['login/*', 'login/', '/']
            ]
        ],
        'after' => [
            'filterAdmin' => [
                'except' => ['dashboard', 'chartSales', 'pieSales', 'totalSales', 'totalRE', 'totalPI', 'totalPS', 'updateStatus*', 'search', 'listRE', 'chartRE', 'listFCC', 'chartFCC', 'listPI', 'chartPI', 'listPS', 'chartPS', 'listA', 'listK', 'sektor', 'sto', 'laporan', 'TambahSTO', 'editSTO*', 'deleteSTO*', 'updateSTO', 'save', 'tambahDataSektor', 'editSektor*', 'updateSektor', 'deleteSektor*', 'simpan', 'regis', 'tambahA', 'simpanA', 'tambahK', 'simpanK', 'listSales', 'editA*', 'editK*', 'updateA', 'updateK', 'simpanSales', 'deleteAdmin', 'deleteKaryawan', 'editSales', 'deleteSales*', 'growth','import','exampleFile']
            ],
            'filterKaryawan' => [
                'except' => ['dashboard', 'chartSales', 'pieSales', 'totalSales', 'totalRE', 'totalPI', 'totalPS', 'updateStatus*', 'search', 'listRE', 'chartRE', 'listFCC', 'chartFCC', 'listPI', 'chartPI', 'listPS', 'chartPS', 'laporan', 'listSales', 'simpanSales', 'editSales', 'deleteSales*', 'growth','import','exampleFile']
            ],
            
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}