@extends('layouts.main')

@section('front-end')
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="./"><img class="d-inline-block" src="images/Logo Confido.png" width="200"
                    alt="logo" /><span class="fw-bold text-primary ms-2"></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active ' : '' }}"><a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('about') ? 'active ' : '' }}"><a href="/about"
                            class="nav-link">About</a></li>
                    <li class="nav-item {{ Request::is('destination') ? 'active ' : '' }}"><a href="/destination"
                            class="nav-link">Destination</a></li>
                    <li class="nav-item {{ Request::is('contact') ? 'active ' : '' }}"><a href="/contact"
                            class="nav-link">Contact</a></li>
                    <li class="nav-item {{ Request::is('register') ? 'active ' : '' }}"><a href="/register"
                            class="nav-link">Login/Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_1.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Contact us <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Contact us</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb contact-section mb-4">
        <div class="container">
            <div class="row d-flex contact-info">
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <h3 class="mb-2">Address</h3>
                        <p>Jl. Cabe V 91, Pd. Cabe Ilir, Kec. Pamulang, Kota Tangerang Selatan, Banten 15418</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <h3 class="mb-2">Contact Number</h3>
                        <p><a href="https://wa.me/6281384002161?text=Ingin%20Melaporkan%20Masalah">081384002161 Admin
                                1</a></p>
                        <p><a href="https://wa.me/6288219983235?text=Ingin%20Melaporkan%20Masalah">088219983235 Admin
                                2</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <h3 class="mb-2">Email Address</h3>
                        <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <h3 class="mb-2">Website</h3>
                        <p><a href="#">yoursite.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pt">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="#" class="bg-light p-5 contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <iframe src="https://www.google.com/maps/d/embed?mid=1zyDFNGNknXukVspHDodjhHbx7eD3SmY&ehbc=2E312F"
                        width="640" height="480"></iframe>
                </div>
            </div>
        </div>
    </section>


    <footer class="ftco-footer bg-bottom ftco-no-pt" style="background-image: url(images/bg_3.jpg);">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Confido berasal dari bahasa Latin, Confido yang berarti kepercayaan. Ini menandakan website
                            kami terpercaya dan bisa diandalkan. Sesuai dengan kebutuhan pengguna kami.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Maskapai</h2>
                        <ul class="list-unstyled">
                            <li><a class="py-2 d-block">Garuda Indonesia</a></li>
                            <li><a class="py-2 d-block">Citilink</a></li>
                            <li><a class="py-2 d-block">Batik Air</a></li>
                            <li><a class="py-2 d-block">Lion Air</a></li>
                            <li><a class="py-2 d-block">Sriwijaya Air</a></li>
                            <li><a class="py-2 d-block">Air Asia</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map-marker"></span><span class="text">Jl. Cabe V 91, Pd.
                                        Cabe Ilir, Kec. Pamulang, Kota Tangerang Selatan, Banten 15418</span></li>
                                <li><a href="tel://+6281384002161"><span class="icon fa fa-whatsapp"></span><span
                                            class="text">081384002161 Admin 1</span></a></li>
                                <li><a href="tel://+6281384002161"><span class="icon fa fa-whatsapp"></span><span
                                            class="text">088219983235 Admin 2</span></a></li>
                                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Confido &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>
@endsection
