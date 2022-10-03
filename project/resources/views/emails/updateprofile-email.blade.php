@component('mail::message')
# Hi {{ $user->firstname }}
## Your profile was Updated!

{{ $user->updated_at->diffForHumans() }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
