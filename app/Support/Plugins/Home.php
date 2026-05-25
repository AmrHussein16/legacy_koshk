<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class Home extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Home'))
            ->route('home')
            ->icon('fas fa-home')
            ->active("/");
    }
}
