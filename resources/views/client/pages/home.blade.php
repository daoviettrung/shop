@extends('client.index')
@section('content')
    <div class="hero-slider">
        @foreach ($slide as $sl)
            <div class="slider-item th-fullpage hero-area"
                style="background-image: url({{ asset('assets/uploads/slide/' . $sl->image) }});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 text-center">
                            <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1"></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <section class="products section bg-gray">
        <div class="container">
            <div class="row">
                <div class="title text-center">
                    <h2>Trendy Products</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($product as $pr)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <span class="bage">Sale</span>
                                <img class="img-responsive" src="{{ asset('assets/uploads/product/' . $pr->image) }}"
                                    alt="product-img" />
                                <div class="preview-meta">
                                    <ul>
                                        <li>
                                            <span data-toggle="modal" data-target="#{{ $pr->id }}">
                                                <i class="tf-ion-ios-search-strong"></i>
                                            </span>
                                        </li>
                                        <li>
                                            <a href="#!"><i class="tf-ion-ios-heart"></i></a>
                                        </li>
                                        <li>
                                            <a onclick="addToCart({{ $pr->id }},{{ Auth::id() }});"
                                                href="#"><i class="tf-ion-android-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-single.html">{{ $pr->name }}</a></h4>
                                <p class="price">{{ $pr->price_sale }}.VND</p>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal product-modal fade" id="{{ $pr->id }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="tf-ion-close"></i>
                        </button>
                        <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <div class="modal-image">
                                                <img class="img-responsive"
                                                    src="{{ asset('assets/uploads/product/' . $pr->image) }}"
                                                    alt="product-img" />
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="product-short-details">
                                                <h2 class="product-title">{{ $pr->name }}</h2>
                                                <p class="product-price">{{ $pr->price_sale }}.VND</p>
                                                <p class="product-short-description">
                                                    {{ $pr->description }}
                                                </p>
                                                <a href="cart.html" class="btn btn-main">Add To Cart</a>
                                                <a href="#" class="btn btn-transparent">View Product
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal -->
                @endforeach

            </div>
            {{ $product->links() }}
        </div>
    </section>
    <script src="{{ asset('assets/client/js/common.js') }}"></script>
@endsection
