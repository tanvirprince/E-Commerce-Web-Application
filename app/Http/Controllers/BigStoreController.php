<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class BigStoreController extends Controller
{
    public function index(){
        $categories = Category::where('publication_status',1)->get();
        $products = Product::orderBy('id','desc')->take(4)->get();


        return view('front-end.home.home',['categories'=>$categories,'products'=>$products]);

    }
    public function categoryProduct($id){
        // pathai dichi app service provider e
        $products = Product::where('category_id', $id)
            ->where('publication_status', 1)
            ->orderBy('id','desc')
            ->get();


        return view('front-end.category.category',['products'=>$products]);

    }



    public function productDetails($id){
        $product = Product::find($id);
        return view('front-end.product.product-details', ['product'=>$product]);
    }
}
