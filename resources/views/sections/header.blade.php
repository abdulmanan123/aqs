

@php($user = Auth::user())
<section id="header" class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class=" col-sm-6">
                    <ul class="flat-support">
                        <li>
                        <a href="{{ url('faqs') }}" title="">Support</a>
                    </li>
                    <!-- <li>
                        <a href="store-location.html" title="">Store Locator</a>
                    </li> -->
                    <li>
                        <a href="{{url('track-order')}}" title="">Track Your Order</a>
                    </li>
                    </ul><!-- /.flat-support -->
                </div><!-- /.col-md-3 -->
                <div class="col-sm-6">
                    <ul class="flat-unstyled">
                        @if(Auth::check())
                            <li>
                                <a href="{{url('profile')}}" title="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">{{ @$user->first_name }} {{ @$user->last_name }} &nbsp;<?php echo (Auth::user()->type =='wholesaler' || Auth::user()->type =='dropshipper')?(
                                '(<span  style="font-weight: bold;color: green">'.Auth::user()->type.'</span>)'):''?></a>
                            </li>
                        @endif
                        <li class="account">
                            <a href="javascript:void(0)" title="">My Account<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="unstyled">
                                @if(Auth::check())
                                <li><a href="{{url('profile')}}" title="">Profile</a></li>

                                <li><a href="{{url('my-orders')}}" title="">My Orders</a></li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ url('login') }}">{{ __('Login / Register') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('wholesaler/register') }}">{{ __('Wholesaler Register') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('dropshipper/register') }}">{{ __('Dropshipper Register') }}</a>
                                    </li>
                                @endif


                                <li><a href="{{url('my-wishlist')}}" title="">Wishlist</a></li>
                                <li><a href="{{url('cart-checkout')}}" title="">My Cart</a></li>
                                @if(Auth::check())
                                    <li class="nav-item dropdown">

                                            <a href="{{ url('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </li>
                                @endif


                            </ul>
                        </li>
                            @if(Auth::check())
                        @if(Auth::user()->type =='wholesaler' || Auth::user()->type =='dropshipper')
                        <?php $totalAmountWallet = getWholsellerDataWallet(Auth::user()->id);?>
                       <li>
                            <a href="#" title="">Wallet Amount :- &#163;{{number_format($totalAmountWallet,'2','.','')}}</a>

                        </li>
                            @endif
                            @endif
                         <!-- <li>
                            <a href="#" title="">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="unstyled">
                                <li>
                                <a href="#" title="">Turkish</a>
                            </li>
                            <li>
                                <a href="#" title="">English</a>
                            </li>
                            <li>
                                <a href="#" title="">اللغة العربية</a>
                            </li>
                            <li>
                                <a href="#" title="">Español</a>
                            </li>
                            <li>
                                <a href="#" title="">Italiano</a>
                            </li>
                            </ul>
                        </li> -->
                    </ul><!-- /.flat-unstyled -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    @if(@$page)
        @include('sections.site-header-middle')
        @include('sections.site-header-bottom')
    @else
        @include('sections.site-header-middle')
        @include('sections.site-header-bottom')
    @endif
</section><!-- /#header -->
