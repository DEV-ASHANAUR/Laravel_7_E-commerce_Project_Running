@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
            <h3 class="mt-4">Fashi</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
            {{-- <div class="card mb-4">
                <div class="card-body">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.</div>
            </div> --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-table mr-1"></i>View Product</span>
                    <small class="d-sm-block"><a href="{{ route('product.view') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Product List</a></small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th> Product Name</th>
                                    <th>{{ $product->name }}</th>
                                </tr>
                                <tr>
                                    <th>Main Image</th>
                                    <th><img src="{{ url('upload/product_image/'.$product->image) }}" class="img-fluid img-thumbnail" width="150px" height="150px" alt=""></th>
                                </tr>
                                <tr>
                                    <th>Sub Image</th>
                                    <th>
                                        @foreach ($sub_image as $sub_image)
                                            <img src="{{ url('upload/product_sub_image/'.$sub_image->sub_image) }}" class="img-fluid img-thumbnail" width="150px" height="150px" alt="">
                                        @endforeach
                                    </th>
                                </tr>
                                <tr>
                                    <th> Product Price</th>
                                    <th>{{ number_format($product->price,2)." Tk"}}</th>
                                </tr>
                                <tr>
                                    <th> Product Discount</th>
                                    <th>{{ ($product->discount)?($product->discount.'%'):'0%' }}</th>
                                </tr>
                                @if ($product->discount)
                                    <tr>
                                        <th>Payable Price</th>
                                        <th>{{ ($product->discount)?(number_format(($product->price-$product->dis_price),2).' Tk'):'' }}</th>
                                    </tr>
                                @endif
                                
                                <tr>
                                    <th>Category</th>
                                    <th>{{ $product->category->name }}</th>
                                </tr>
                                <tr>
                                    <th>Brand</th>
                                    <th>{{ $product->brand->name }}</th>
                                </tr>
                                <tr>
                                    <th>Manufacturs</th>
                                    <th>{{ $product->manufactur->name }}</th>
                                </tr>
                                <tr>
                                    <th>color</th>
                                    <th>
                                        @foreach ($color as $color)
                                            <span class="badge badge-primary">{{ $color->color->name }}</span>
                                        @endforeach
                                    </th>
                                </tr>
                                <tr>
                                    <th>Size</th>
                                    <th>
                                        @foreach ($size as $size)
                                            <span class="badge badge-primary">{{ $size->size->name }}</span>
                                        @endforeach
                                    </th>
                                </tr>
                                {{-- <tr>
                                    <th>Author</th>
                                    <th>{{ $alldata->user->name }}</th>
                                </tr> --}}
                                <tr>
                                    <th>Description</th>
                                    <th>{!! $product->long_desc !!}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
	<footer class="py-4 bg-light mt-auto">
		<div class="container-fluid">
			<div class="d-flex align-items-center justify-content-between small">
				<div class="text-muted">Copyright &copy; Your Website 2019</div>
				<div>
					<a href="#">Privacy Policy</a>
					&middot;
					<a href="#">Terms &amp; Conditions</a>
				</div>
			</div>
		</div>
	</footer>
</div>
@endsection