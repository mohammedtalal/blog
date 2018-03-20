@component('mail::message')

Thanks so much for Registration

@component('mail::button', ['url' => 'https://laravel.com'])
Start Browsing
@endcomponent

@component('mail::panel', ['url' => ''])
{{ $lastPost->title }}
Don't wait from someone to make u better
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
