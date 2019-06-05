<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{

    protected $fillable = [
        'name',
        'subname',
        'description',
        'started_at',
        'ended_at',
        'user_id',
        'picture_id',
    ];

    public $timestamps = false;


    public function getId(): int
    {
        return $this->id;
    }//end getId()


    public function getName(): string
    {
        return $this->name;
    }//end getName()


    public function getSubname(): string
    {
        return $this->subname;
    }//end getSubname()


    public function getDescription(): string
    {
        return $this->description;
    }//end getDescription()


    public function getStartedAt(): Carbon
    {
        return new Carbon($this->started_at);
    }//end getStartedAt()


    public function getStartedAtWithFormat($format = 'Y-MM-DD'): string
    {
        return $this->getStartedAt()->isoFormat($format);
    }//end getStartedAtWithFormat()


    public function getEndedAt(): Carbon
    {
        return new Carbon($this->ended_at);
    }//end getEndedAt()

    public function getEndedAtWithFormat($format = 'Y-MM-DD'):string
    {
        return $this->getEndedAt()->isoFormat($format);
    }

    public function getUser(): User
    {
        return ($this->belongsTo('App\User'))->first();
    }//end getUser()


    public function getPicture(): Picture
    {
        return ($this->belongsTo('App\Picture'))->first();
    }//end getPicture()
}//end class
