<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/font-awesome.min.css" type="text/css">
    <link href="{{ asset('backend') }}/css/toastr.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/style.css" type="text/css">
</head>

<body>
	<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
	@include('layouts.navbar')

	@yield('content')
    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ url('fontend') }}/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ url('fontend') }}/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ url('fontend') }}/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ url('fontend') }}/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="{{ url('fontend') }}/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->
	<!-- FOOTER -->
	<footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="{{asset('fontend')}}/./imgfooter-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="{{asset('fontend')}}/./imgpayment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('fontend') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('fontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery.zoom.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery.dd.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('fontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('fontend') }}/js/main.js"></script>
    <script src="{{ asset('backend') }}/js/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
            case 'info':
                  toastr.info("{{ Session::get('message') }}");
                  break;
            case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
            case 'warning':
                  toastr.warning("{{ Session::get('message') }}");
                  break;
            case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
        @endif  
      </script>
    @yield('fontendscript')
    <script>
        $(document).ready(function(){
            $(document).on('keyup','#product_name',function(){
                var query = $(this).val();
                if(query !=''){
                    var _token = $('input[name="_token"]').val();
                    //console.log(_token);
                    $.ajax({
                        url:"{{route('website.autocomplete')}}",
                        method:"POST",
                        data:{query:query,_token:_token},
                        success:function(data){
                            $('.search-sagetion').fadeIn();
                            $('.search-sagetion').html(data);
                            //console.log(data);
                        }
                    });
                }else{
                    $('.search-sagetion').fadeOut();
                }
            });
            // fetch search value scrtip
            $(document).on('click','.li-field',function(e){
                e.preventDefault();
                var value = $(this).text();
                $('#product_name').val(value);
                $('.search-sagetion').fadeOut();
            });
        });
    </script>
</body>

</html>
