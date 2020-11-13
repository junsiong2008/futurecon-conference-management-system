@component('mail::message')
# Payment Verified

Hi, {{ $payment->participant->name }}. <br />Your payment has been verified.

@component('mail::table')
| Information &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;| Details |
|:--- |:-----------|
| Name | {{ $payment->participant->name}} |
| Payment ID | {{ $payment->id}} |
@if( $payment->participant->member_type == 0)
| Member Type | Non-IEEE Member |
@elseif($payment->participant->member_type == 1)
| Member Type | IEEE Member |
@elseif($payment->participant->member_type == 2)
| Member Type | Student |
@endif
| Payment Amount(RM) | {{ $payment->payment_amount}} |

@endcomponent

@component('mail::button', ['url' => ''])
Visit FutureCon 2020 Website
@endcomponent

See you there,<br>
{{ config('app.name') }}
@endcomponent