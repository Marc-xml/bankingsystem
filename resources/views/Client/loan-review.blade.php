<x-layout>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
    <p class="account">Review submitted loan</p>
    <hr class="main-line">
 <div class="review-info" >The loan review process can take upto 24hrs from when the loan request is initiated</div>
    <div class="review-form">
        @foreach ($loans as $loan)
            
        @endforeach
        @if ($errors->any())
        @foreach ($errors as $error)
            <li>{{$error}}</li>
        @endforeach
            
        @endif
        <form action="/update-loan{{$id = $loan->id}}"  method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
              <div class="row">
              <div class="text_field" >
                <input type="text" required name="name" value="{{$loan->name}}" />
                <label for="">Full name</label>
                
            </div>
            <div class="text_field">
                <input type="text" required name="address" value="{{$loan->address}}" />
                <label for="">address</label>
                
            </div>
          </div>
           <div class="row">
            <div class="text_field">
              <input type="text" required name="phone" placeholder="Mobile number" value="{{$loan->phone}}" />
              <label for="">phone number</label>
              @error('account')
        <p style="color:red">{{$message}}</p>
        @enderror
          </div>
          <div class="text_field">
            <input type="date" required name="dob" value="{{$loan->dob}}" />
            <label for="">Date of birth</label>
            
          </div>
           </div>
          
           <div class="row">
            <div class="text_field">
              <input type="text"  name="account"  value="{{$loan->account_concerned}}" />
              <label for="account">account number </label>
              @error('account')
              <p style="color:red">{{$message}}</p>
              @enderror
                  
              
              
          </div>
          <div class="text_field">
            <input type="file" name="identity" />
            <img  src="{{$loan->identity_proof ? asset('storage/' . $loan->identity_proof) : asset('/images/no-image.png')}}" >
            <label for="">proof of identity</label>
            @error('identity')
            <p style="color:red">{{$message}}</p>
            @enderror
            
          </div>
           </div>
          
           <div class="row">
            <div class="text_field">
              <input type="file"  name="income"  />
              <label for="">Income verification</label>
            <img  src="{{$loan->identity_proof ? asset('storage/' . $loan->income_proof) : asset('/images/no-image.png')}}" >
            @error('income')
            <p style="color:red">{{$message}}</p>
            @enderror
              
            </div>
            <div class="text_field">
              <input type="file"  name="addressproof" value="{{$loan->address_proof}}" />
              <label for="">proof of address</label>
            <img  src="{{$loan->identity_proof ? asset('storage/' . $loan->address_proof) : asset('/images/no-image.png')}}" >
            @error('addressproof')
            <p style="color:red">{{$message}}</p>
            @enderror
              
            </div>
           </div>
          
          <div class="row">
          <div class="text_field">
          <input type="text" required name="purpose" value="{{$loan->purpose}}" />
          <label for="">Loan purpose</label>
          
          </div>
          <div class="text_field">
          <input type="number" required name="loan_amount" value="{{$loan->amount}}" />
          <label for="">Loan amount</label>
          
          </div>
          </div>
          
          <div class="row">
          <div class="text_field">
          <input type="text" required name="permonth" value="{{$loan->monthly_payement}}" />
          <label for="">Amount per month</label>
          
          </div>
          <div class="text_field">
          <input type="date" required name="time" value="{{$loan->date_limit}}" />
          <label for="">date limit</label>
          
          </div>
          </div>
          <div class="bottom">
          <span><input type="checkbox" style="margin:auto 5px">By clicking you agree to all our terms and conditions</span>
          </div>
          <div class="bottom" style="">
          <input type="submit" value="SUBMIT" class="loan-button" style="width:5rem;">
          <span style="margin-top:20px;">reset</span>
          </div>
          <div class="bottom">
          <span style="color:#707070;font-size:13px">NB:Make sure every document submited here is authentic and can be verified,violation of these might lead to serious sanctions</span>
          </div>
          
           
          </form>
                
    </div>
</x-layout>