<x-admin-layout>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
    <x-flash-message/>
    <p class="account">Review user information</p>
    <hr class="main-line">
    <br>
 
    <div class="review-form">
      
        <form action="/update-user/{{$id = $user->id}}"  method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
              <div class="row">
              <div class="text_field" >
                <input type="text" required name="name" value="{{$user->name}}" />
                <label for="">Full name</label>
                
            </div>
            <div class="text_field" >
                <input type="email" required name="email" value="{{$user->email}}" />
                <label for="">Email</label>
                
            </div>
            <div class="text_field">
                <input type="text" required name="address" value="{{$user->address}}" />
                <label for="">address</label>
                
            </div>
          </div>
           <div class="row">
            <div class="text_field">
              <input type="text" required name="phone" value="{{$user->Phone}}" />
              <label for="">phone number</label>
              @error('account')
        <p style="color:red">{{$message}}</p>
        @enderror
          </div>
        
           </div>
          
         
          
           
          
       
       
          <div class="bottom">
       
          </div>
          <div class="bottom" style="">
          <input type="submit" value="SUBMIT" class="loan-button" style="width:5rem;">
          <span style="margin-top:20px;">reset</span>
          </div>
          <div class="bottom">
          {{-- <span style="color:#707070;font-size:13px">NB:Make sure every document submited here is authentic and can be verified,violation of these might lead to serious sanctions</span> --}}
          </div>
          
           
          </form>
                
    </div>
</x-admin-layout>