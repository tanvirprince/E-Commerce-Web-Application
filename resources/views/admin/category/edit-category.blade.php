@extends('admin.master')
@section('body')
    <br/>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Edit category Form </h4>
                </div>
                <div class="panel-body">

                    <h2 class="text-success text-center">{{ Session::get('message') }}</h2>
                    <form action="{{ route('update-category') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <input type="text" value="{{ $category->category_name }}" name="category_name" class="form-control"/>
                                <input type="hidden" value="{{ $category->id }}" name="category_id" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="category_description"> {{ $category->category_description }} </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Publication status</label>
                            <div class="col-md-9 radio">
                                <label><input type="radio" name="publication_status" value="1" {{ $category->publication_status == 1 ? 'checked' : '' }} /> Published</label>
                                <label><input type="radio" name="publication_status" value="0"  {{ $category->publication_status == 0 ? 'checked' : '' }} /> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" value="Update Category Info" class="btn btn-success btn-block"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection