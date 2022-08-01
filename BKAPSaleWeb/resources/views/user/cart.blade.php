@extends('user.master')
@section('main')
<main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Shopping Cart</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Shopping Cart</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container-fluid">
                <div class="cart__section--inner">
                        <h2 class="cart__title mb-40">Giỏ hàng của bạn</h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart__table">
                                    <table class="cart__table--inner">
                                        <thead class="cart__table--header">
                                            <tr class="cart__table--header__items">
                                                <th class="cart__table--header__list">Sản phẩm</th>
                                                <th class="cart__table--header__list">Giá</th>
                                                <th class="cart__table--header__list">Số lượng</th>
                                                <th class="cart__table--header__list">Số tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cart__table--body">
                                            @foreach ($cart->content() as $value )
                                                
                                                <tr class="cart__table--body__items">
                                                    <td class="cart__table--body__list">
                                                        <div class="cart__product d-flex align-items-center">
                                                            <a class="cart__remove--btn" aria-label="search button" href="{{route('cart.delete', [$value['product_id'],$value['size']] )}}">
                                                                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                                            </a>
                                                            <div class="cart__thumbnail">
                                                                <a href="product-details.html"><img class="border-radius-5" src="{{url('uploads/product')}}/{{$value['image']}}" alt="cart-product"></a>
                                                            </div>
                                                            <div class="cart__content">
                                                                <h4 class="cart__content--title"><a href="product-details.html">{{$value['product_name']}}</a></h4>
                                                                <span class="cart__content--variant">Size: {{$value['size']}} </span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="cart__table--body__list">
                                                        <span class="cart__price">{{$value['price']}}đ</span>
                                                    </td>
                                                    <td class="cart__table--body__list">
                                                        <form action="{{route('cart.update')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$value['product_id']}}">
                                                            <input type="hidden" name="size" value="{{$value['size']}}">
                                                            <div class="quantity__box">
                                                                <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                                                <label>
                                                                    <input type="number" name="quantity_cart" class="quantity__number quickview__value--number" value="{{$value['quantity_cart']}}" data-counter/>
                                                                </label>
                                                                <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                                            </div>
                                                            <button class="btn btn-warning" type="submit"><h6>Cập nhật</h6></button>
                                                        </form>
                                                    </td>
                                                    <td class="cart__table--body__list">
                                                        <span class="cart__price end">{{$value['quantity_cart'] * $value['price']}}đ</span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="col-lg-9 mx-auto d-flex justify-content-end">
                                        <span class="font-weight-bold">Tổng tiền : {{$totalPrice}}đ </span>
                                        <span class="totalPrice lg-4"></span>
                                    </div>
                                    <div class="continue__shopping d-flex justify-content-between">
                                        <a class="continue__shopping--link" href="{{route('home.index')}}">Tiếp tục mua sắm</a>
                                        <div>
                                            <a class="btn btn-warning" href="{{route('cart.index')}}"><h6>Trở lại</h6></a>
                                            <a class="btn btn-primary" href="{{route('checkout.index')}}"><h6>Thanh toán ngay</h6></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                </div>
            </div>     
        </section>
        <!-- cart section end -->

        <!-- Start product section -->
        <section class="product__section section--padding pt-0">
            <div class="container-fluid">
                <div class="section__heading text-center mb-50">
                    <h2 class="section__heading--maintitle">Sản phẩm tương tự</h2>
                </div>
            </div>
        </section>
        <!-- End product section -->
        
        <!-- Start shipping section -->
        <section class="shipping__section2 shipping__style3 section--padding">
            <div class="container">
                <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{url('asset-user')}}/img/other/shipping1.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Shipping</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{url('asset-user')}}/img/other/shipping2.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Payment</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{url('asset-user')}}/img/other/shipping3.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Return</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="{{url('asset-user')}}/img/other/shipping4.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Support</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->

    </main>

@stop