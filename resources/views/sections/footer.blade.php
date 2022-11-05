<footer class="{{@$footer}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="widget-ft {{@$footer}} widget-about">
                    <div class="logo logo-ft" style="margin-bottom: 0px;">
                        <a href="{{url('/')}}" title="{{ settingValue('site_title') }}">
                            <img src="{{asset('uploads/settings/site_logo.jpg')}}" alt="{{ settingValue('site_title') }}">
                        </a>
                    </div><!-- /.logo-ft -->
                    <div class="widget-content">
                        <div class="icon">
                            <img src="{{asset('front_assets/images/icons/call.png')}}" alt="">
                        </div>
                        <div class="info">
            <p class="questions">Got Questions ? Call us Monday to Friday from 9am to 6pm</p>
                            <p class="phone">Call Us: {{ settingValue('phone') }}</p>
                            <p class="address">
                                {{ settingValue('address') }}
                            </p>
                        </div>
                    </div><!-- /.widget-content -->
                <!--    <ul class="social-list">
                        @if(settingValue('facebook')!="")
                        <li>
                            <a href="//www.facebook.com/{{ settingValue('facebook') }}" title="Facebook" target="_blank">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        @endif
                        @if(settingValue('twitter')!="")
                        <li>
                            <a href="//twitter.com/{{ settingValue('twitter') }}" title="Twitter" target="_blank">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                         @endif
                         @if(settingValue('ebay')!="")
                        <li>
                            <a href="//www.ebay.co.uk//{{ settingValue('ebay') }}" title="Ebay" target="_blank">
                                <i class="fa fa-ebay" aria-hidden="true"></i>
                            </a>
                        </li>
                         @endif
                         @if(settingValue('amazon')!="")
                        <li>
                            <a href="//www.amazon.co.uk/{{ settingValue('amazon') }}" title="Amazon" target="_blank">
                                <i class="fa fa-amazon" aria-hidden="true"></i>
                            </a>
                        </li>
                         @endif
                        @if(settingValue('instagram')!="")
                        <li>
                            <a href="//instagram.com/{{ settingValue('instagram') }}" title="Instagram" target="_blank">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                         @endif
                        @if(settingValue('pinterest')!="")
                        <li>
                            <a href="//www.pinterest.com/{{ settingValue('pinterest') }}" title="Pinterest" target="_blank">
                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                            </a>
                        </li>
                        @endif                        
                    </ul>-->
                    
                    <!-- /.social-list -->
                </div><!-- /.widget-about -->
            </div><!-- /.col-lg-3 col-md-6 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget-ft {{@$footer}} widget-categories-ft">
                    <div class="widget-title">
                        <h3>Find By Categories</h3>
                    </div><!-- /.widget-title -->
                    <ul class="cat-list-ft">
                        @foreach(getParentCategories(7) as $key => $category)
                        <li><a href="{{ url('products?category='.$key.'-'.str_slug($category, '-').'&view-type=grid') }}" title="{{ $category }}">{{ $category }}</a></li>
                        @endforeach
                    </ul><!-- /.cat-list-ft -->
                </div><!-- /.widget-categries-ft -->
            </div><!-- /.col-lg-3 col-md-6 -->
            <div class="col-lg-2 col-md-6">
                <div class="widget-ft {{@$footer}} widget-menu">
                    <div class="widget-title">
                        <h3>Customer Care</h3>
                    </div><!-- /.widget-title -->
                    <ul>
                                {{--<li><a href="{{ url('contact-us') }}" title="Contact us">Contact us</a></li>--}}
                                <li><a href="{{ url('cart-checkout') }}" title="My Account">My Account</a></li>
                                <li><a href="{{ url('my-wishlist') }}" title="Wish List">Wish List</a></li>
                                <li><a href="{{ url('page/privacy-policy') }}" title="Privacy Policy">Privacy Policy</a></li>
                                <li><a href="{{ url('page/term-condition') }}" title="Terms & Conditions">Terms & Conditions</a></li>
                                <li><a href="{{ url('page/about-us') }}" title="About Us">About Us</a></li>
                                <li><a href="{{ url('page/contact-us') }}" title="Contact Us">Contact Us</a></li>
                            </ul>
                </div><!-- /.widget-menu -->
            </div><!-- /.col-lg-2 col-md-6 -->
            <div class="col-lg-4 col-md-6">
                <div class="widget-ft {{@$footer}} widget-newsletter">
                    <div class="widget-title">
                        <h3>Sign Up To New Letter</h3>
                    </div><!-- /.widget-title -->
                    <p>Make sure that you never miss our interesting <br />
                        news by joining our newsletter program
                    </p>
                    <form id="newsletterForm" class="subscribe-form" accept-charset="utf-8">
                        <div class="subscribe-content form-group">
                            <!-- <input type="text" name="email" class="subscribe-email" placeholder="Your E-Mail"> -->
                            {{ Form::email('subscriber_email', null ,[
                            'placeholder' => 'Enter Your Email Address Here',
                            'class'       => 'form-control subscribe-email',
                            'id'          => 'subscriber_email',
                            'required'    => 'required',
                            'autofocus'   => ($errors->has('subscriber_email') ? 'autofocus' : null)
                            ]) }}
                            <div class="help-block with-errors"></div>
                            <label style="display: none;" id="subscriber_email_error" class="help-block" for="subscriber_email"></label>
                            @if($errors->has('subscriber_email'))
                            <span class="invalid-feedback" role="alert">
                                <p class="help-block">{{ $errors->first('subscriber_email') }}</p>
                            </span>
                            @endif
                            <button type="submit" class="btn-signup-newsletter"><img src="{{asset('front_assets/images/icons/right-2.png')}}" alt=""></button>
                        </div>
                    </form>
                    <ul class="pay-list">
                        <li>
                            <a href="#" title="">
                                <img src="{{asset('front_assets/images/logos/ft-06.png')}}" alt="">
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#" title="">
                                <img src="{{asset('front_assets/images/logos/ft-07.png')}}" alt="">
                            </a>
                        </li> -->
                        <li>
                            <a href="#" title="">
                                <img src="{{asset('front_assets/images/logos/ft-08.png')}}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#" title="">
                                <img src="{{asset('front_assets/images/logos/ft-09.png')}}" alt="">
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#" title="">
                                <img src="{{asset('front_assets/images/logos/ft-10.png')}}" alt="">
                            </a>
                        </li> -->
                    </ul><!-- /.pay-list -->
                </div><!-- /.widget-newletter -->
            </div><!-- /.col-lg-4 col-md-6 -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="widget-ft {{@$footer}} widget-apps">
                    <div class="widget-title">
                        <!--<h3>Mobile Apps</h3> -->
                    </div><!-- /.widget-title -->
                    <ul class="app-list">
                   {{--     <li class="app-store">
                            <a href="#" title="">
                                <div class="img">
                                    <img src="{{asset('front_assets/images/icons/app-store-2.png')}}" alt="">
                                </div>
                                <div class="text">
                                    <h4>App Store</h4>
                                    <p>Available now on the</p>
                                </div>
                            </a>
                        </li><!-- /.app-store -->
                        <li class="google-play">
                            <a href="#" title="">
                                <div class="img">
                                    <img src="{{asset('front_assets/images/icons/google-play-2.png')}}" alt="">
                                </div>
                                <div class="text">
                                    <h4>Google Play</h4>
                                    <p>Get in on</p>
                                </div>
                            </a>    
                        </li>--}}<!-- /.google-play -->
                    </ul><!-- /.app-list -->
                </div><!-- /.widget-apps -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</footer><!-- /footer -->

<section class="footer-bottom {{@$footer}}">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="copyright">All Rights Reserved © {{ settingValue('site_title') }} 2019</p>
                <p class="btn-scroll">
                    <a href="#" title="">
                        <img src="{{asset('front_assets/images/icons/top.png')}}" alt="">
                    </a>
                </p>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.footer-bottom -->