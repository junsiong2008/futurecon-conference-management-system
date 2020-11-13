<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = ['pay_by', 'payment_status', 'payment_amount', 'participant_id', 'paymentImg'];

    public function participant()
    {
        return $this->belongsTo('App\Participant');
    }
}
