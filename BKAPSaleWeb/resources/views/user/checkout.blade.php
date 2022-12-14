@extends('user.master')
@section('main')
<div class="checkout__page--area">
    <div class="container">
        <div class="checkout__page--inner d-flex">
            <div class="main checkout__mian">
                <header class="main__header checkout__mian--header mb-30">
                    <h1 class="main__logo--title"><a class="logo logo__left mb-20" href="index.html"><img src="{{url('asset-user')}}/img/logo/nav-log.png" alt="logo"></a></h1>
                    <details class="order__summary--mobile__version">
                        <summary class="order__summary--toggle border-radius-5">
                            <span class="order__summary--toggle__inner">
                                <span class="order__summary--toggle__icon">
                                    <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="order__summary--toggle__text show">
                                    <span>Tóm tắt đơn hàng</span>
                                    <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="currentColor"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path></svg>
                                </span>
                                <span class="order__summary--final__price">{{$cart->getTotalPrice()}}</span>
                            </span>
                        </summary>
                        <div class="order__summary--section">
                            <div class="cart__table checkout__product--table">
                                <table class="summary__table">
                                    <tbody class="summary__table--body">
                                    @foreach ($cart->content() as $value )
                                        <tr class=" summary__table--items">
                                            <td class=" summary__table--list">
                                                <div class="product__image two  d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a href="product-details.html"><img class="border-radius-5" src="{{url('uploads/product')}}/{{$value['image']}}" alt="cart-product"></a>
                                                        <span class="product__thumbnail--quantity">{{$value['quantity_cart']}}</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h3 class="product__description--name h4"><a href="">{{$value['product_name']}}</a></h3>
                                                        <span class="product__description--name">Size: {{$value['size']}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class=" summary__table--list">
                                                <span class="cart__price">{{$value['price']*$value['quantity_cart']}}đ</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table> 
                            </div>
                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tbody class="checkout__total--body">
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Tạm tính </td>
                                            <td class="checkout__total--amount text-right">{{$cart->getTotalPrice()}}đ</td>
                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Phí vận chuyển </td>
                                            <td class="checkout__total--calculated__text text-right">Miễn phí</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">Tổng cộng </td>
                                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{$cart->getTotalPrice()}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </details>
                    <nav>
                        <ol class="breadcrumb checkout__breadcrumb d-flex">
                            <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                                <a class="breadcrumb__link" href="{{route('cart.index')}}">Giỏ hàng</a>
                                <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path></svg>
                            </li>
                    
                            <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                                <span class="breadcrumb__text current">Thông tin</span>
                                <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path></svg>
                            </li>
                            <li class="breadcrumb__item breadcrumb__item--blank">
                                <span class="breadcrumb__text">Thanh toán</span>
                            </li>
                        </ol>
                    </nav>
                </header>
                <main class="main__content_wrapper">
                    @if(!Auth::check())
                        <div class="checkout__content--step section__contact--information">
                            <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                <h2 class="section__header--title text-danger h3">Bạn vui lòng đăng nhập để tiếp tục mua hàng.</h2>
                                <p class="layout__flex--item">
                                    Đến trang đăng nhập?
                                    <a class="layout__flex--item__link" href="{{route('user.index')}}?page=checkout.index">Đăng nhập</a>  
                                </p>
                            </div>
                        </div>
                    @else
                    <form action="{{route('checkout.add-order')}}" method="POST">
                        @csrf
                        <div class="checkout__content--step section__shipping--address">
                            <div class="section__header mb-25">
                                <h3 class="section__header--title">Thông tin đơn hàng</h3>
                            </div>
                            <div class="section__shipping--address__content">
                                <div class="row">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <div class="col-lg-6 mb-12 form-group">
                                        <div class="checkout__input ">
                                            <input name="name" value="{{Auth::user()->name}}" class="checkout__input--field border-radius-5" placeholder="Họ và tên"  type="text">
                                        </div>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 mb-12 form-group">
                                        <div class="checkout__input ">
                                            <input name="phone" value="{{Auth::user()->phone}}" class="checkout__input--field border-radius-5" placeholder="Số điện thoại"  type="number">
                                        </div>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mb-12 form-group">
                                        <div class="checkout__input ">
                                            <input name="email" value="{{Auth::user()->email}}" class="checkout__input--field border-radius-5" placeholder="Email"  type="email">
                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mb-12 form-group">
                                        <div class="checkout__input ">
                                            <input name="address" value="{{old('address')}}" class="checkout__input--field border-radius-5" placeholder="Địa chỉ nhận hàng"  type="text">
                                        </div>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 mb-12 form-group">
                                        <div class="checkout__input ">
                                            <input name="note" value="{{old('note')}}" class="checkout__input--field border-radius-5" placeholder="Ghi chú"  type="text">
                                        </div>
                                    </div>
 
                                </div>
                            </div>
                        </div>
                        <div class="checkout__content--step__footer d-flex align-items-center">
                            <button type="submit" class="continue__shipping--btn primary__btn border-radius-5">Đặt hàng</button>
                            <a class="previous__link--content" href="{{route('cart.index')}}">Quay lại trang giỏ hàng</a>
                        </div>
                    </form>
                    @endif
                </main>
                <footer class="main__footer checkout__footer">
                    <p class="copyright__content">Copyright © 2022 <a class="copyright__content--link text__primary" href="">YouthH&T</a> . All Rights Reserved.Design By YouthH&T</p>
                </footer>
            </div>
            <aside class="checkout__sidebar sidebar">
                <div class="cart__table checkout__product--table">
                    <table class="cart__table--inner">
                        <tbody class="cart__table--body">
                        @foreach ($cart->content() as $value )
                            <tr class="cart__table--body__items">
                                <td class="cart__table--body__list">
                                    <div class="product__image two  d-flex align-items-center">
                                        <div class="product__thumbnail border-radius-5">
                                            <a href="product-details.html"><img class="border-radius-5" src="{{url('uploads/product')}}/{{$value['image']}}" alt="cart-product"></a>
                                            <span class="product__thumbnail--quantity">{{$value['quantity_cart']}}</span>
                                        </div>
                                        <div class="product__description">
                                            <h3 class="product__description--name h4"><a href="">{{$value['product_name']}}</a></h3>
                                            <span class="product__description--name">Size: {{$value['size']}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__table--body__list">
                                    <span class="cart__price">{{$value['price']*$value['quantity_cart']}}đ</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table> 
                </div>
                <div class="checkout__total">
                    <table class="checkout__total--table">
                        <tbody class="checkout__total--body">
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Tạm tính </td>
                                <td class="checkout__total--amount text-right">{{$cart->getTotalPrice()}}đ</td>
                            </tr>
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Phí vận chuyển </td>
                                <td class="checkout__total--calculated__text text-right">Miễn phí</td>
                            </tr>
                        </tbody>
                        <tfoot class="checkout__total--footer">
                            <tr class="checkout__total--footer__items">
                                <td class="checkout__total--footer__title checkout__total--footer__list text-left">Tổng cộng </td>
                                <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{$cart->getTotalPrice()}}đ</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </aside>
        </div>
    </div>
</div>
@stop