@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success"> Manage Product </h4>
                </div>
                <h4> Current Page Item: {{ $products->count() }} </h4>
                <h4> Total Product: {{ $products->total() }} </h4>
                <div class="panel-body">
                    <h2 class="text-success text-center">{{ Session::get('message') }}</h2>
                    <table class="table table-bordered">
                        <tr class="bg-success">
                            <th> SL No</th>
                            <th> Category Name </th>
                            <th> Brand Name </th>
                            <th> Product Name </th>
                            <th> Product Price </th>
                            <th> Product Image </th>
                            <th> Publication Status </th>
                            <th> Action  </th>
                        </tr>

                        @php($i=1)
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $i++ }} </td>
                                <td> {{ $product->category_name }} </td>
                                <td> {{ $product->brand_name }} </td>
                                <td> {{ $product->product_name }} </td>
                                <td> {{ $product->product_price }} </td>
                                <td><img src=" {{asset($product->product_image)}} " alt="" height="120" width="120" > </td>
                                <td> {{ $product->publication_status == 1 ? 'published' : 'Unpublished'  }} </td>
                                <td>
                                    <a href="{{route('view-product',['id'=>$product->id])}}" class="btn btn-info btn-xs" title="View Full Details">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    <a href="" class="btn btn-primary btn-xs" title="Publication Status">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                    <a href="{{ route('edit-product',['id'=>$product->id]) }}" class="btn btn-success btn-xs" title="Edit Product">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    {{ $products->links() }}




                </div>
            </div>
        </div>
    </div>

@endsection