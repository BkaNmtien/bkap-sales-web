@yield('preloader')
<!-- Start header area -->
<header class="header__section">
    
    <div class="main__header header__sticky">
        <div class="container-fluid">
            <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                <div class="offcanvas__header--menu__open ">
                    <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                        <span class="visually-hidden">Menu Open</span>
                    </a>
                </div>
                <div class="main__logo">
                    <h1 class="main__logo--title"><a class="main__logo--link" href="{{route('home.index')}}"><img class="main__logo--img" src="{{url('asset-user')}}/img/logo/nav-log.png" alt="logo-img"></a></h1>
                </div>
                <div class="header__search--widget header__sticky--none d-none d-lg-block">
                    <form class="d-flex header__search--form" action="{{route('product.search')}}" method="POST">
                    @csrf
                        <div class="header__search--box">
                            <label>
                                <input class="header__search--input" name="key_search" placeholder="Từ khoá..." type="text">
                            </label>
                            <button class="header__search--button bg__secondary text-black" type="submit" aria-label="search button">
                                <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="27.51" height="26.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="header__account header__sticky--none">
                    <ul class="d-flex">
                        <li class="header__account--items">
                            <a class="header__account--btn" href="{{route('user.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                                @if(Auth::check())
                                    <span class="header__account--btn__text">{{Auth::user()->email}}</span>
                                @else
                                    <span class="header__account--btn__text">Tài khoản</span>
                                @endif
                            </a>
                        </li>
                        @auth
                        <li class="header__account--items">
                            <a class="header__account--btn" href="{{route('user.logout')}}">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="none" stroke="#231F20" stroke-width="2" d="M13,9 L13,2 L1,2 L1,22 L13,22 L13,15 M22,12 L5,12 M17,7 L22,12 L17,17"/>
                                </svg>
                                <span class="header__account--btn__text">Đăng suất</span>           
                            </a>
                        </li>
                        @endauth     
                        <li class="header__account--items">
                            <a class="header__account--btn minicart__open--btn" href="javascript:void(0)" data-offcanvas>
                                <svg xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 14.706 13.534">
                                    <g  transform="translate(0 0)">
                                      <g >
                                        <path  data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"/>
                                        <path  data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"/>
                                        <path  data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"/>
                                      </g>
                                    </g>
                                </svg>
                                <span class="header__account--btn__text">Giỏ hàng</span>   
                                <span class="items__count">{{$cart->getTotalQuantityCart()}}</span> 
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- <div class="header__menu d-none header__sticky--block d-lg-block">
                    <nav class="header__menu--navigation">
                        <ul class="d-flex">
                            <li class="header__menu--items style2">
                                <a class="header__menu--link text-black" href="index.html">Home 
                                    <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12" height="7.41" viewBox="0 0 12 7.41">
                                        <path  d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                    </svg>
                                </a>
                                <ul class="header__sub--menu">
                                    <li class="header__sub--menu__items"><a href="index.html" class="header__sub--menu__link">Home One</a></li>
                                    <li class="header__sub--menu__items"><a href="index-2.html" class="header__sub--menu__link">Home Two</a></li>
                                    <li class="header__sub--menu__items"><a href="index-3.html" class="header__sub--menu__link">Home Three</a></li>
                                </ul>
                            </li>
                            <li class="header__menu--items mega__menu--items style2">
                                <a class="header__menu--link text-black" href="shop.html">Shop 
                                    <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12" height="7.41" viewBox="0 0 12 7.41">
                                        <path  d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                    </svg>
                                </a>
                                <ul class="header__mega--menu d-flex">
                                    <li class="header__mega--menu__li">
                                        <span class="header__mega--subtitle">Column One</span>
                                        <ul class="header__mega--sub__menu">
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="shop.html">Shop Left Sidebar</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="shop-grid.html">Shop Grid</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="shop-grid-list.html">Shop Grid List</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="shop-list.html">Shop List</a></li>
                                        </ul>
                                    </li>
                                    <li class="header__mega--menu__li">
                                        <span class="header__mega--subtitle">Column Two</span>
                                        <ul class="header__mega--sub__menu">
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="product-details.html">Product Details</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="product-video.html">Video Product</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="product-details.html">Variable Product</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="product-left-sidebar.html">Product Left Sidebar</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="product-gallery.html">Product Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li class="header__mega--menu__li">
                                        <span class="header__mega--subtitle">Column Three</span>
                                        <ul class="header__mega--sub__menu">
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="my-account.html">My Account</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="my-account-2.html">My Account 2</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="404.html">404 Page</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="login.html">Login Page</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="faq.html">Faq Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="header__mega--menu__li">
                                        <span class="header__mega--subtitle">Column Four</span>
                                        <ul class="header__mega--sub__menu">
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="compare.html">Compare Pages</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="checkout.html">Checkout page</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="checkout-2.html">Checkout Style 2</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="checkout-3.html">Checkout Style 3</a></li>
                                            <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="checkout-4.html">Checkout Style 4</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="header__menu--items style2">
                                <a class="header__menu--link text-black" href="about.html">About US </a>  
                            </li>
                            <li class="header__menu--items style2">
                                <a class="header__menu--link text-black" href="blog.html">Blog 
                                    <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12" height="7.41" viewBox="0 0 12 7.41">
                                        <path  d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                    </svg>
                                </a>
                                <ul class="header__sub--menu">
                                    <li class="header__sub--menu__items"><a href="blog.html" class="header__sub--menu__link">Blog Grid</a></li>
                                    <li class="header__sub--menu__items"><a href="blog-details.html" class="header__sub--menu__link">Blog Details</a></li>
                                    <li class="header__sub--menu__items"><a href="blog-left-sidebar.html" class="header__sub--menu__link">Blog Left Sidebar</a></li>
                                    <li class="header__sub--menu__items"><a href="blog-right-sidebar.html" class="header__sub--menu__link">Blog Right Sidebar</a></li>
                                </ul>
                            </li>
                            <li class="header__menu--items style2 d-none d-xl-block">
                                <a class="header__menu--link text-black" href="shop.html">Categories </a>  
                            </li>
                            <li class="header__menu--items style2">
                                <a class="header__menu--link text-black" href="#">Pages 
                                    <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12" height="7.41" viewBox="0 0 12 7.41">
                                        <path  d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                    </svg>
                                </a>
                                <ul class="header__sub--menu">
                                    <li class="header__sub--menu__items"><a href="about.html" class="header__sub--menu__link">About Us</a></li>
                                    <li class="header__sub--menu__items"><a href="contact.html" class="header__sub--menu__link">Contact Us</a></li>
                                    <li class="header__sub--menu__items"><a href="cart.html" class="header__sub--menu__link">Cart Page</a></li>
                                    <li class="header__sub--menu__items"><a href="portfolio.html" class="header__sub--menu__link">Portfolio Page</a></li>
                                    <li class="header__sub--menu__items"><a href="wishlist.html" class="header__sub--menu__link">Wishlist Page</a></li>
                                    <li class="header__sub--menu__items"><a href="login.html" class="header__sub--menu__link">Login Page</a></li>
                                    <li class="header__sub--menu__items"><a href="404.html" class="header__sub--menu__link">Error Page</a></li>
                                </ul>
                            </li>
                            <li class="header__menu--items style2">
                                <a class="header__menu--link text-black" href="contact.html">Contact </a>  
                            </li>
                        </ul>
                    </nav>
                </div> --}}
                {{-- <div class="header__account header__account2 header__sticky--block">
                    <ul class="d-flex">
                        <li class="header__account--items header__account2--items  header__account--search__items d-none d-lg-block">
                            <a class="header__account--btn search__open--btn" href="javascript:void(0)" data-offcanvas>
                                <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  
                                <span class="visually-hidden">Search</span>
                            </a>
                        </li>
                        <li class="header__account--items header__account2--items">
                            <a class="header__account--btn" href="my-account.html">
                                <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                <span class="visually-hidden">My Account</span>
                            </a>
                        </li>
                        <li class="header__account--items header__account2--items">
                            <a class="header__account--btn minicart__open--btn" href="javascript:void(0)" data-offcanvas>
                                <svg xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 14.706 13.534">
                                    <g  transform="translate(0 0)">
                                      <g >
                                        <path  data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"/>
                                        <path  data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"/>
                                        <path  data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"/>
                                      </g>
                                    </g>
                                </svg>
                                <span class="items__count style2">{{$cart->getTotalQuantityCart()}}</span> 
                            </a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container-fluid">
            <div class="header__bottom--inner position__relative d-none d-lg-flex justify-content-between align-items-center">
                <div class="header__menu">
                    <nav class="header__menu--navigation">
                        <ul class="d-flex">
                            <li class="header__menu--items">
                                <a class="header__menu--link text-black" href="{{route('home.index')}}">Trang chủ   
                                </a>
                            </li>
                            @foreach ($categoryMenu as $value)
                                <li class="header__menu--items">
                                    <a class="header__menu--link text-black" href="{{route('product.category',$value->id)}}">{{$value->name}} 
                                    </a>
                                </li>
                            @endforeach
                            <li class="header__menu--items">
                                <a class="header__menu--link text-black" href="contact.html">Liên hệ </a>  
                            </li>
                        </ul>
                    </nav>
                </div>
                <p class="header__discount--text"><img class="header__discount--icon__img" src="{{url('asset-user')}}/img/icon/lamp.png" alt="lamp-img"> Khuyến mãi đặc biệt lên tới 50%</p>
            </div>
        </div>
    </div>
    <!-- Start offCanvas minicart -->
    <div class="offCanvas__minicart">
        <div class="minicart__header ">
            <div class="minicart__header--top d-flex justify-content-between align-items-center">
                <h2 class="minicart__title h3"> Giỏ hàng</h2>
                <button class="minicart__close--btn" aria-label="minicart close button" data-offcanvas> 
                    <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
                </button>
            </div>
            <p class="minicart__header--desc">Hân hạnh phục vụ quý khách!</p>
        </div>
        <div class="minicart__product">
            @foreach ($cart->content() as  $value)
                <div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        <a href="product-details.html"><img src="{{url('uploads/product')}}/{{$value['image']}}" alt="prduct-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h3 class="minicart__subtitle h4"><a href="">{{$value['product_name']}}</a></h3>
                        <span class="color__variant"><b>Size:</b> {{$value['size']}}</span>
                        <div class="minicart__price">
                            <span class="current__price">{{$value['price']}}đ - </span>
                            <span class="old__price">{{$value['old_price']}}đ</span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <button type="button"  class="quantity__value decrease" aria-label="quantity value">-</button>
                                <label>
                                    <input type="number" class="quantity__number" value="{{$value['quantity_cart']}}" data-counter />
                                </label>
                                <button type="button" class="quantity__value increase"  >+</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="minicart__amount">
            <div class="minicart__amount_list d-flex justify-content-end">
                <span>Total: </span>
                <span><b>{{$cart->getTotalPrice()}}đ</b></span>
            </div>
        </div>
        <div class="minicart__button d-flex justify-content-center">
            <a class="primary__btn minicart__button--link" href="{{route('cart.index')}}">Xem giỏ hàng</a>
            <a class="primary__btn minicart__button--link" href="{{route('checkout.index')}}">Mua ngay</a>
        </div>
    </div>
    <!-- End offCanvas minicart -->

    <!-- Start serch box area -->
    <div class="predictive__search--box ">
        <div class="predictive__search--box__inner">
            <h2 class="predictive__search--title">Search Products</h2>
            <form class="predictive__search--form" action="#">
                <label>
                    <input class="predictive__search--input" placeholder="Search Here" type="text">
                </label>
                <button class="predictive__search--button" aria-label="search button" type="submit"><svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="30.51" height="25.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  </button>
            </form>
        </div>
        <button class="predictive__search--close__btn" aria-label="search close button" data-offcanvas>
            <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51" height="30.443"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
        </button>
    </div>
    <!-- End serch box area -->

</header>
<!-- End header area -->