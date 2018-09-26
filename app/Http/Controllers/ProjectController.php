<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Project;

class ProjectController extends Controller
{
 
    public function __construct()
    {
        return  $this->middleware('isPageOwner');
    }

    public function store($username, Request $request)
    {
        
        $validator = Validator::make($request->all(), Project::$rules);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('source', 'add');
        }


        $project = new Project([
            'title' => request('title'),
            'description' => request('description'),
            'link' => request('link'),
            'tags' => request('tags'),
            'user_id' => auth()->id()
        ]);

        if(request('image'))
        {
            $project->setImage(request('image'));
        }

        auth()->user()->projects()->save($project);

         return back();

    }

    public function update($username, $projectId, Request $request)
    {
        
        $validator = Validator::make($request->all(), Project::$rules);
        
        
        
                if ($validator->fails()) {
                    return back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('source', 'edit')
                                ->with('modal', $projectId);
                }

        auth()->user()->projects()->where('id', $projectId)->update([
                                                    'title' => request('title'),
                                                    'description' => request('description'),
                                                    'link' => request('link'),
                                                    'tags' => request('tags'),                                                   
                                                    ]);
        if(request('image'))
        {
           Project::find($projectId)->setImage(request('image'));
        }

        return back();
    }

    public function destroy($username, $projectId)
    {

        auth()->user()->projects()->where('id', $projectId)->delete();

        return back();
    }
}
