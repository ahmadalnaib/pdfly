<x-mail::message>
# Thanks for your purchase!

You've bought  **{{ $sale->plan->name }}** .

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
