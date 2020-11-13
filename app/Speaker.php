<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
    use SoftDeletes;

    protected $fillable = ['speaker_name', 'speakerImg', 'speaker_bio', 'speaker_email'];

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
}
