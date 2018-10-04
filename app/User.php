<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Image;

class User extends Authenticatable
{
    use Notifiable;


    private $max_storage = 10000000;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','fullName', 'occupation', 'description'
    ];

    protected $guarded = [
        'isAdmin', 'premium', 'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static public $rules = [
        'fullName' => 'min:2|max:60',
        'occupation' => 'max:120',
        'description' => 'max:300',
        'image' => 'mimes:jpeg,jpg,png|dimensions:min_width=100,min_height=100|between:1,2000'
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
    public function getId(){
        return $this->id;
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
        if($this->imageUrl){
            return $this->imageUrl;
        } else {
            return Storage::url('user_image/default.png');
        }
    }
    public function setImage($image)
    {
            
            // $imageName = Image::upload($image, "user_image");
            $result = Image::uploadToCloudder($image);

            if($this->imageName){
                Image::deleteFromCloudder($this->imageName);
            }

            $this->imageName = $result['image_name'];
            $this->imageUrl = $result['image_url'];            
            $this->save();

    }
    public function isAuthenticated() {

        if(session('preview') == 'on')
        {
            return false;
        }

        return $this->id == auth()->id();
    }

    public function hasAdminRole() 
    {
        return $this->isAdmin;
    }

    public function isPremium()
    {
        return $this->premium;
    }
   
    static public function findByUsernameOrFail($username) {

        return static::where('name', $username)->firstOrFail();
    } 
    
    static public function getAllProjectsTags(User $user)
    {
        $tags = DB::table('projects')->where('user_id', $user->id)->pluck('tags');
        $result = array();

        foreach ($tags as $tagString) {
            $tagsArray = explode(',', $tagString);

            foreach($tagsArray as $tag) {
                
                if( !is_numeric( array_search($tag, $result) ) )
                {
                    $result[] = $tag;
                } 
        }

        }
        
        return $result;
    }

    public function getTotalStorage()
    {
        return $this->totalStorage;
    }

    public function updateTotalStorage($val)
    {
        $this->totalStorage += $val;
        $this->save();
    }

    public function getMaxStorage()
    {
        return $this->max_storage;
    }

    public function checkAvailableStorage($val)
    {
        return ($this->getTotalStorage() + $val < $this->getMaxStorage());
    }

 
    // public function getAllProjectsTags(User $user)
    // {
    //     $tags = DB::table('projects')->where('user_id', $user->getId())->pluck('tags');
    //     $result = array();

    //     foreach ($tags as $tagString) {
    //         $tagsArray = explode(',', $tagString);

    //         foreach($tagsArray as $tag) {
                
    //             if( !is_numeric( array_search($tag, $result) ) )
    //             {
    //                 $result[] = $tag;
    //             } 
    //     }

    //     }
        
    //     return $result;
    // }

}
