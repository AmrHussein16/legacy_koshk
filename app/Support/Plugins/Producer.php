<?php

namespace Vanguard\Support\Plugins;

use Vanguard\Plugins\Plugin;
use Vanguard\Support\Sidebar\Item;

class Producer extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('Producers'))
            ->route('producer')
            ->icon('fas fa-film')
            ->active("/");
    }
}
