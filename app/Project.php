<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Image;


class Project extends Model
{
    protected $fillable = ['title','description','link','image','tags'];

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
