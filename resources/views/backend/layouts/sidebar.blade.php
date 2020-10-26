@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('home') }}"
                    ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard</a>
                {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
                {{-- manage user start --}}
                @if(Auth::user()->usertype=='Admin')
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage User
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/users')?'show':'' }}" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'users.view')?'active':'' }}" href="{{ route('users.view') }}">View User</a>
                </div>
                @endif
                {{-- manage user end --}}
                
                {{-- manage categories start --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/categories')?'show':'' }}" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'categories.view')?'active':'' }}" href="{{ route('categories.view') }}">View Categories</a>
                </div>
                {{-- manage categories end --}}
                {{-- manage Brand start --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Brand
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/brand')?'show':'' }}" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'brand.view')?'active':'' }}" href="{{ route('brand.view') }}">View Brand</a>
                </div>
                {{-- manage brand end --}}
                {{-- manage color start --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts6" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Color
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/color')?'show':'' }}" id="collapseLayouts6" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'color.view')?'active':'' }}" href="{{ route('color.view') }}">View Color</a>
                </div>
                {{-- manage color end --}}
                {{-- manage size start --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts7" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Size
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/size')?'show':'' }}" id="collapseLayouts7" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'size.view')?'active':'' }}" href="{{ route('size.view') }}">View Size</a>
                </div>
                {{-- manage size end --}}
                {{-- manage manufacture start --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Manufacture
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/manufacture')?'show':'' }}" id="collapseLayouts8" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'manufacture.view')?'active':'' }}" href="{{ route('manufacture.view') }}">View Manufacture</a>
                </div>
                {{-- manage manufacture end --}}
                {{-- manage product start --}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts9" aria-expanded="false" aria-controls="collapseLayouts"
                    ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Manage Product
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
                <div class="collapse {{ ($prefix == '/product')?'show':'' }}" id="collapseLayouts9" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav"><a class="nav-link {{ ($route == 'product.view')?'active':'' }}" href="{{ route('product.view') }}">View Product</a>
                </div>
                {{-- manage product end --}}
                 
            </div>    
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in As : @php
                echo Auth::user()->usertype 
              @endphp
            </div>
        </div>
    </nav>
</div>