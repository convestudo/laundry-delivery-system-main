<!-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> -->

{{-- resources/views/emails/extra/charge.blade.php --}}
@component('mail::message')
# Laundry Extra Charge Details

Hi {{ $charge->user->name }},

Here are the details of your laundry charge:

- **Service**: {{ $charge->service_name }}
- **Bag Size**: {{ ucfirst($charge->bag_size) }}
- **Selected Package Weight**: {{ $charge->package_weight }}kg
- **Capacity Exceeded**: {{ $charge->capacity_exceeded }}kg
- **Extra Charge**: RM {{ number_format($charge->extra_charge, 2) }}
- **Total Price**: RM {{ number_format($charge->total_price, 2) }}

@component('mail::button', ['url' => '#'])
Pay Now
@endcomponent

Thank you for choosing our service.

@endcomponent

