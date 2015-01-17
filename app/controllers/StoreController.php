<?php

use Redooor\Redminportal\Product;

class StoreController extends BaseController {

    protected $model;


    public function __construct(Product $product) {
        $this->model = $product;
       
    }

    public function home() {
        return View::make('store.home');
    }

    public function getIndex() {


        $products = Product::orderBy('category_id')->orderBy('name')->paginate(20);

        return View::make('store.products')->with('products', $products)->with('imageUrl', 'assets/img/products/');
    }

    public function getView($id) {


        $product = Product::find($id);

        return View::make('store.view')->with('product', $product)->with('imageUrl', 'assets/img/products/');
    }

    public function postAddToCart() {
//         $ordervalues=Input::all();
//         print_r($ordervalues);
        $items = array(
            'id' => Input::get('id'),
            'name' => Input::get('name'),
            'price' => Input::get('price'),
            'quantity' => 1,
            'imgpath'=>Input::get('image')
        );
        Cart::insert($items);
        $product = Product::find(Input::get('id'));

        return View::make('store.view')->with('product', $product)->with('imageUrl', 'assets/img/products/');
    }

    public function getCart() {
        $cartItems = Cart::contents(true);
        
        return View::make('store.cart')->with('cartitems', $cartItems)->with('imageUrl', 'assets/img/products/');
    }

}
