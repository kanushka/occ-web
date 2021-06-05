<div>
    <form method="post" action="{{Config::get('payment.payhere.url')}}">   
        <input type="hidden" name="merchant_id" value="{{Config::get('payment.payhere.id')}}">
        <input type="hidden" name="return_url" value="{{route('cart.show')}}">
        <input type="hidden" name="cancel_url" value="{{route('cart.show')}}">
        <input type="hidden" name="notify_url" value="{{route('orders.notify', $order)}}">  
        <br><br>Item Details<br>
        <input type="text" name="order_id" value="ItemNo12345">
        <input type="text" name="items" value="Door bell wireless"><br>
        <input type="text" name="currency" value="LKR">
        <input type="text" name="amount" value="1000">  
        <br><br>Customer Details<br>
        <input type="text" name="first_name" value="Saman">
        <input type="text" name="last_name" value="Perera"><br>
        <input type="text" name="email" value="samanp@gmail.com">
        <input type="text" name="phone" value="0771234567"><br>
        <input type="text" name="address" value="No.1, Galle Road">
        <input type="text" name="city" value="Colombo">
        <input type="hidden" name="country" value="Sri Lanka"><br><br> 
        <input type="submit" value="Buy Now">   
    </form>
</div>
