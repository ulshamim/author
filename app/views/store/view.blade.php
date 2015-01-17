@extends('layouts.main')
@section('content')
<article id="mainview">


    <!--    <div id="breadcrumb"><a href="index.html">Home</a> > <a href="search.html">Dresses</a> > <a href="search.html">Summer Dress</a> > Summer Dress</div>-->
    {{Form::open(array('url'=>'store/add-to-cart','type'=>'post','files' => TRUE, 'role' => 'form'))}}
    {{ Form::hidden('id', $product->id) }}
    {{ Form::hidden('name', $product->name) }}
    {{ Form::hidden('price', $product->price) }}



    <div id="description">
        <h1>{{$product->name}}</h1>
        <strong id="price">&pound;{{$product->price}}</strong>
        <div>
            {{$product->long_description}}
        </div>
<!--        <p>
            <select>
                <option value="1" selected="selected">Select colour</option>
                <option value="Blue">Blue</option>
                <option value="Beige">Beige</option>
            </select>
        </p>
        <p>
            <select disabled="disabled">
                <option value="-1">First select a colour</option> 
            </select>
            <button type="button">Size guide</button>
        </p>-->
        <p><input type="submit" class="continue" name="submit" value="Add To Bag"></p>
        <!--<p><button type="button">Tell a friend</button></p>-->
        <!--        <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1" class="first">Delivery</a></li>
                        <li><a href="#tabs-2">Returns</a></li>
                        <li><a href="#tabs-3">Info &amp; Care</a></li>
                    </ul>
                    <section id="tabs-1">
                        <p> <strong>UK Style Saver:</strong> Within 6 working days –          FREE</p>
                        <p> <strong>UK Standard:</strong> Within 3 working days – £3.95 or FREE if                  you spend over £75.00</p>
                        <p> <strong>UK Next Day: </strong>Order by 6pm Weekdays or 2pm          Sunday - £5.95 or               FREE if you spend over £100</p>
                        <p> <strong>UK Same day delivery:</strong> Order by 10am Monday - Sunday you will receive your goods the same          day - £7.95</p>
                        <p> <a shape="rect" href="#" title="View more information on International and UK delivery times">More info on International and UK delivery times</a></p>
        </section>
                    <section id="tabs-2">
                      <p>If you are not completely satisfied with your purchase, simply return the items to us in their original condition and packaging within 28 days of receipt and we will issue a full refund (excluding original delivery charge), or exchange the item for a different size / colour, if preferred.</p>
                      <p>Please <a href="#">click here</a> for further information</p>
                    </section>
                    <section id="tabs-3">
                        <p>Dry clean only, cashmere or silk so be careful, mkaybi</p>
                    </section>
                </div>-->
    </div>
    <div id="images">
        <a href="images/main.jpg">
            @foreach( $product->images as $image )
            <div class="large-image">
                {{ Form::hidden('image', $imageUrl.$image->path) }}
                {{ HTML::image($imageUrl . $image->path, $product->name, array('class' => 'img-medium', 'alt' => $image->path)) }}
            </div>
            @endforeach
        </a>

        <p>Rollover to zoom. Click to enlarge.</p>
        <span class="sale">Sale</span>
        <div id="productthumbs">
            <a href="#"><img src="images/thumb1.jpg" /></a><a href="#"><img src="images/thumb2.jpg" /></a><a href="#"><img src="images/thumb3.jpg" /></a>
        </div>
    </div>
    {{Form::close()}}
</article>
@stop