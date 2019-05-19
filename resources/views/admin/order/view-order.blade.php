@extends('admin.master')
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success"> Customer Order Details </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th> Order ID </th>
                            <td> {{ $order->id }} </td>
                        </tr>

                        <tr>
                            <th> Order Total </th>
                            <td> {{ $order->order_total }} TK. </td>
                        </tr>
                        <tr>
                            <th> Order Status </th>
                            <td> {{ $order->order_status }}</td>
                        </tr>
                        <tr>
                            <th> Order Date </th>
                            <td> {{ $order->created_at }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success"> Customer Info For Order  </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th> Customer Name</th>
                            <td> {{ $customer->first_name.' '.$customer->last_name  }}</td>
                        </tr>

                        <tr>
                            <th> Email Address </th>
                            <td> {{ $customer->email_address  }} </td>
                        </tr>
                        <tr>
                            <th> Phone Number </th>
                            <td> {{ $customer->phone_number  }}</td>
                        </tr>
                        <tr>
                            <th> Address </th>
                            <td> {{ $customer->address  }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success"> Shipping Info For Order Details </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th> Full Name </th>
                            <td> {{ $shipping->full_name }}</td>
                        </tr>

                        <tr>
                            <th> Email Address </th>
                            <td> {{ $shipping->email_address }}</td>
                        </tr>
                        <tr>
                            <th> Phone Number </th>
                            <td> {{ $shipping->phone_number }}</td>
                        </tr>
                        <tr>
                            <th> Address </th>
                            <td> {{ $shipping->address }}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success"> Payments Info For Order </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th> Payment Type </th>
                            <td> {{ $payment->payment_type }}</td>
                        </tr>

                        <tr>
                            <th> Payment Status </th>
                            <td> {{ $payment->payment_status }} </td>
                        </tr>


                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success"> Products Info For Order </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th> Product Name </th>
                            <th> Product Price </th>
                            <th> Product Quantity </th>
                            <th> Total Price </th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td> {{ $product->product_name }}</td>
                                <td> {{ $product->product_price }} TK. </td>
                                <td> {{ $product->product_quantity }}</td>
                                <td> {{ $product->product_price*$product->product_quantity }} TK. </td>

                            </tr>
                            @endforeach


                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection