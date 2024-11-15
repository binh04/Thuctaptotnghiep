@extends('client.layouts.master')

@section('content')
    <!-- Begin Main Slide -->
    <!-- End Main Slide -->

    <!-- Begin Ads -->
    <!-- End Ads -->

    <!-- Begin Top Selling -->
    <section class="products-slide">
        <div class="container">
            <h2 class="title"><span>Top Sản Phẩm Bán Chạy</span></h2>
            <div class="row">
                <div id="owl-product-slide" class="owl-carousel product-slide">
                    @foreach ($topSeller as $product)
                        <div class="col-md-12 animation">
                            <div class="item product">
                                <div class="product-thumb-info">
                                    <div class="product-thumb-info-image">
                                        <span class="product-thumb-info-act">
                                            <a href="" data-toggle="modal" data-target=".quickview-wrapper"
                                                class="view-product" data-id="{{ $product->id }}">
                                                <span><i class="fa fa-external-link"></i></span>
                                            </a>
                                            <a href="shop-cart-full.html" class="add-to-cart-product">
                                                <span><i class="fa fa-shopping-cart"></i></span>
                                            </a>
                                        </span>
                                        <a href="{{ route('client.product.show', $product->id) }}">
                                            <img loading="lazy" alt="" class="img-responsive"
                                                src="{{ $product->image }}">
                                        </a>
                                    </div>

                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">{{ number_format($product->price_regular, 0, ',', '.') }} đ</span>
                                        <h4>
                                            <a href="{{ route('client.product.show', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h4>
                                        <span class="item-cat">
                                            <small>
                                                <a href="#">{{ $product->category->name }}</a>
                                            </small>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Selling -->

    <!-- Begin New Products -->
    <section class="product-tab">
        <div class="container">
            <h2 class="title"><span>Sản phẩm mới</span></h2>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs pro-tabs text-center animation" role="tablist">
                <li class="active"><a href="#man" role="tab" data-toggle="tab">Nam</a></li>
                <li><a href="#woman" role="tab" data-toggle="tab">Nữ</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="man">
                    <div class="row">
                        @foreach ($newProductMan as $product)
                        <div class="col-xs-6 col-sm-3 animation">
                            <div class="product">
                                <div class="product-thumb-info">
                                    <div class="product-thumb-info-image">
                                        <span class="product-thumb-info-act">
                                            <a href="" data-toggle="modal"
                                                data-target=".quickview-wrapper" class="view-product"
                                                data-id="{{ $product->id }}">
                                                <span><i class="fa fa-external-link"></i></span>
                                            </a>
                                            <a href="shop-cart-full.html" class="add-to-cart-product">
                                                <span><i class="fa fa-shopping-cart"></i></span>
                                            </a>
                                        </span>
                                        <a href="{{ route('client.product.show', $product->id) }}">
                                            <img alt="" class="img-responsive"
                                                src="{{ $product->image }}">
                                        </a>
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">{{ number_format($product->price_regular, 0, ',', '.') }} đ</span>
                                        <h4>
                                            <a
                                                href="{{ route('client.product.show', $product->id) }}">{{ $product->name }}</a>
                                        </h4>
                                        <span class="item-cat"><small><a
                                                    href="#">{{ $product->category->name }}</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane" id="woman">
                    <div class="row">
                        @foreach ($newProductWoman as $product)
                        <div class="col-xs-6 col-sm-3 animation">
                            <div class="product">
                                <div class="product-thumb-info">
                                    <div class="product-thumb-info-image">
                                        <span class="product-thumb-info-act">
                                            <a href="" data-toggle="modal"
                                                data-target=".quickview-wrapper" class="view-product"
                                                data-id="{{ $product->id }}">
                                                <span><i class="fa fa-external-link"></i></span>
                                            </a>
                                            <a href="shop-cart-full.html" class="add-to-cart-product">
                                                <span><i class="fa fa-shopping-cart"></i></span>
                                            </a>
                                        </span>
                                        <a href="{{ route('client.product.show', $product->id) }}">
                                            <img alt="" class="img-responsive"
                                                src="{{ $product->image }}">
                                        </a>
                                    </div>
                                    <div class="product-thumb-info-content">
                                        <span class="price pull-right">{{ number_format($product->price_regular, 0, ',', '.') }} đ</span>
                                        <h4>
                                            <a
                                                href="{{ route('client.product.show', $product->id) }}">{{ $product->name }}</a>
                                        </h4>
                                        <span class="item-cat"><small><a
                                                    href="#">{{ $product->category->name }}</a></small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End New Products -->

    <!-- Begin Parallax -->
    <!-- End Parallax -->

    <!-- Begin Latest Blogs -->
@endsection
