@component('mail::message')
# {{ $maildata->subject }}

## Hi {{ $maildata->customer_name }}

{{ $maildata->body }}


<br>
<br>
<br>


Thanks,<br>

@endcomponent
