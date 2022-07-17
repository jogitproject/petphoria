@component('mail::message')
# Buy Product: {{ $checkout->Product->title }}

Hi {{ $checkout->User->name }}
Thank you for caring abour your pet <b>{{ $checkout->Product }}</b>, please see payment instruction by click the button below.

@component('mail::button', ['url' => route('dashboard')])
My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
