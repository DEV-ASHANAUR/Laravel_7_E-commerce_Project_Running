<div class="product-list">
    <div class="row">
        @if ($data->count()>0)
            
        @foreach ($data as $product)
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ url('upload/product_image/'.$product->image) }}" alt="">
                    @if (!empty($product->discount))
                        <div class="sale pp-sale">- {{ $product->discount }}%</div>
                    @endif
                    
                    {{-- <div class="sale pp-dis">-40%</div> --}}
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="{{ route('website.details',$product->slug) }}">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                   <div class="catagory-name">{{ $product->cat_name }}</div>
                    <a href="#">
                        <h5>{{ $product->name }}</h5>
                    </a>
                    <div class="product-price">
                        {{-- {{ $product->price }} --}}
                        @if (!empty($product->discount))
                            {{ $main_price = $product->price-$product->dis_price }}
                            <span>{{ $product->dis_price }}</span>
                        @else
                            {{ $product->price }}
                        @endif
                        {{-- <span>$35.00</span> --}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <div>No Data Found</div>
        @endif
        {{-- <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ url('fontend') }}/img/products/product-2.jpg" alt="">
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">Coat</div>
                    <a href="#">
                        <h5>Guangzhou sweater</h5>
                    </a>
                    <div class="product-price">
                        $13.00
                        <span>$35.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ url('fontend') }}/img/products/product-3.jpg" alt="">
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">Shoes</div>
                    <a href="#">
                        <h5>Guangzhou sweater</h5>
                    </a>
                    <div class="product-price">
                        $34.00
                        <span>$35.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ url('fontend') }}/img/products/product-4.jpg" alt="">
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">Coat</div>
                    <a href="#">
                        <h5>Microfiber Wool Scarf</h5>
                    </a>
                    <div class="product-price">
                        $64.00
                        <span>$35.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ url('fontend') }}/img/products/product-5.jpg" alt="">
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">Shoes</div>
                    <a href="#">
                        <h5>Men's Painted Hat</h5>
                    </a>
                    <div class="product-price">
                        $44.00
                        <span>$35.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ url('fontend') }}/img/products/product-6.jpg" alt="">
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">Shoes</div>
                    <a href="#">
                        <h5>Converse Shoes</h5>
                    </a>
                    <div class="product-price">
                        $34.00
                        <span>$35.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ url('fontend') }}/img/products/product-7.jpg" alt="">
                    <div class="sale pp-sale">Sale</div>
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">Towel</div>
                    <a href="#">
                        <h5>Pure Pineapple</h5>
                    </a>
                    <div class="product-price">
                        $64.00
                        <span>$35.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ url('fontend') }}/img/products/product-8.jpg" alt="">
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">Coat</div>
                    <a href="#">
                        <h5>2 Layer Windbreaker</h5>
                    </a>
                    <div class="product-price">
                        $44.00
                        <span>$35.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="product-item">
                <div class="pi-pic">
                    <img src="{{ url('fontend') }}/img/products/product-9.jpg" alt="">
                    <div class="icon">
                        <i class="icon_heart_alt"></i>
                    </div>
                    <ul>
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="#">+ Quick View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">Shoes</div>
                    <a href="#">
                        <h5>Converse Shoes</h5>
                    </a>
                    <div class="product-price">
                        $34.00
                        <span>$35.00</span>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
<div class="pagi">
    {!! $data->links() !!}
</div>
{{-- <div class="loading-more">
    <i class="icon_loading"></i>
    <a href="#">
        Loading More
    </a>
</div> --}}
