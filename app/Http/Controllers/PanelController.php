<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panel;

class PanelController extends Controller
{
    public function store()
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

    public function update($username, $panelId)
    {
        $this->validate(request(),
        [
            'title' => 'min:2, max:120',
            'content' => 'min:2'
        ]);

        auth()->user()->panels()->where('id', $panelId)->update([
                                                    'title' => request('title'),
                                                    'content' => request('content')
                                                    ]);
        return back();
    }
    public function destroy($username, $panelId)
    {
        auth()->user()->panels()->where('id', $panelId)->delete();
        
        return back();
    }
}
