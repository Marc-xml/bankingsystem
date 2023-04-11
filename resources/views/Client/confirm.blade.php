<x-layout>
  <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\confirm.css') }}">

  <div class="box">
    <p>A confirmation code was sent to your email <span>{{auth()->user()->email}}</span>, verify that code to permit 
    the complletion of the initiated transaction.If you did not receive a code yet click on the button below to send another code
   </p>
   <button class="confirm">
    <a href="/confirm-transaction">RESEND CODE</a>
   </button>
  <form action="/conclude-transaction" >
    @csrf

    <div class="text_field">
     
      <input type="number" name="otp" placeholder="Enter your otp">
 
     </div>
     <input type="submit" class="confirm" value="CONFIRM">
  </form>
   {{session()->get('amount')}}
</div>
</x-layout>