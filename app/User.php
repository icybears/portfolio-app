<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','fullName', 'occupation', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function socialLinks()
    {
       return $this->hasMany(SocialLink::class);
    }
    public function panels()
    {
        return $this->hasMany(Panel::class);
    }
    public function getUsername()
    {
        return $this->name;
    }
    public function getEmail ()
    {
        return $this->email;
    }
    public function getFullName() 
    {
        return $this->fullName;
    }
    public function getOccupation()
    {
        return $this->occupation;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getImageUrl()
    {
        return Storage::url('user_image/' . $this->image);
    }
    public function setImage($image)
    {
        $uploadedImage = $image;
        
        $imageName = $this->id . time() . "." . $uploadedImage->getClientOriginalExtension();

        try{
            Storage::disk('public')
                ->put("user_image/$imageName", file_get_contents($uploadedImage));
        } catch(\Exception $e) {
            echo 'Problems storing the image';
            
        }

        $this->deleteOldImage();
        $this->image = $imageName;
        $this->save();
    }
    public function isAuthenticated() {

        return $this->id == auth()->id();

    }

    private function deleteOldImage() {
        
        if($this->image != 'default.png')
        {
            Storage::disk('public')->delete('user_image/' . $this->image);
        }
    }

   
    static public function findByUsernameOrFail($username) {

        return static::where('name', $username)->firstOrFail();
    }
}
