<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use DB;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status', 1)->get();

        return view('admin.product.add-product', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }


    public function manageProduct(){
        $products = DB::table('products')
            ->join('categories','products.category_id', '=','categories.id')
            ->join('brands','products.brand_id','=', 'brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->paginate('7');


        return view('admin.product.manage-product',['products'=>$products]);

    }

    protected function productImageUpload($request){

        $productImage = $request->file('product_image');
        $imageName = $productImage->getClientOriginalName();
        $directory = 'product-images/';
        $imageUrl =  $directory.$imageName;
        Image::make($productImage)->save($imageUrl);

        return $imageUrl;

    }

    protected function saveProductBasicInfo($request, $imageUrl){

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;

        $product->save();
    }

    public function newProduct(Request $request){
             $this->validate($request,[
            'product_name' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required'
        ]);

//             $productImage = $request->file('product_image');
//             $imageName = $productImage->getClientOriginalName();
//             $directory = 'product-images/';
//             $imageUrl =  $directory.$imageName;
//             $productImage->move($directory, $imageName);

             $imageUrl = $this->productImageUpload($request);
             $this->saveProductBasicInfo($request, $imageUrl);

             return redirect('/product/add')->with('message','Save successfully');

    }

    public function viewProduct($id){



        $product = Product::find($id);








        return view('admin.product.view-product',['product'=>$product]);
    }

    public function editProduct($id){
        $categories = Category::where('publication_status',1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        $products = Product::find($id);
        return view('admin.product.edit-product',[
            'products'=>$products,
            'brands'=>$brands,
            'categories'=>$categories

        ]);

    }
    public function updateProduct(Request $request){
        $productImage = $request->file('product_image');

        if($productImage){

            $product = Product::find($request->product_id);
            unlink($product->product_image);

            $imageName = $productImage->getClientOriginalName();
            $directory = 'product-images/';
            $imageUrl =  $directory.$imageName;
            Image::make($productImage)->save($imageUrl);

            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->product_image = $imageUrl;
            $product->publication_status = $request->publication_status;

            $product->save();

            return redirect('/product/manage')->with('message','Updated Products');




        }else{

            $product = Product::find($request->product_id);

            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->product_name = $request->product_name;
            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;

            $product->publication_status = $request->publication_status;

            $product->save();

            return redirect('/product/manage')->with('message','Updated Products');
        }

    }

}
