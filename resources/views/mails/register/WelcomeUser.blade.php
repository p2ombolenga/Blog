@component('mail::message')
# Introduction

Hi {{$user->name}}, Welcome on our website
hope you'll find whatever you want 

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
