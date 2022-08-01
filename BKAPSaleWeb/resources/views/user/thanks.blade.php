@extends('user.master')
@section('main')
<div class="checkout__page--area">
    <div class="container">
        <div class="checkout__page--inner d-flex">
            <div class="main checkout__mian">
                <header class="main__header checkout__mian--header mb-30">
                    <h1 class="main__logo--title"><a class="logo logo__left mb-20" href="{{route('home.index')}}"><img src="{{url('asset-user')}}/img/logo/nav-log.png" alt="logo"></a></h1>
                    
                </header>
                <main class="main__content_wrapper">    
                    <div class="checkout__content--step section__shipping--address pt-0">
                        <div class="section__header checkout__header--style3 position__relative mb-25">
                            <span class="checkout__order--number">Thành công!</span>
                            <h2 class="section__header--title h3">Cảm ơn bạn đã tin dùng sản phẩm của chúng tôi.</h2>
                            <div class="checkout__submission--icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25.995" height="25.979" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M416 128L192 384l-96-96"/></svg>
                            </div>
                        </div>
                        <div class="order__confirmed--area border-radius-5 mb-15">
                            <h3 class="order__confirmed--title h4">Đơn hàng của bạn đã được xác nhận</h3>
                            <p class="order__confirmed--desc">Vui lòng xác nhận email, và theo dõi đơn hàng của bạn. Xin cảm ơn!</p>
                        </div>
                        
                    </div>
                </main>
            </div>
    
        </div>
    </div>
</div>
            
@stop