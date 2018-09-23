<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panel;
use Validator;

class PanelController extends Controller
{
    public function __construct()
    {
        return  $this->middleware('isPageOwner');
    }
    
    public function store($username, Request $request)
    {

        $validator = Validator::make($request->all(), Panel::$rules);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('source', 'addPanel');
        }
   

        auth()->user()->panels()->create([
                        'title' => request('title'),
                        'content' => request('content')
                        ]);

        return back();
    }

    public function update($username, $panelId, Request $request)
    {
        $validator = Validator::make($request->all(), Panel::$rules);
        
                if ($validator->fails()) {
                    return back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('source', 'editPanel')
                                ->with('panel', $panelId);
                }

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
