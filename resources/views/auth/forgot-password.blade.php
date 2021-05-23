 @extends('layouts.admin-template')


@section('content')

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

             <!-- Email Address -->
            <div class="form-group">
              <!--   <label for="email">Email</label> -->

                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" value="{{ old('email') }}" required autofocus />
            </div>

           

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
   
 @endsection
