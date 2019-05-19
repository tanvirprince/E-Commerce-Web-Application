<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class brandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }
    public function saveBrand(Request $request){
        $this->validate($request,[
            'brand_name' => 'required|regex:/^[\pL\s-]+$/u|min:2|max:30',
            'brand_description' => 'required',
            'publication_status' => 'required'
        ]);
        $brand = new Brand();
        $brand->brand_name           = $request->brand_name ;
        $brand->brand_description    = $request->brand_description;
        $brand->publication_status      = $request->publication_status;
        $brand->save();

        return redirect('/add-brand')->with('message','Category info save successfully');


    }

    public function ManageBrand(){
        $brands = Brand::all();

        return view('admin.brand.manage-brand',['brands'=>$brands]);
    }

    public function unpublishedBrand($id){
        $unpublished = Brand::find($id);
        $unpublished->publication_status = 0;
        $unpublished->save();

        return redirect('/manage-brand')->with('message','Category Information Unpublished');


    }
    public function publishedBrand($id){
        $published = Brand::find($id);
        $published->publication_status = 1;
        $published->save();

        return redirect('/manage-brand')->with('message','Brand Information Unpublished');



    }

    public function editBrand($id){
        $brand = Brand::find($id);
        return view('admin.brand.edit-brand', ['brand' => $brand]);
    }

    public function updateBrand(Request $request){
        $brand = Brand::find($request->brand_id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();

        return redirect('/manage-brand')->with('message','Brand Info updated');

    }

    public function deleteBrand($id){

        $delete = Brand::find($id);
        $delete->delete();
        return redirect('/manage-brand')->with('message','Brand Information Deleted');




    }
}
