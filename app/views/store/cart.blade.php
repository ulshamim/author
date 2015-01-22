@extends('layouts.main') 
@section('content')

<article id="basket">
    <button class="continue">Pay securely now</button>
    <h1>Shopping Bag</h1>

    <table width="100" border="1">
        <tr>
            <th scope="col" class="description">Product</th>
            <th scope="col" class="options">Options</th>
            <th align="right" scope="col" class="price">Price</th>
        </tr>
        @foreach($cartitems as $cartitem)

        <tr>
            <td align="left" valign="top" class="description"><a href="view/{{$cartitem['id']}}">


                    <img src="{{URL::asset($cartitem['imgpath'])}}" alt="{{$cartitem['name']}}" class="left" />
                </a>
                <p><a href="view/{{$cartitem['id']}}">{{$cartitem['name']}}</a></p>
                <a href="#">Remove</a></td>
            <td align="left" valign="top" class="options">
                <dl>
                    <dt>Product ID</dt>
                    <dd>{{$cartitem['id']}}</dd>
                    <dt>Product Price</dt>
                     <dd>{{$cartitem['price']}}</dd>
                    <dt>Quantity:</dt>
                    <dd>{{$cartitem['quantity']}}</dd>
                </dl>

            </td>
           <td align="right" valign="top" class="price">&pound;{{$cartitem['price']*$cartitem['quantity']}}</td>
        </tr>
        @endforeach

    </table>
    {{ HTML::image("images/creditcards.gif", "Logo",array('class' => 'safe', 'alt' =>'card')) }}

    <div class="right">

        <strong>Your total</strong> <em>&pound;{{Cart::total()}}</em>
    </div>
   {{HTMl::link('store/checkout', 'Checkout', array('class'=>'continue'))}}
</article>
@stop