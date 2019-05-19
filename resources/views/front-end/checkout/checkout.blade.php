@extends('front-end.master')
@section('title')
Checkout
@endsection
@section('body')
    <br/>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well text-success">
                You have to login for your valueable order placement
                </div>
                </div>
            <div class="col-md-6 well">

                <h3 class="text-success text-center"> Registration Form </h3>
                <br/>
                <form class="form-horizontal" action="{{ route('new-customer') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-3" > First Name </label>
                        <div class="col-md-9">
                            <input type="text" name="first_name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3" > Last Name </label>
                        <div class="col-md-9">
                            <input type="text" name="last_name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3" > Email  </label>
                        <div class="col-md-9">
                            <input type="email" id="email_address" name="email_address" class="form-control" />
                            <span class="text-success" id="res">  </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3" > Password  </label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3" > Phone Number </label>
                        <div class="col-md-9">
                            <input type="number" name="phone_number" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3" > Address </label>
                        <div class="col-md-9">
                            <textarea type="text" name="address" rows="8" class="form-control"> </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" id="regBtn" name="btn" class="btn btn-success btn-block" />
                        </div>
                    </div>
                </form>

            </div>

            <div class="col-md-6 well">

                <h3 class="text-success text-center"> Login Form </h3>
                <br/>
                <form class="form-horizontal" action="{{ route('customer-login') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-3" > Email  </label>
                        <div class="col-md-9">
                            <input type="email" name="email_address" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3" > Password  </label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" value="login" class="btn btn-success btn-block" />
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <script>
        var email_address = document.getElementById('email_address');
        email_address.onblur = function () {

            var email = document.getElementById('email_address').value;
            var xmlHttp = new XMLHttpRequest();
            var serverPage = ('http://localhost/prince72/public/ajax-email-check/'+email);
            xmlHttp.open('GET', serverPage);
            xmlHttp.onreadystatechange = function () {
                if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById('res').innerHTML = xmlHttp.responseText;
                    if (xmlHttp.responseText == 'already exist'){
                        document.getElementById('regBtn').disabled = true;
                    }else {
                        document.getElementById('regBtn').disabled = false;
                    }
                }
            }
            xmlHttp.send(null);
        }

    </script>

@endsection

