@extends('front-end.master')
@section('title')
    Checkout
@endsection
@section('body')
    <br/>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center well text-success">
                    <h5> Wellcome Dear <strong> {{ Session::get('customerName') }},</strong> You have to give us Payment Information to complete the valuable order  </h5>
                </div>
            </div>
            <div class="col-md-6 well col-md-offset-3">

                <h3 class="text-success text-center"> Shipping Details </h3>
                <br/>
                <form class="form-horizontal" action="{{ route('new-order') }}" method="post">
                    {{ csrf_field() }}

                    <table class="table table-bordered">
                        <tr>
                            <th> Cash On Delivery </th>
                            <td> <input type="radio" name="payment_type" value="cash" /> </td>
                        </tr>
                        <tr>
                            <th> Bkash </th>
                            <td> <input type="radio" name="payment_type" value="Bkash" /> </td>
                        </tr>
                        <tr>
                            <th> Card Payment </th>
                            <td> <input type="radio" name="payment_type" value="Card Payment" /> </td>
                        </tr>
                        <tr>
                            <th>  </th>
                            <td> <input type="submit" name="btn" class="btn btn-success" value="Confirm Order" /> </td>
                        </tr>
                    </table>


                </form>

            </div>

        </div>

    </div>

@endsection

