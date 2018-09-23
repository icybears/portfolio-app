<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Project;

class ProjectController extends Controller
{
 

    public function store($username, Request $request)
    {
        
        $user = User::findByUsernameOrFail($username);
        
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
            'user_id' => $user->id
        ]);

        if(request('image'))
        {
            $project->setImage(request('image'));
        }

        $user->projects()->save($project);

         return back();

    }

    public function update($username, $projectId, Request $request)
    {
        $user = User::findByUsernameOrFail($username);

        $validator = Validator::make($request->all(), Project::$rules);
        
                if ($validator->fails()) {
                    return back()
                                ->withErrors($validator)
                                ->withInput()
                                ->with('source', 'edit')
                                ->with('modal', $request->input('modal'));
                }

        $user->projects()->where('id', $projectId)->update([
                                                    'title' => request('title'),
                                                    'description' => request('description'),
                                                    'link' => request('link'),
                                                    'tags' => request('tags'),                                                   
                                                    ]);
        if(request('image'))
        {
            Project::where('id', $projectId)->setImage(request('image'));
        }

        return back();
    }

    public function destroy($username, $projectId)
    {
        $user = User::findByUsernameOrFail($username);

        $user->projects()->where('id', $projectId)->delete();

        return back();
    }
}
