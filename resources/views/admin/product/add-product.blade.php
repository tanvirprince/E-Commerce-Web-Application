@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Add Product Form </h4>
                </div>
                <div class="panel-body">

                    <h2 class="text-success text-center">{{ Session::get('message') }}</h2>

                     {{ Form::open(['route'=>'new-product', 'method'=>'post', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'  ]) }}


                        <div class="form-group">
                            <label class="control-label col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option> -- Category Name -- </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"> Brand ID </label>
                            <div class="col-md-9">
                                <select class="form-control" name="brand_id">
                                    <option> -- Brand Name -- </option>
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->id  }}"> {{ $brand->brand_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Product Name </label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="product_name"></textarea>
                                <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ' ' }}</span>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Price </label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="product_price"></textarea>
                                <span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : ' ' }}</span>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Quantity </label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="product_quantity"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3"> Short Description </label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"> Long Description </label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="editor" name="long_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3"> Product Image </label>
                            <div class="col-md-9">
                                <input type="file" accept="image/*" name="product_image"/>
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="control-label col-md-3">Publication status</label>
                            <div class="col-md-9 radio">
                                <label><input type="radio" name="publication_status" value="1"/> Published</label>
                                <label><input type="radio" name="publication_status" value="0"/> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" value="Save Product Info" class="btn btn-success btn-block"/>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection