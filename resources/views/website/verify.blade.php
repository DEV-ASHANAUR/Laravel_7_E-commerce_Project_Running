@extends('layouts.website')
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="#"><i class="fa fa-home"></i> Home</a>
                    <span>Email Verification</span>
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
                <div class="login-form">
                    <h2>Email Verification</h2>
                    <form action="{{ route('email.check') }}" method="POST" id="Myform">
                        @csrf
                        <div class="group-input form-group">
                            <label for="email">Email address *</label>
                            <input type="email" class="form-control" name="email" id="email">
                            <font class="text-danger">{{ ($errors->has('email'))?($errors->first('email')):'' }}</font>
                        </div>
                        <div class="group-input form-group">
                            <label for="code">Verification Code *</label>
                            <input type="text" class="form-control" name="code" id="code">
                            <font class="text-danger">{{ ($errors->has('code'))?($errors->first('code')):'' }}</font>
                        </div>
                        {{-- <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Save Password
                                    <input type="checkbox" id="save-pass">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">Forget your Password</a>
                            </div>
                        </div> --}}
                        <button type="submit" class="site-btn login-btn">Verify</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{ route('customer.reg') }}" class="or-login">Or Create An Account</a>
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
          email: {
            required: true,
            email: true,
          },
          code: {
            required: true,
          }
          
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          code: {
            required: "Please enter Your verification Code",
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