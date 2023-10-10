<x-mail::message>
# Thank you for being a part of this test!

This email is only for testing purposes.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
