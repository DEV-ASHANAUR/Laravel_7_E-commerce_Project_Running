@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
          <h3 class="mt-4">Fashi</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Add Product</li>
            </ol>
            {{-- <div class="card mb-4">
                <div class="card-body">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.</div>
            </div> --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-plus-circle mr-1"></i>Add Product</span>
                    <small class="d-sm-block"><a href="{{ route('product.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>Product List</a></small>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-8 m-auto">
                        @include('inc.error')
                      <form action="{{ route('product.store') }}" method="post" id="Myform" enctype="multipart/form-data">
                          @csrf
                          <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="title">Product Main Image<span class="text-danger">(<small>You Can Upload Single</small>)</span></label>
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="file">
                                  <label class="custom-file-label" for="file">Choose file</label>
                              </div>
                            </div>
                            <div class="form-group col-md-4" id="test">
                              
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title">Product Sub Image <span class="text-danger">(<small>You Can Upload Multiple</small>)</span></label>
                                <div class="custom-file">
                                  <input type="file" name="sub_image[]" id="sub_image" class="from-control" multiple>
                                  <label class="" for="sub_image">Choose file</label>
                              </div>
                            </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="title">Product Name</label>
                                  <input type="text" class="form-control" name="name">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="title">Product Price <small>(<span class="text-danger">Main Price</span>)</small></label>
                                <input type="number" class="form-control" id="main_price" name="price">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Product Discount</label> <small>(<span class="text-danger">Ex:40; In percent</span>)</small>
                                <input type="number" id="discount" class="form-control" name="discount">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="title">Product Discount Price <small>(<span class="text-danger">Auto Count</span>)</small></label>
                              <input type="text" readonly id="dis_price" class="form-control" name="dis_price">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>Product Size <small>(<span class="text-danger">Select Multiple</span>)</small></label>
                              <select name="size[]" class="form-control select2" id="size" multiple>
                                <option value="">Select Size</option>
                                @foreach ($size as $key => $size)
                                 <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Product Color <small>(<span class="text-danger">Select Multiple</span>)</small></label>
                              <select name="color[]" class="form-control select2" id="color" multiple>
                                <option value="">Select Color</option>
                                @foreach ($color as $key => $color)
                                 <option value="{{ $color->id }}">{{ $color->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>Product Category <small>(<span class="text-danger">Select Multiple</span>)</small></label>
                              <select name="category" class="form-control" id="category">
                                <option value="">Select Category</option>
                                @foreach ($category as $key => $cat)
                                 <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label>Product Brand <small>(<span class="text-danger">Select Single</span>)</small></label>
                              <select name="brand" class="form-control" id="brand">
                                <option value="">Select Brand</option>
                                @foreach ($brand as $key => $brand)
                                 <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>Product Manufacture <small>(<span class="text-danger">Select Single</span>)</small></label>
                              <select name="manufacture" class="form-control" id="manufacture">
                                <option value="">Select Manufacture</option>
                                @foreach ($manufacture as $key => $manufacture)
                                 <option value="{{ $manufacture->id }}">{{ $manufacture->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="title">Product Stock <small>(<span class="text-danger">In Number</span>)</small></label>
                              <input type="text" class="form-control" name="stock">
                            </div>
                          </div>       
                          <div class="form-row"> 
                              <div class="form-group col-md-12">
                                  <label for="description">Description</label>
                                  <textarea class="form-control" name="description" placeholder="Enter Some Description" id="description"></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                      </div>
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
<script>
    $(document).ready(function () {
      $('#Myform').validate({
        rules: {
          name: {
            required: true,
          },
          price: {
            required: true,
          },
          category: {
            required: true,
          },
          color: {
            required: true,
          },
          size: {
            required: true,
          },
          brand: {
            required: true,
          },
          stock: {
            required: true,
          }
          
        },
        messages: {
        //   usertype: {
        //     required: "Please Select User Role",
        //   },
        //   name: {
        //     required: "Please Enter Name",
        //   },
        //   email: {
        //     required: "Please enter a email address",
        //     email: "Please enter a vaild email address"
        //   },
        //   password: {
        //     required: "Please Enter password",
        //     minlength: "Your password must be at least 6 characters long"
        //   },
        //   password2: {
        //     required: "Please Enter Confirm password",
        //     equalTo : "Confirm Password Does not Match"
        //   }
          
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
@endsection
@section('style')
  <link href="{{ asset('backend') }}/summernote/summernote-bs4.css" rel="stylesheet"/>
@endsection
@section('script')
  <script src="{{ asset('backend') }}/summernote/summernote-bs4.js"></script>
  <script>
    $('#description').summernote({
        placeholder: 'Write Post Description Here..',
        tabsize: 2,
        height: 150
      });
  </script>
  <script>
    $(document).ready(function(){
      $(document).on('keyup click','#discount,#main_price',function(){
        var main_price = $("#main_price").val();
        var dis = $("#discount").val();
        //console.log(main_price);
        if(dis > 0){
          calculation(main_price,dis);
        }else{
          $("#dis_price").val('');
        }
          
      });
      function calculation(main_price,dis){
        if(dis > 0){
          var dispoint = dis/100;
          var disprice = dispoint*main_price;
          $("#dis_price").val(disprice);
        }else{
          $("#dis_price").val('');
        }
        
      }
    });
  </script>
@endsection