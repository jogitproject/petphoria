@component('mail::message')
# Welcome!

Hi {{ $user->name }}
<br>
Welcome to Petphoria, your account has been created successfully, Now Your Pet Will Feel Euphoria

@component('mail::button', ['url' => route('login')])
Login Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
