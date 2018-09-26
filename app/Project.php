<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Image;


class Project extends Model
{
    protected $fillable = ['title','description','link','image','tags'];

    static public $rules =  [
        'title' => 'min:2|max:60',
        'description' => 'min:2|max:120',
        'link' => 'max:60',
        'tags' => '',
        'image' => 'mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100,max_width:500,max_height:500'          
    ];

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getLink()
    {
        return $this->link;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getTags()
    {
        return $this->tags;
    }
    public function getImageUrl()
    {
        return Storage::url('project_image/' . $this->image);
    }
    public function setImage($image)
    {
        $imageName =  Image::upload($image, "project_image");
        
        if($this->image != 'default.png'){
            Image::delete($this->image, "project_image");
        }

        $this->image = $imageName;
        $this->user_id = auth()->id();
        $this->save();
        
    }

   
}
