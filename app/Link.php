<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

    protected $fillable = [
        'name',
        'class_element',
        'url',
    ];


    public function getId(): int
    {
        return $this->int;
    }//end getId()


    public function getName(): string
    {
        return $this->name;
    }//end getName()


    public function getClassElement(): string
    {
        return $this->class_element;
    }//end getClassElement()


    public function getUrl(): string
    {
        return $this->url;
    }//end getUrl()
}//end class
