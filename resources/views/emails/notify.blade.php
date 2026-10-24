<x-mail::message>
# Halo {{ $user->name }}

Terima kasih telah bergabung.

<x-mail::button :url="$url">
Lihat Dashboard
</x-mail::button>

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>