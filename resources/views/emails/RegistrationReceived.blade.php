@component('mail::message')
# Registration Received

Hi {{$participant->name}},<br />
FutureCon 2020 has received your registration.</br>
We will send you an email notification once we've verfied your paper.<br>

## Registration Information
|Information &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; |Details &nbsp; &nbsp;|
|:---|:---|
|Name|{{$participant->name}}|
|Email|{{$participant->email}}|
|Organization|{{$participant->organization}}|
|Phone No|{{$participant->phone_num}}|
@if($participant->member_type == 0)
|Member Type|Non-IEEE Member|
@elseif($participant->member_type==1)
|Member Type|IEEE Member|
@elseif($participant->member_type==2)
|Member Type|Student|
@endif
|Track|{{$participant->track->track_name}}|
@if($participant->present_method == 0)
|Attend|Physically|
@elseif($participant->member_type==1)
|Attend|Online|
@endif
<br><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent