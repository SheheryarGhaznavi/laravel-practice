<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class ChannelComposer {

    public function compose(View $view)
    {
        $view->with('channels', \App\Channel::orderBy('name')->get());
    }

}