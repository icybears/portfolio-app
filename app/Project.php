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
        'image' => 'mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100|between:1,2000'          
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
    public function getImageName()
    {
        return $this->imageName;
    }
    public function getTags()
    {
        return $this->tags;
    }
    public function getImageUrl()
    {
        if($this->imageUrl){
            return $this->imageUrl;
        } else {
            return Storage::url('project_image/default.png');
        }
    }
    public function setImage($image)
    {

        $result = Image::uploadToCloudder($image);
        
        if($this->imageName){
            Image::deleteFromCloudder($this->imageName);
        }

        $this->imageName = $result['image_name'];
        $this->imageUrl = $result['image_url'];   
        $this->user_id = auth()->id();         
        $this->save();

        // $imageName =  Image::upload($image, "project_image");
        
        // if($this->image != 'default.png'){
        //     Image::delete($this->image, "project_image");
        // }

        // $this->image = $imageName;
        // $this->user_id = auth()->id();
        // $this->save();
        
    }

   
}
