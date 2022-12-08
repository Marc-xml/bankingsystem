
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="invoice_2.0\View\css\login.css">
</head>
<body>
    <div class="loader_bg">
        <div class="loader"></div>
    </div>
<div class="nav">
<p class="logo">INVOICE</p>
<div class="end">
<span class="home">Home</span>
<a href="{{route('login')}}"><button class="button">Sign in</button></a>
</div>
</div>
   <div class="center">
    <h1>REGISTER</h1>
    <h2>FIll in the informations below correctly</h2>
    <x-jet-validation-errors class="errors" />
    <form method="POST" action="{{route('register')}}">
        @csrf
        
        <div class="text_field">
            <input  id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" >
            <label for="name" value="{{ __('Name') }}">Name</label>
            
        </div>
        <div class="text_field">
            <input  id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" >
            <label for="email" value="{{ __('Email') }}">Email</label>
            
        </div>
        <div class="text_field">
            <input type="number" id="phone" name="phone" :value="old('phone')" required autofocus autocomplete="phone" >
            <label for="phone" value="{{ __('phone') }}">Phone</label>
            
        </div>
        <div class="text_field">
            <input id="address" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" >
            <label for="address" value="{{ __('address') }}">address</label>
            
        </div>
        <div class="text_field">
            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
            <label for="password" value="{{ __('Password') }}">Password</label>
            
        </div>

        <div class="text_field">
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
            <label for="password_confirmation" value="{{ __('Confirm Password') }}" >Password</label>
            
        </div>
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-4">
            <x-jet-label for="terms">
                <div class="flex items-center">
                    <x-jet-checkbox name="terms" id="terms" required />

                    <div class="ml-2">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </div>
                </div>
            </x-jet-label>
        </div>
    @endif

        
    <div class="submit_button">
    <input type="submit" value="{{ __('Register') }}">
    </div>
        <div class="signup_link">
            <a href="{{route('login')}}">Already have an account?</a>
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
</body>
</html>