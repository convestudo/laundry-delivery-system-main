@component('mail::message')
# Reminder: Extra Laundry Charge

Hello,

You have an additional charge for the **{{ $charge->service_name }}** service:

- **Package Weight**: {{ $charge->package_weight }}kg  
- **Bag Size**: {{ ucfirst($charge->bag_size) }}  
- **Exceeded Weight**: {{ $charge->capacity_exceeded }}kg  
- **Extra Charge**: RM {{ number_format($charge->extra_charge, 2) }}  
- **Total Price**: RM {{ number_format($charge->total_price, 2) }}

<!-- @component('mail::button', ['url' => $url])
Pay Now
@endcomponent -->

@component('mail::button', ['url' => route('extra_charges.pay', $charge->chargeID)])
Pay Now
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
