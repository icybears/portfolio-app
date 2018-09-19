<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Panel extends Model
{
    protected $fillable = ['title', 'content'];

    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getParsedContent()
    {
        $parsedown = new Parsedown();
        $parsedown->setSafeMode(true);
        
        return $parsedown->text($this->content); 
    }
}
