<x-layout>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\confirm.css') }}">
  
    <div class="box">
      <p>A confirmation code was sent to your email <span>{{auth()->user()->email}}</span>, verify that code to permit 
      the complletion of the initiated transaction.If you did not receive a code yet click on the button below to send another code
     </p>
     <a href="/verify-loans">
      RESEND CODE
     </a>
    <form action="/confirm-loan" >
      @csrf
  
      <div class="text_field">
       
        <input type="number" name="otp" placeholder="Enter your otp">
   
       </div>
       <input type="submit" class="confirm" value="CONFIRM">
    </form>
{{session()->get('otp')}}
  </div>
  </x-layout>