<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectLink extends Model
{
    public function getLink()
    {
        return $this->belongsTo('App\Link', 'link_id');
    }
}
