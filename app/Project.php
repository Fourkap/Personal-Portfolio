<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = [
        'name',
        'url_name',
        'description',
        'type',
        'started_at',
        'ended_at',
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

    public function getUrlName(): string
    {
        return $this->url_name;
    }//end getUrlName()


    public function getDescription(): string
    {
        return $this->description;
    }//end getDescription()


    public function getType(): string
    {
        if ($this->type == 'academy') {
            return 'Effectué à l\'école';
        }

        return 'Effectué en entreprise';
    }//end getType()


    public function getStartedAt(): Carbon
    {
        return new Carbon($this->started_at);
    }//end getStartedAt()


    public function getStartedAtWithFormat($format = 'DD/MM/Y'): string
    {
        return $this->getStartedAt()->isoFormat($format);
    }//end getStartedAtWithFormat()


    public function getEndedAt(): Carbon
    {
        return new Carbon($this->ended_at);
    }//end getEndedAt()


    public function getEndedAtWithFormat($format = 'DD/MM/Y'): string
    {
        return $this->getEndedAt()->isoFormat($format);
    }//end getEndedAtWithFormat()

    public function getFirstPicture()
    {
        return $this->getProjectPictures()->first()->getPicture()->first();
    }

    public function getProjectPictures()
    {
        return $this->hasMany('App\ProjectPicture', 'project_id');
    }

    public function getProjectLinks()
    {
        return $this->hasMany('App\ProjectLink', 'project_id');
    }

    public static function findByUrlName(string $name): ?Project
    {
        return Project::all()->where('url_name', $name)->first();
    }
}//end class
