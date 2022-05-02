@component('mail::message')
# Hi {{$staff->firstname}}
# You account has been Approved!

Hi {{$staff->firstname}} your account has been approved by the Virtual Pharmacy team make sure that you have read the company's terms and conditions.

@component('mail::button', ['url' => 'http://virtualpharmacy.test'])

Visit Website

@endcomponent

Thanks,<br>
Virtual Pharmacy Team.
@endcomponent