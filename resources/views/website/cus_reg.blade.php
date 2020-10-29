@extends('layouts.website')
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Register</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>Register</h2>
                    <form action="{{ route('customer.registation') }}" method="post" id="Myform">
                        @csrf
                        <div class="group-input form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <font class="text-danger">{{ ($errors->has('name'))?($errors->first('name')):'' }}</font>

                        </div>
                        <div class="group-input form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            <font class="text-danger">{{ ($errors->has('email'))?($errors->first('email')):'' }}</font>
                        </div>
                        <div class="group-input form-group">
                            <label for="mobile">Mobile</label>
                            <input type="number" class="form-control" name="mobile" id="mobile">
                            <font class="text-danger">{{ ($errors->has('mobile'))?($errors->first('mobile')):'' }}</font>
                        </div>
                        <div class="group-input form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <font class="text-danger">{{ ($errors->has('password'))?($errors->first('password')):'' }}</font>
                        </div>
                        <div class="group-input form-group">
                            <label for="password2">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password2">
                        </div>
                        <button type="submit" class="site-btn register-btn">REGISTER</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{ route('customer.login') }}" class="or-login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

@endsection
@section('fontendscript')
<script>
    $(document).ready(function () {
      $('#Myform').validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          mobile: {
            required: true,
          },
          password: {
            required: true,
            minlength: 6
          },
          password_confirmation: {
            required: true,
            equalTo : '#password'
          }
          
        },
        messages: {
          name: {
            required: "Please Enter Name",
          },
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          mobile: {
            required: "Please enter a Mobile Number",
            mobile: "Please enter a vaild Mobile Number"
          },
          password: {
            required: "Please Enter password",
            minlength: "Your password must be at least 6 characters long"
          },
          password_confirmation: {
            required: "Please Enter Confirm password",
            equalTo : "Confirm Password Does not Match"
          }
          
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