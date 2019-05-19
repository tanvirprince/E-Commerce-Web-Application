@extends('front-end.master')

@section('title')
    Product
@endsection

@section('body')


    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a href="care.html"><img class="first-slide" src="{{ asset('/') }}front/images/ba1.jpg" alt="First slide"></a>

            </div>
            <div class="item">
                <a href="kitchen.html"><img class="second-slide " src="{{ asset('/') }}front/images/ba.jpg" alt="Second slide"></a>

            </div>
            <div class="item">
                <a href="hold.html"><img class="third-slide " src="{{ asset('/') }}front/images/ba2.jpg" alt="Third slide"></a>

            </div>
        </div>

    </div><!-- /.carousel -->

    <!--content-->
    <div class="kic-top ">
        <div class="container ">
            <div class="kic ">
                <h3>Popular Categories</h3>

            </div>
            <div class="col-md-4 kic-top1">
                <a href="{{ route('natural-cream') }}">
                    <img src="{{ asset('/') }}front/images/ki3.jpg" class="img-responsive" alt="">
                </a>
                <h6>Natural Cream</h6>
                <p>Nam libero tempore</p>
            </div>
            <div class="col-md-4 kic-top1">
                <a href="single.html">
                    <img src="{{ asset('/') }}front/images/ki4.jpg" class="img-responsive" alt="">
                </a>
                <h6>Shaving Kit</h6>
                <p>Nam libero tempore</p>
            </div>
            <div class="col-md-4 kic-top1">
                <a href="single.html">
                    <img src="{{ asset('/') }}front/images/ki5.jpg" class="img-responsive" alt="">
                </a>
                <h6>Makeup Kit</h6>
                <p>Nam libero tempore</p>
            </div>
        </div>
    </div>

    <!--content-->
    <div class="product">
        <div class="container">
            <div class="spec ">
                <h3>Products</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>


            <div class=" con-w3l agileinf">
                @foreach($products as $product)
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="{{ route('product-details',['id'=>$product->id]) }}"  class="offer-img">
                            <img src="{{ asset($product->product_image) }}" class="img-responsive" alt="">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                                <h6><a href="">{{ $product->product_name }}</a>(250 g)</h6>
                            </div>
                            <div class="mid-2">
                                <p >TK.<em class="item_price">{{ $product->product_price }}</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="add">
                                <button class="btn btn-danger my-cart-btn my-cart-b" data-id="36" data-name="Baby Oil" data-summary="summary 36" data-price="6.00" data-quantity="1" data-image="{{ asset('/') }}front/images/of36.png">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



                <div class="clearfix"></div>
            </div>
        </div>
    </div>



@endsection

