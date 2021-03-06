@extends('backend.layouts.master')
@section('content')
	
<div id="layoutSidenav_content">
	<main>
        <div class="container-fluid">
          <h3 class="mt-4">Fashi</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
            {{-- <div class="card mb-4">
                <div class="card-body">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>.</div>
            </div> --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-edit mr-1"></i>Edit User</span>
                    <small class="d-sm-block"><a href="{{ route('users.view') }}" class="btn btn-success btn-sm"><i class="fas fa-list mr-1"></i>User List</a></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update',$editdata->id) }}" method="post" id="Myform">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="usertype">User Role</label>
                                <select class="form-control" name="usertype" id="usertype">
                                    <option value="">Select Role</option>
                                    <option value="admin" {{ ($editdata->usertype == "admin")?"selected":"" }}>Admin</option>
                                    <option value="user" {{ ($editdata->usertype == "user")?"selected":"" }}>User</option>
                                    <option value="customer" {{ ($editdata->usertype == "customer")?"selected":"" }}>Customer</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{ $editdata->name }}" name="name" id="name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="{{ $editdata->email }}"  name="email" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
        usertype: {
            required: true,
          },
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          }
        //   password: {
        //     required: true,
        //     minlength: 6
        //   },
        //   password2: {
        //     required: true,
        //     equalTo : '#password'
        //   }
          
        },
        messages: {
          usertype: {
            required: "Please Select User Role",
          },
          name: {
            required: "Please Enter Name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          }
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