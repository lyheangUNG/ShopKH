<!doctype html>
    {{-- <html class="no-js" lang="km-KH"> --}}
    <html class="no-js" lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <title>{{ config('app.name', 'Argon Dashboard') }}</title>
            <!-- Favicon -->
            <link href="{{ asset('argon') }}/img/brand/shopkhtop.png" rel="icon" type="image/png">
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- Favicon -->
            {{-- <link rel="shortcut icon" type="{{asset('image/x-icon')}}" href="{{asset('uploads')}}/logo/{{$logo}}"> --}}

            <!-- all css here -->
            <link rel="stylesheet" href="{{asset('/css/app.css')}}">
            {{-- <link rel="stylesheet" href="{{asset('/css/all.css')}}"> --}}
            {{-- Argon  --}}
            <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
            <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
            <link type="text/css" href="{{ asset('css') }}/all.css" rel="stylesheet">
            {{-- Ezone  --}}
            <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
            {{-- <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}"> --}}
            <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/icofont.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/bundle.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
            {{-- <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.structure.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.theme.min.css')}}"> --}}
            <link rel="stylesheet" href="{{asset('assets/css/customize.css')}}">
            <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        </head>
        <body>
            <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            <!-- header start -->
            <header>
                <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                    <div class="container-fluid">
                        <div class="header-bottom-wrapper">
                            <div class="logo-2 furniture-logo ptb-30">
                                <a href="{{route('user.homepage')}}">
                                    <img src="{{ asset('argon') }}/img/brand/shopkh.png" alt="" style="width:250px;">
                                </a>
                            </div>
                            <div class="menu-style-2 furniture-menu menu-hover">
                                <nav>
                                    <ul>
                                        <li><a href="{{route('allproduct')}}">All</a></li>
                                        <!-- <li><a href="#">Home</a></li> -->
                                        <li><a href="{{route('men.page')}}">Men</a>
                                            <!-- <ul class="single-dropdown">
                                                <li><a href="index.html">Fashion</a></li>
                                                <li><a href="index-fashion-2.html">Fashion style 2</a></li>
                                                <li><a href="index-fruits.html">fruits</a></li>
                                                <li><a href="index-book.html">book</a></li>
                                                <li><a href="index-electronics.html">electronics</a></li>
                                                <li><a href="index-electronics-2.html">electronics style 2</a></li>
                                                <li><a href="index-food.html">food & drink</a></li>
                                                <li><a href="index-furniture.html">furniture</a></li>
                                                <li><a href="index-handicraft.html">handicraft</a></li>
                                                <li><a target="_blank" href="index-smart-watch.html">smart watch</a></li>
                                                <li><a href="index-sports.html">sports</a></li>
                                            </ul> -->
                                        </li>
                                        <li><a href="{{route('women.page')}}">Women</a>
                                            <!-- <ul class="single-dropdown">
                                                <li><a href="about-us.html">about us</a></li>
                                                <li><a href="menu-list.html">menu list</a></li>
                                                <li><a href="login.php">login</a></li>
                                                <li><a href=" register.php">register</a></li>
                                                <li><a href="cart.html">cart page</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="wishlist.html">wishlist</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                            </ul> -->
                                        </li>
                                        <!-- <li><a href="shop.html">shop</a>
                                            <div class="category-menu-dropdown shop-menu">
                                                <div class="category-dropdown-style category-common2 mb-30">
                                                    <h4 class="categories-subtitle"> shop layout</h4>
                                                    <ul>
                                                        <li><a href="shop-grid-2-col.html"> grid 2 column</a></li>
                                                        <li><a href="shop-grid-3-col.html"> grid 3 column</a></li>
                                                        <li><a href="shop.html">grid 4 column</a></li>
                                                        <li><a href="shop-grid-box.html">grid box style</a></li>
                                                        <li><a href="shop-list-1-col.html"> list 1 column</a></li>
                                                        <li><a href="shop-list-2-col.html">list 2 column</a></li>
                                                        <li><a href="shop-list-box.html">list box style</a></li>
                                                        <li><a href="cart.html">shopping cart</a></li>
                                                        <li><a href="wishlist.html">wishlist</a></li>
                                                    </ul>
                                                </div>
                                                <div class="category-dropdown-style category-common2 mb-30">
                                                    <h4 class="categories-subtitle"> product details</h4>
                                                    <ul>
                                                        <li><a href="product-details.html">tab style 1</a></li>
                                                        <li><a href="product-details-2.html">tab style 2</a></li>
                                                        <li><a href="product-details-3.html"> tab style 3</a></li>
                                                        <li><a href="product-details-4.html">sticky style</a></li>
                                                        <li><a href="product-details-5.html">sticky style 2</a></li>
                                                        <li><a href="product-details-6.html">gallery style</a></li>
                                                        <li><a href="product-details-7.html">gallery style 2</a></li>
                                                        <li><a href="product-details-8.html">fixed image style</a></li>
                                                        <li><a href="product-details-9.html">fixed image style 2</a></li>
                                                    </ul>
                                                </div>
                                                <div class="mega-banner-img">
                                                    <a href="single-product.html">
                                                        <img src="assets/img/banner/18.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="blog.html">blog</a>
                                            <ul class="single-dropdown">
                                                <li><a href="blog.html">blog 3 colunm</a></li>
                                                <li><a href="blog-2-col.html">blog 2 colunm</a></li>
                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="blog-details-sidebar.html">blog details 2</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="#">Other</a></li>
                                        <li><a href="#">About</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- cart -->
                            <div class="header-cart pt-2">
                                <a class="icon-cart-furniture" href="{{route('allcart')}}">
                                    <i class="ti-shopping-cart"></i>
                                    {{-- <span class="shop-count-furniture green">02</span> --}}
                                </a>
                                {{-- <ul class="cart-dropdown">
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="#"><img src="assets/img/cart/1.jpg" alt=""></a>
                                        </div>
                                        <div class="cart-title">
                                            <h5><a href="#"> </a></h5>
                                            <h6><a href="#">Black</a></h6>
                                            <span>$80.00 x 1</span>
                                        </div>
                                        <div class="cart-delete">
                                            <a href="#"><i class="ti-trash"></i></a>
                                        </div>
                                    </li>
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="#"><img src="assets/img/cart/2.jpg" alt=""></a>
                                        </div>
                                        <div class="cart-title">
                                            <h5><a href="#"> Bits Headphone</a></h5>
                                            <h6><a href="#">Black</a></h6>
                                            <span>$80.00 x 1</span>
                                        </div>
                                        <div class="cart-delete">
                                            <a href="#"><i class="ti-trash"></i></a>
                                        </div>
                                    </li>
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="#"><img src="assets/img/cart/3.jpg" alt=""></a>
                                        </div>
                                        <div class="cart-title">
                                            <h5><a href="#"> Bits Headphone</a></h5>
                                            <h6><a href="#">Black</a></h6>
                                            <span>$80.00 x 1</span>
                                        </div>
                                        <div class="cart-delete">
                                            <a href="#"><i class="ti-trash"></i></a>
                                        </div>
                                    </li>
                                    <li class="cart-space">
                                        <div class="cart-sub">
                                            <h4>Subtotal</h4>
                                        </div>
                                        <div class="cart-price">
                                            <h4>$240.00</h4>
                                        </div>
                                    </li>
                                    <li class="cart-btn-wrapper">
                                        <a class="cart-btn btn-hover" href="#">view cart</a>
                                        <a class="cart-btn btn-hover" href="#">checkout</a>
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            <!-- <li><a href="#">HOME</a></li> -->
                                            <li><a href="{{route('men.page')}}">MEN</a></li>
                                            <li><a href="{{route('women.page')}}">WOMEN</a></li>
                                            <li><a href="#">Other</a></li>
                                            <li><a href="#">About</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom-furniture wrapper-padding-2 border-top-3 border-bottom-2">
                    <div class="container-fluid">
                        <div class="furniture-bottom-wrapper">
                            <div class="furniture-login">
                                <ul class="media align-items-center">
                                    @auth
                                    @if (Route::has('login'))
                                    <span class="avatar avatar-sm rounded-circle" style="width: 24px; height:24px">
                                        <a href=""><img style="width: 24px; height:24px" alt="Image"
                                                src="{{ asset('uploads') }}/avatar/{{ auth()->user()->avatar}}"></a>
                                    </span>
                                    <div class="media-body ml-2">
                                    <li>
                                        {{-- <a style="color:{{$basicColor}}" href="{{ route('userProfile') }}">{{auth()->user()->name}}</a> --}}
                                        <a href="">{{auth()->user()->name}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </div>

                                    @endif
                                    @endauth

                                    @if ( Auth::guest() )
                                    <li>Get Access: <a href="{{route('login')}}">login</a></li>
                                    <li><a href="/register">register</a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="furniture-search">
                                <form action="{{route('search.name')}}" method="GET">
                                    @csrf
                                    <input placeholder="Search" type="text" name="search">
                                    <button class="btn shadow--none shadow--hover" type="submit"><i class="fa fa-search"></i></button>
                                    {{-- <button>
                                        <i type="submit" class="ti-search"></i>
                                    </button> --}}
                                </form>
                            </div>
                            <div class="furniture-wishlist">
                                <ul>
                                    <!-- <li><a data-toggle="modal" data-target="#exampleCompare" href="#"><i class="ti-reload"></i> Compare</a></li> -->
                                    <li><a href="#"><i class="ti-heart"></i> Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            @yield('contents')

            <footer class="footer-area">
                <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
                    <div class="container-fluid">
                        <div class="widget-wrapper">
                            <div class="footer-widget mb-30">
                                <a href="#"><img src="{{ asset('argon') }}/img/brand/shopkh.png" alt="" style="width:280px;"></a>
                                <div class="footer-about-2">
                                    <p>There are many variations of passages of Lorem Ipsum <br>the majority have suffered alteration in some form, by <br> injected humour</p>
                                </div>
                            </div>
                            <div class="footer-widget mb-30">
                                <h3 class="footer-widget-title-5">Contact Info</h3>
                                <div class="footer-info-wrapper-3">
                                    <div class="footer-address-furniture">
                                        <div class="footer-info-icon3">
                                            <span>Address: </span>
                                        </div>
                                        <div class="footer-info-content3">
                                            <p>66 Sipu road Rampura Banasree <br>USA- 10800</p>
                                        </div>
                                    </div>
                                    <div class="footer-address-furniture">
                                        <div class="footer-info-icon3">
                                            <span>Phone: </span>
                                        </div>
                                        <div class="footer-info-content3">
                                            <p>+8801 (33) 515609735 <br>+8801 (66) 223352333</p>
                                        </div>
                                    </div>
                                    <div class="footer-address-furniture">
                                        <div class="footer-info-icon3">
                                            <span>E-mail: </span>
                                        </div>
                                        <div class="footer-info-content3">
                                            <p><a href="#"> email@domain.com</a> <br><a href="#"> domain@mail.info</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-widget mb-30">
                                <h3 class="footer-widget-title-5">Newsletter</h3>
                                <div class="footer-newsletter-2">
                                    <p>Send us your mail or next updates</p>
                                    <div id="mc_embed_signup" class="subscribe-form-5">
                                        <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                            <div id="mc_embed_signup_scroll" class="mc-form">
                                                <input type="email" value="" name="EMAIL" class="email" placeholder="Enter mail address" required>
                                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom ptb-20 gray-bg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="copyright-furniture">
                                    <p>Copyright © <a href="https://hastech.company/">HasTech</a> 2018 . All Right Reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- modal -->
            <!-- <div class="modal fade" id="exampleCompare" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="pe-7s-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog modal-compare-width" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="#">
                                <div class="table-content compare-style table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>
                                                    <a href="#">Remove <span>x</span></a>
                                                    <img src="assets/img/cart/4.jpg" alt="">
                                                    <p>Blush Sequin Top </p>
                                                    <span>$75.99</span>
                                                    <a class="compare-btn" href="#">Add to cart</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="compare-title"><h4>Description </h4></td>
                                                <td class="compare-dec compare-common">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="compare-title"><h4>Sku </h4></td>
                                                <td class="product-none compare-common">
                                                    <p>-</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="compare-title"><h4>Availability  </h4></td>
                                                <td class="compare-stock compare-common">
                                                    <p>In stock</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="compare-title"><h4>Weight   </h4></td>
                                                <td class="compare-none compare-common">
                                                    <p>-</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="compare-title"><h4>Dimensions   </h4></td>
                                                <td class="compare-stock compare-common">
                                                    <p>N/A</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="compare-title"><h4>brand   </h4></td>
                                                <td class="compare-brand compare-common">
                                                    <p>HasTech</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="compare-title"><h4>color   </h4></td>
                                                <td class="compare-color compare-common">
                                                    <p>Grey, Light Yellow, Green, Blue, Purple, Black </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="compare-title"><h4>size    </h4></td>
                                                <td class="compare-size compare-common">
                                                    <p>XS, S, M, L, XL, XXL </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="compare-title"></td>
                                                <td class="compare-price compare-common">
                                                    <p>$75.99 </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- all js here -->
            <script src="{{asset('/js/app.js')}}"></script>
            {{-- <script src="{{asset('/js/all.js')}}"></script> --}}
            {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
            <script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> --}}
            <script src="{{asset('assets/js/popper.js')}}"></script>
            <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
            <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
            <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
            <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
            <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
            <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script> --}}
            <script src="{{asset('assets/js/ajax-mail.js')}}"></script>
            <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
            <script src="{{asset('assets/js/plugins.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/1.0/zxcvbn.min.js"></script>
            <script src="{{asset('assets/js/zxcvbn-bootstrap4-strength-meter.js')}}"></script>
            <script src="{{asset('assets/js/main.js')}}"></script>

                {{-- <script src="{{asset('assets/js/password-score.js')}}"></script>
                <script src="{{asset('assets/js/password-score-options.js')}}"></script>
                <script src="{{asset('assets/js/bootstrap-strength-meter.js')}}"></script> --}}

                @include('sweetalert::alert')
                @yield('script')
        </body>
    </html>

    <script type="text/javascript">
        // function removeCartItem(id){
        //     // alert(index);
        //     Swal.fire({
        //             position: 'center',
        //             title: 'Warning',
        //             text: "Are you sure?",
        //             type: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: '#2dce89',
        //             cancelButtonColor: '#f5365c',
        //             confirmButtonText: 'Yes',
        //             // showLoaderOnConfirm: true,
        //             // preF
        //         }).then((result) => {
        //             if (result.value) {
        //                 let URL = '<?php echo URL::to('/') ?>';
        //                 // console.log(URL);
        //                 let token = '<?php echo csrf_token() ?>';
        //                 // console.log(token);
        //                 $.ajax({
        //                     type:'GET',
        //                     url:`${URL}/remove_cart/${id}` ,
        //                     // data: { _token: token, product_id: id },
        //                     data: { _token: token },
        //                     success:function(data) {
        //                         // console.log('Success');
        //                         // window.location.href = `${URL}/cart`;
        //                     },
        //                     error: function(error){
        //                         console.log("Error",error);
        //                     }
        //                 });

        //             }
        //         })
        // }
        $(document).ready(function(){
            $("#StrengthProgressBar").zxcvbnProgressBar({
			  passwordInput: "#password",
			//   userInputs: userInputs,
			  ratings: ["Very Weak", "Weak", "OK", "Strong", "Very strong"]
             });
        });
        $(document).ready(function(){
        $('#imgProfile').click(function() {
            $('#upload-avatar').trigger('click');
        });
        $('#upload-avatar').change(function() {
            $(this).parents().submit();
        });


    });

</script>


