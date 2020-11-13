<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model

{
    use SoftDeletes;

    protected $fillable = ['start_time', 'title', 'subtitle', 'speaker_id', 'track_id'];

    public function track()
    {
        return $this->belongsTo('App\Track');
    }

    public function speaker()
    {
        return $this->belongsTo('App\Speaker');
    }
}
