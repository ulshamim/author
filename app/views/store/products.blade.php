@extends('layouts.main')
@section('content')


<article id="grid">
    <!--	<div id="breadcrumb"><a href="index.html">Home</a> > <a href="search.html">Dresses</a> > <h1>Summer Dress</h1></div>
        <header>
            <div class="paging">
                Page: <a onclick="javascript:return getPage(1);" href="">1</a>&nbsp; | &nbsp;2&nbsp; | &nbsp;<a onclick="javascript:return getPage(3);" href="">3</a>  |  <a onclick="javascript:return getPage('', '', '1');" href="">View All</a>
            </div>
            <form action="#" >
            <select onchange="javascript:addSort();" name="sortBy" id="sortBy">
                <option value="">Default</option>
                <option value="PriceHiLo">Price (High to Low)</option>
                <option value="PriceLoHi">Price (Low to High)</option>
                <option value="pID">Most Recent</option>
            </select> &nbsp; Showing 26 - 50 of 78 Product(s)
            </form>
        </header>-->
    <ul id="items">
        @foreach($products as $product)

        <li>
            <a href="/store/view/{{$product->id}}">
                
                @foreach( $product->images as $image )
                <?php //print_r($image) ?>
                {{ HTML::image($imageUrl . $image->path, $product->name, array('class' => 'img-thumbnail', 'alt' => $image->path)) }}
            </a>
            @endforeach
            <a href="/store/view/{{$product->id}}" class="title">{{$product->name}}</a>
            <strong>&pound;{{$product->price}}</strong>
        </li>
        @endforeach
    </ul>


    <footer>
        <div class="paging">
            Page: <a onclick="javascript:return getPage(1);" href="">1</a>&nbsp; | &nbsp;2&nbsp; | &nbsp;<a onclick="javascript:return getPage(3);" href="">3</a>  |  <a onclick="javascript:return getPage('', '', '1');" href="">View All</a>
        </div>
    </footer>
</article>
@stop