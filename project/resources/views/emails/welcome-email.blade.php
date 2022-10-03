@component('mail::message')

# Hi {{ $user->firstname }}
## Welcome to Cloudbay World

Your profile was successfully Created!

you can login 

@component('mail::panel')
**Username:** {{ $user->username }} \
**Email:** {{ $user->email }} \
**Password:** {{ $user->pass }} 
@endcomponent
{{ route('login') }}

@component('mail::button', ['url' => '/login ', 'color'=> 'primary'])
Login
@endcomponent



Thanks,<br>
{{ config('app.name') }}


@endcomponent


