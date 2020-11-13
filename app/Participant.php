<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class participant extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'organization', 'phone_num', 'member_type', 'track_id', 'paper_id', 'present_method', 'verify_status'];

    public function attendance()
    {
        return $this->hasOne('App\Attendance');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function track()
    {
        return $this->belongsTo('App\Track');
    }
}
