@component('mail::message')
# Hi {{$staff->firstname}}
# You account has been blocked!

Hi {{$staff->firstname}} your account has been blocked by the Virtual Pharmacy team as you may have violated the company terms and conditions. We are reviewing your account and will notify you about your account activation.

@component('mail::button', ['url' => 'http://virtualpharmacy.test'])

Visit Website

@endcomponent

Thanks,<br>
Virtual Pharmacy Team.
@endcomponent