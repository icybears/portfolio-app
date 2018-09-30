<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Project;
use App\Image;

class ProjectController extends Controller
{
 
    public function __construct()
    {
          $this->middleware('isPageOwner');
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

         return back()->with(['message' => 'Project added.', 'class' => 'success']);

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

        return back()->with(['message' => 'Project updated.', 'class' => 'info']);
    }

    public function destroy($username, $projectId)
    {
        $imageName = Project::find($projectId)->getImage();

        if($imageName !== 'default.png'){
            Image::delete($imageName,'project_image');
        }
        auth()->user()->projects()->where('id', $projectId)->delete();

        return back()->with(['message' => 'Project removed.', 'class' => 'success']);
    }
}
