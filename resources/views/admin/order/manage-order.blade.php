@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success"> Manage Order </h4>
                </div>
                <div class="panel-body">
                    <h2 class="text-success text-center">{{ Session::get('message') }}</h2>
                    <table class="table table-bordered">
                        <tr class="bg-success">
                            <th> SL No</th>
                            <th> Customer Name</th>
                            <th> Order Total </th>
                            <th> Order status </th>
                            <th> Payment Type</th>
                            <th> Payment Status</th>
                            <th> Order Date </th>
                            <th> Action  </th>
                        </tr>

                        @php($i=1)
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $i++ }} </td>
                                <td> {{ $order->first_name.' '.$order->last_name }} </td>
                                <td> {{ $order->order_total }} </td>
                                <td> {{ $order->order_status }} </td>
                                <td> {{ $order->payment_type }} </td>
                                <td> {{ $order->payment_status }} </td>
                                <td> {{ $order->created_at = date("g:i a, j F'y") }} </td>

                                <td>
                                        <a href="{{ route('view-order-detail',['id'=>$order->id]) }}" class="btn btn-info btn-xs" title="View Order Details">
                                            <span class="glyphicon glyphicon-zoom-in"></span>
                                        </a>

                                        <a href="{{ route('view-order-invoice',['id'=>$order->id]) }}" class="btn btn-warning btn-xs" title="View Order Invoice">
                                            <span class="glyphicon glyphicon-zoom-out"></span>
                                        </a>

                                    <a href="{{ route('download-invoice',['id'=>$order->id]) }}" class="btn btn-info btn-xs" title="Download Invoice">
                                            <span class="glyphicon glyphicon-download"></span>
                                        </a>


                                    <a href="{{ route('edit-category',['id'=>$order->id]) }}" class="btn btn-success btn-xs" title="Edit Order">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>

                                    <a href="{{ route('delete-category',['id'=>$order->id]) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are Sure to delete this???') " title="Delete Order">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection