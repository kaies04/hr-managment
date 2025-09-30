@extends('layouts.app')

@section('content')

    <h4 class="text-dark text-center mb-5">Sign Up</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-12 mb-4">
                <input type="text" class="form-control input-lg" id="name" name="name" aria-describedby="nameHelp"
                    placeholder="Name" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12 mb-4">
                <input type="email" class="form-control input-lg" id="email" name="email" aria-describedby="emailHelp"
                    placeholder="Email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12 mb-4">
                <input type="text" class="form-control input-lg" id="org_name" name="org_name"
                    aria-describedby="orgNameHelp" placeholder="Organization Name" required>
                @error('org_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12 mb-4">
                <input type="text" class="form-control input-lg" id="org_contact_number" name="org_contact_number"
                    aria-describedby="orgContactNumberHelp" placeholder="Organization Contact Number" required>
                @error('org_contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12 mb-4">
                <input type="text" class="form-control input-lg" id="contact_number" name="contact_number"
                    aria-describedby="contactNumberHelp" placeholder="Owner Contact Number" required>
                @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12 ">
                <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password"
                    required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12 ">
                <input type="password" class="form-control input-lg" id="password_confirmation" name="password_confirmation"
                    placeholder="Confirm Password" required>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
                <div class="d-flex justify-content-between mb-3">

                    <div class="custom-control custom-checkbox mr-3 mb-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">I Agree the terms
                            and conditions.</label>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary btn-pill mb-4">Sign Up</button>

                <p>Already have an account?
                    <a class="text-blue" href="sign-in.html">Sign in</a>
                </p>
            </div>
        </div>
    </form>

@endsection