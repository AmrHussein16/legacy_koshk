<?php

namespace Vanguard\Support\Plugins;

use Route;
use Vanguard\Announcements\Announcements as VAnnouncements;

class Announcements extends VAnnouncements
{
    /**
     * Map web plugin related routes.
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'namespace' => 'Vanguard\Announcements\Http\Controllers\Web',
            'middleware' => 'web',
            'prefix' => 'dashboard',
        ], function () {
            $this->loadRoutesFrom(base_path('vendor/vanguardapp/announcements/routes/web.php'));
        });
    }
}
