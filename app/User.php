<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use App\Image;

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
            
            $imageName = Image::upload($image, "user_image");

            if($this->image != 'default.png'){
                Image::delete($this->image, 'user_image');
            }

            $this->image = $imageName;
            $this->save();
       
    }
    public function isAuthenticated() {

        return $this->id == auth()->id();

    }

   
    static public function findByUsernameOrFail($username) {

        return static::where('name', $username)->firstOrFail();
    }
}
