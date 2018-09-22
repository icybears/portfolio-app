<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;

class ProjectController extends Controller
{
    public function store($username)
    {
        $user = User::findByUsernameOrFail($username);
        
        $this->validate(request(),
        [
            'title' => 'min:2|max:60',
            'description' => 'max:120',
            'link' => 'max:60',
            'tags' => '',
            'image' => 'mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100,max_width:500,max_height:500'          
        ]);

        $project = new Project([
            'title' => request('title'),
            'description' => request('description'),
            'link' => request('link'),
            'tags' => request('tags'),
            'image' => request('image')
        ]);

        $user->projects()->save($project);

         return back();

    }

    public function update($username, $projectId)
    {
        $user = User::findByUsernameOrFail($username);

        $this->validate(request(),
        [
            'title' => 'min:2|max:60',
            'description' => 'max:120',
            'link' => 'max:60',
            'tags' => '',
            'image' => 'mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100,max_width:500,max_height:500'          
        ]);

        $user->projects()->where('id', $projectId)->update([
                                                    'title' => request('title'),
                                                    'description' => request('description'),
                                                    'link' => request('link'),
                                                    'tags' => request('tags'),
                                                    'image' => request('image')                                                    
                                                    ]);

        return back();
    }

    public function destroy($username, $projectId)
    {
        $user = User::findByUsernameOrFail($username);

        $user->projects()->where('id', $projectId)->delete();

        return back();
    }
}
