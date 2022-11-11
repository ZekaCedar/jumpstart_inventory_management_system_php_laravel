@extends('layouts.app')

@section('content')

<div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="mb-4">
                        <i class="feather icon-user-plus auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Sign up</h3>
                    <div class="input-group mb-3">
                        <input type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="number" placeholder="Contact" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" >

                        @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <select name="role" id="roleType" class="form-control" value="{{ old('role') }}" required autocomplete="role"
                        style="color:rgb(175,179,184)">
                            <option>Choose Your Role in Jumpstart</option>
                            <option value="customer">Customer</option>
                            <option value="employee">Employee</option>
                         </select>
                    </div>
                    
                    <!--Employee Box-->
                    <div class="input-group mb-3" id="otherType" style="display:none;">
                        <div class="input-group mb-3">
                            <select name="employee_job_title" class="form-control" name="employee_job_title" value="{{ old('employee_job_title') }}" required autocomplete="employee_job_title"
                            style="color: black">
                                <option>Choose Your Position</option>
                                <option value="manager">Manager</option>
                                <option value="administrator">Administrator</option>
                             </select>
                        </div>

                        <div class="input-group mb-3">
                            <select name="employee_job_location" class="form-control" name="employee_job_location" value="{{ old('employee_job_location') }}" required autocomplete="employee_job_location"
                            style="color: black">
                                <option>Choose Your Job / Store Location</option>
                                <option value="HQ">HQ</option>
                                <option value="Store Branch 1">Store Branch 1</option>
                             </select>
                        </div>
                    </div>

                    <script>
                    $('#roleType').on('change',function(){
                        if( $(this).val()==="employee"){
                        $("#otherType").show()
                        }
                        else{
                        $("#otherType").hide()
                        }
                    });
                    </script>
                    <!--Employee Box-->

                    <div class="input-group mb-4">
                        <input type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                     <div class="input-group mb-4">
                        <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    </div>

                    {{-- <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-1" checked="">
                            <label for="checkbox-fill-1" class="cr"> Save Details</label>
                        </div>
                    </div> --}}
                   
                    <button class="btn btn-primary shadow-2 mb-4" type="submit">Sign up</button>
                    <p class="mb-0 text-muted">Allready have an account? <a href="{{ route('login') }}"> Log in</a></p>
                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
	<script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

@endsection
