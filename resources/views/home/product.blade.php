<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach ($products as $pro)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{url('product_details',$pro->id )}}" class="option1">
                                    Product Details
                                </a>
                                <a href="{{url('product_details',$pro->id )}}" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="product/{{ $pro->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $pro->title }}
                            </h5>
                            @if ($pro->discount_price != null)
                                <h6 style="color: red">
                                    After discount <br>
                                    ${{ $pro->discount_price }}
                                </h6>

                                <h6 style="text-decoration:line-through; color:blue">
                                    Price  <br>
                                    ${{ $pro->price }}
                                </h6>
                            @else
                                <h6>
                                    Price <br>
                                    ${{ $pro->price }}
                                </h6>
                            @endif


                        </div>
                    </div>
                </div>
            @endforeach
            {{-- {!!$products->withQueryString()->links('pagination::bootstrab-5')!!} --}}
        </div>
        <div class="d-flex justify-content-center pt-10"> {!! $products->links() !!}
        </div>

</section>
