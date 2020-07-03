@component('mail::message')
# change password Request


Click on the button  below to change password

@component('mail::button',['url' => 
'http://localhost:4200/#/change?token='.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
