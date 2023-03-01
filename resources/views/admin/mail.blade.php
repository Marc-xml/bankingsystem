<x-admin-layout>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
    <p class="account">Contact All user</p>
    <hr class="main-line">
    <br>
    <x-flash-message />
<br>
    <div class="review-form"   >
    
            

        <form action="/mail-all"  method="POST"  enctype="multipart/form-data">
            @csrf
        
           
              <div class="row">
            
            {{-- <div class="text_field">
                <input type="text" required name="address" value="{{$loan->address}}" />
                <label for="">address</label>
                
            </div> --}}
            <div class="text_field" >
                <label for="">Message</label>
                <br>
                <br>
                <textarea name="message" id="" cols="80" rows="10"></textarea>
            </div>
          </div>
          <div class="bottom">
          </div>
          <div>
            {{-- Please check your inbox for response --}}
          </div>
          <div class="bottom" style="">
          <input type="submit" value="SEND " class="loan-button" style="width:5rem;">
          <span style="margin-top:20px;">reset</span>
          </div>
          <div class="bottom">
          </div>
          
           
          </form>
   
                
    </div>
   
  
    
  
</x-admin-layout>