<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Track extends Model
{
    use SoftDeletes;

    protected $fillable = ['track_name'];

    public function participants()
    {
        return $this->hasMany('App\Participant');
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
