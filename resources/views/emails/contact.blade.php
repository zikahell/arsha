<x-mail::message>
Hello ..!

We Have Received your Message.

<x-mail::button :url="'http://127.0.0.1:8000/'">
Visit Us 
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
