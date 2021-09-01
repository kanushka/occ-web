@component('mail::message')
# Order Confirmation



## Hey {{$user->name}},

We've got your order! 
We'll drop you another email when your order ships.

@component('mail::button', ['url' => route('orders.show', $order->id)])
View Order
@endcomponent

If you need help with anything please don't hesitate to dorp us an email.
help@occweb.com

Thanks,<br>
{{ config('app.name') }}
@endcomponent
