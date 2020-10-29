@extends('layouts.website')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table border>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $contents = Cart::content();
                                    $total = 0;
                                @endphp
                                {{-- @dd($contents->toArray()); --}}
                                @foreach ($contents as $content)
                                <tr>
                                    <td class="cart-pic first-row"><img src="{{ url('upload/product_image/'.$content->options->image) }}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5 class="pl-3">{{ $content->name }}</h5>
                                    </td>
                                    <td class="cart-title first-row text-center">{{ $content->options->size_name }}</td>
                                    <td class="cart-title first-row text-center">{{ $content->options->color_name }}</td>
                                    <td class="p-price first-row">{{ $content->price }} Tk</td>
                                    <td class="qua-col first-row">
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <div>
                                                <input type="number" min="1" name="qty" class="qty" value="{{ $content->qty }}">
                                                <input type="hidden" name="rowid" value="{{ $content->rowId }}">
                                                <button type="submit" class="btn btn-primary">update</button>
                                            </div>
                                        </form>
                                        
                                        {{-- <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{ $content->qty }}">
                                            </div>
                                        </div> --}}
                                    </td>
                                    <td class="total-price first-row">{{ $content->subtotal }}</td>
                                    <td class="close-td first-row">
                                        <a href="{{ route('cart.remove',$content->rowId) }}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @php
                                    $total += $content->subtotal;
                                @endphp
                                @endforeach
                                {{-- <tr>
                                    <td class="cart-pic"><img src="{{ url('fontend') }}/img/cart-page/product-2.jpg" alt=""></td>
                                    <td class="cart-title">
                                        <h5>American lobster</h5>
                                    </td>
                                    <td class="p-price">$60.00</td>
                                    <td class="qua-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">$60.00</td>
                                    <td class="close-td"><i class="ti-close"></i></td>
                                </tr>
                                <tr>
                                    <td class="cart-pic"><img src="{{ url('fontend') }}/img/cart-page/product-3.jpg" alt=""></td>
                                    <td class="cart-title">
                                        <h5>Guangzhou sweater</h5>
                                    </td>
                                    <td class="p-price">$60.00</td>
                                    <td class="qua-col">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price">$60.00</td>
                                    <td class="close-td"><i class="ti-close"></i></td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="{{ route('website.shop') }}" class="primary-btn continue-shop">Continue shopping</a>
                                <a href="#" class="primary-btn up-cart">Update cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>{{ number_format($total,2) }} Tk</span></li>
                                    <li class="cart-total">Total <span>$240.00</span></li>
                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

    
@endsection