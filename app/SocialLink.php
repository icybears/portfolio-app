<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = ['label', 'url'];

    static public $rules = [
        'label' => 'min:2|max:25',
        'url' => 'url'
    ];
}
