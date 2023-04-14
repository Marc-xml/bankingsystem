<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="invoice_2.0\View\css\login.css">
</head>
<body>
    <div class="loader_bg">
        <div class="loader"></div>
    </div>
    <x-flash-message />
   <div class="center">
    <h1>INVOICE INC</h1>
    <x-jet-validation-errors class="errors" />
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="text_field">
            <input id="email" type="email" name="email" :value="old('email')" required autofocus >
            <label value="{{ __('Email') }}" >Username</label>
            
        </div>
        <div class="text_field">
            <input id="password"  type="password" name="password" required autocomplete="current-password" >
            <label  for="password" value="{{ __('Password') }}" id="labelup">Password</label>
            
        </div>

        {{-- <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <x-jet-checkbox id="remember_me" name="remember" />
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div style="text-align:center" class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="submit_button">
                <input type="submit" value="{{ __('Log in') }}">
                
                </div>
           
        </div>
        <div class="signup_link">
            <a href="{{_('register')}}">Don't have an account?</a>
        </div>
    </form>
   </div>
   <script src="{{ asset('invoice_2.0\View\assets\jquery\jquery-3.6.0.min.js') }}"></script>
        <script >
            setTimeout(function(){
          $('.loader_bg').fadeToggle();
         }, 1500);8
          </script>
</body>
</html>
