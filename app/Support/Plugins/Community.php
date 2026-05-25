<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class Community extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Communities'))
            ->route('community')
            ->icon('fas fa-cubes')
            ->active("/");
    }
}
