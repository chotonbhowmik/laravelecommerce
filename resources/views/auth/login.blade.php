@extends('layouts.admin-template')


@section('content')
        <!-- Session Status -->
        <!-- <x-auth-session-status class="mb-4" :status="session('status')" /> -->

        <!-- Validation Errors -->
       <!--  <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
              <!--   <label for="email">Email</label> -->

                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your username" value="{{ old('email') }}" required autofocus />
            </div>

            <!-- Password -->
           
            <div class="form-group">
               <!--  <label for="email">Password</label> -->

                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" value="{{ old('email') }}" required autocomplete="current-password" />
            </div>
        

              <button type="submit" class="btn btn-info btn-block">Login</button>
                @if (Route::has('password.request'))
                <div class="mg-t-20 mg-b-20 tx-center">Forgot your password? <a href="{{ route('password.request') }}" class="tx-info">Click Here</a></div>

                @endif

              <div class="tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>
            
        </form>
   @endsection
