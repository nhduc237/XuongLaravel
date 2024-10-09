@extends('client.layouts.master')

@section('content')
    <div class="site-blocks-cover" style="background-image: url(/client/images/hero_1.jpg)" data-aos="fade">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                    <h1 class="mb-2">HD shop</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4">
                            Mua ban quần á uy tín hàng đầu Việt Nam
                        </p>
                        <p>
                            <a href="#" class="btn btn-sm btn-primary">Mua ngay</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Miễn phí giao hàng</h2>
                        <p>
                            Miễn phí giao hàng giúp bạn tiết kiệm chi phí khi mua sắm, tạo điều kiện thuận lợi và khuyến
                            khích bạn mua sắm nhiều hơn.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Trả hàng miễn phí</h2>
                        <p>
                            Trả hàng miễn phí giúp bạn an tâm hơn khi mua sắm, cho phép bạn đổi hoặc trả lại sản phẩm mà
                            không mất thêm chi phí.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Hỗ trợ khách hàng</h2>
                        <p>
                            Đội ngũ hỗ trợ khách hàng của chúng tôi luôn sẵn sàng 24/7 để giải đáp mọi thắc mắc và giúp bạn
                            có trải nghiệm mua sắm tốt nhất.


                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-blocks-2">
        <div class="container">

            <div class="row">
                @foreach ($categories as $p)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">

                        <a class="block-2-item" href="#">

                            <figure class="image">
                                @if ($p->image)
                                    <img src="{{ Storage::url($p->image) }}" class="img-fluid" alt="">
                                @endif
                            </figure>
                            <div class="text">
                                {{-- <span class="text-uppercase">Collections</span> --}}
                                <h3>{{ $p->name }}</h3>
                            </div>

                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </div>


    {{-- @include('client.components.featured-product') --}}
    @include('client.components.featured-product', ['products' => $products])



    <div class="site-section block-8">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Big Sale!</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 mb-5">
                    <a href="#"><img src="/client/images/blog_1.jpg" alt="Image placeholder"
                            class="img-fluid rounded" /></a>
                </div>
                <div class="col-md-12 col-lg-5 text-center pl-md-5">
                    <h2><a href="#">50% less in all items</a></h2>
                    <p class="post-meta mb-4">
                        By <a href="#">Carl Smith</a>
                        <span class="block-8-sep">&bullet;</span>
                        September 3, 2018
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Quisquam iste dolor
                        accusantium facere corporis ipsum animi deleniti
                        fugiat. Ex, veniam?
                    </p>
                    <p>
                        <a href="#" class="btn btn-primary btn-sm">Shop Now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
