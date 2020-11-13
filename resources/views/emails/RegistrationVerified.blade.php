@component('mail::message')
# Registration Verified

Welcome to FutureCon, {{ $participant->name }}. <br />Your email and paper ID has been verified.

@component('mail::table')
| Information &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;| Details |
|:--- |:-----------|
| Email | {{ $participant->email}} |
| Paper ID | {{ $participant->paper_id}} |

@endcomponent


@component('mail::button', ['url' => '/home'])
Visit FutureCon Page
@endcomponent

@component('mail::panel', ['url' => ''])

See you there!

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent