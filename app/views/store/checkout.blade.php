@extends('layouts.main')
@section('content')
<article class="login checkout">
    @if($errors->has())
    <div class='alert alert-danger'>
        {{ Lang::get('redminportal::messages.error') }}
        <ul>
            @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{ Form::open(array('action' => 'PaypalPaymentController@store')) }}
    <section class="align-left">
        <h1>Shipping Address</h1>
        <p>
            {{ Form::label('first_name', 'First Name') }}
            {{ Form::text('shipping_first_name', null, array('class' => 'form-control', 'required')) }}
        </p>
        <p>
            {{ Form::label('last_name', 'Last Name') }}
            {{ Form::text('shipping_last_name', null, array('class' => 'form-control', 'required')) }}

        </p>
        <p>
            {{ Form::label('email', 'Email') }}
            {{ Form::email('shipping_email', null, array('class' => 'form-control', 'required')) }}

        </p>
        <p>
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('shipping_phone',null, array('class' => 'form-control','required')) }}

        </p>
        <p>
            {{ Form::label('company', 'Company Name') }}
            {{ Form::text('shipping_company',null, array('class' => 'form-control')) }}

        </p>
        <p>
            {{ Form::label('country', 'Country') }}
            {{ Form::text('shipping_country',null, array('class' => 'form-control','id'=>'country', 'required')) }}

        </p>
        <p>
            {{ Form::label('state', 'State') }}
            {{ Form::text('shipping_state',null, array('class' => 'form-control','id'=>'state', 'required')) }}

        </p>
        <p>
            {{ Form::label('city', 'City') }}
            {{ Form::text('shipping_city',null, array('class' => 'form-control','id'=>'city', 'required')) }}

        </p>
        <p>
            {{ Form::label('address', 'Address') }}
            {{ Form::text('shipping_address1',null, array('class' => 'form-control','required')) }} </br> </br>
            {{ Form::text('shipping_address2',null, array('class' => 'form-control')) }}

        </p>
        <p>
            {{ Form::label('zip', 'Zip') }}
            {{ Form::text('shipping_zip',null, array('class' => 'form-control', 'required')) }}

        </p>

    </section>
    <section class="align-right">
        <h2>Payment Details</h2>
        <p>
            {{ Form::label('paymentmethod', 'Payment Method') }}
            {{ Form::text('payment_method','Credit Card', array('class' => 'form-control', 'readonly')) }}

        </p>
        <p>
            {{ Form::label('paymenttype', 'Pyment Type') }}
            {{ Form::select('payment_type',array('visa' => 'Visa')) }}

        </p>
        <p>
            {{ Form::label('payment_firstname', 'First Name') }}
            {{ Form::text('payment_firstname',null, array('class' => 'form-control', 'required')) }}

        </p>

        <p>
            {{ Form::label('payment_lastname', 'Last Name') }}
            {{ Form::text('payment_lastname',null, array('class' => 'form-control', 'required')) }}

        </p>

        <p>
            {{ Form::label('number', 'Card Number') }}
            {{ Form::text('card_number',null, array('class' => 'form-control','required')) }}

        </p>
        <p>
            {{ Form::label('month', 'Expire Month') }}
            {{ Form::text('exp_month',null, array('class' => 'form-control','required')) }} 

        </p>
        <p>
            {{ Form::label('year', 'Expire Year') }}
            {{ Form::text('exp_year',null, array('class' => 'form-control', 'required')) }}

        </p>

        <p>
            {{ Form::label('ccv2', 'CCV2') }}
            {{ Form::text('ccv2',null, array('class' => 'form-control', 'required')) }}

        </p>


    </section>
    
        <section id="basket">
           
            <h1>Shopping Bag</h1>

            <table width="100" border="1">
                <tr>
                    <th scope="col" class="description">Product</th>
                    <th scope="col" class="options">Options</th>
                    <th align="right" scope="col" class="price">Price</th>
                </tr>
                @foreach($cartitems as $cartitem)

                <tr>
                    <td align="left" valign="top" class="description">
                        <p>{{$cartitem['name']}}</p>

                    </td>
                    <td align="left" valign="top" class="options">
                        <dl>
                            <dt>Product price</dt>
                            <dd>{{$cartitem['price']}}</dd>
                            <dt>Quantity:</dt>
                            <dd>{{$cartitem['quantity']}}</dd>
                        </dl>

                    </td>
                    <td align="right" valign="top" class="price">&pound;{{$cartitem['price']*$cartitem['quantity']}}</td>
                </tr>
                @endforeach

            </table>

            <div class="right">

                <strong>Your total</strong> <em>&pound;{{Cart::total()}}</em>
            </div>

        </section>



    <p class="pay_button">{{ Form::submit('Pay Securely', array('class' => 'btn btn-primary')) }}</p>
    {{ Form::close() }}
</article>
@stop