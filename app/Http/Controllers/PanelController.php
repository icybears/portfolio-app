<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panel;

class PanelController extends Controller
{
    public function add()
    {
        $this->validate(request(),
        [
            'title' => 'min:2, max:120',
            'content' => 'min:2'
        ]);

        auth()->user()->panels()->create([
                        'title' => request('title'),
                        'content' => request('content')
                        ]);

        return back();
    }

    public function edit()
    {

    }
    public function delete($username, $panelId)
    {
        auth()->user()->panels()->where('id', $panelId)->delete();
        
        return back();
    }
}
