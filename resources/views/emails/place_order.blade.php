@component('mail::message')
# Order Placed

Hello {{$order->user->firstname}} Your order has been placed!

@component('mail::button', ['url' => 'http://virtualpharmacy.test/home'])
View Order
@endcomponent


@component('mail::table')
| Product       | Quantity      | Price    | Total   |
| ------------- |:-------------:| --------:|--------:|
@foreach($order->products as $product)
| {{$product->name}}      | {{$product->pivot->quantity}}      | PKR{{$product->price}}      |
@endforeach
|  |  |  | PKR{{$order->total}} |
@endcomponent

Ready {{$order->total}}PKR give when your order is arrived 

Thanks,<br>
Virtual Pharmacy.
@endcomponent