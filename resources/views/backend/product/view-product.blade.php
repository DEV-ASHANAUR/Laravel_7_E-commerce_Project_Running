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
                    <small class="d-sm-block"><a href="{{ route('product.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus-circle mr-1"></i> Add Product</a></small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Stock</th>
                                    <th>Image</th>
                                    <th>Created_At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($alldata as $key => $product)
                                <tr id="{{ $product->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ number_format($product->price,2) }} Tk</td>
                                    <td class="text-center">{{ ($product->discount)?($product->discount.'%'):'0%' }}</td>
                                    <td class="text-center">
                                        <a data-toggle="tooltip" data-placement="top" title="{{ $product->stock }}" href="#" class="badge badge-warning warning-pill text-white" data-original-title="50">{{ $product->stock }}</a>
                                    </td>
                                    <td>
                                        <img src="{{ url('upload/product_image/'.$product->image) }}" class="img-fluid img-thumbnail" width="100px" alt="">
                                    </td>
                                    <td>{{ date('d-M-Y',strtotime($product->created_at)) }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('product.show',$product->id) }}" title="View" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
    
                                        <a href="{{ route('product.edit',$product->id) }}" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
    
                                        <a href="{{ route('product.destroy') }}" id="delete" title="Delete" data-token="{{ csrf_token() }}" data-id="{{ $product->id }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Stock</th>
                                    <th>Image</th>
                                    <th>Created_At</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
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