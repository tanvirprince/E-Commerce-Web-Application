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
                   <h5> Wellcome Dear <strong> {{ Session::get('customerName') }},</strong> You have to give us your shipping address for completing the order process </h5>
                </div>
            </div>
            <div class="col-md-6 well col-md-offset-3">

                <h3 class="text-success text-center"> Shipping Details </h3>
                <br/>
                <form class="form-horizontal" action="{{ route('new-shipping') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-3" > Full Name </label>
                        <div class="col-md-9">
                            <input  type="text" value="{{ $customer->first_name.' '.$customer->last_name }}" name="full_name" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3" > Email  </label>
                        <div class="col-md-9">
                            <input type="email" value="{{ $customer->email_address }}" name="email_address" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3" > Phone Number </label>
                        <div class="col-md-9">
                            <input type="number" value="{{ $customer->phone_number }}" name="phone_number" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3" > Address </label>
                        <div class="col-md-9">
                            <textarea type="text" name="address" rows="8" class="form-control"> {{ $customer->address }}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" />
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

@endsection

