<x-layout>
    
        <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
        <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
        <p class="account">Chechbook request</p>
        <hr class="main-line">

        <div class="review-form" style="margin-left:auto;margin-right:auto">
     
            <form action="/req-check"  method="POST"  enctype="multipart/form-data">
                @csrf
                
               
                  <div class="row">
                  <div class="text_field" >
                    <input type="date" required name="date"  />
                    <label for="">Date</label>
                    
                </div>
                <div class="text_field">
                    <label for="">How many leaves</label>

                        <select name="leaves" id="">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                        </select>
                </div>
              </div>
               <div class="row">
                <div class="text_field">
                  <input type="text" required name="account" placeholder="account number"  />
                  <label for="">For account number</label>
             
              </div>
              <div class="text_field">
                <input type="text" required name="currency" />
                <label for="">Currency of account</label>
                
              </div>
               </div>
              
               <div class="row">
            
              <div class="text_field">
                <input type="text"  name="add1" required />
                <label for="">Street address line 1</label>
              </div>
              <div class="text_field">
                <input type="text"  name="add2"   />
                <label for="">Street address line 2</label>
              </div>
               </div>
              
              
              
             
              
              <div class="row">
              <div class="text_field">
                <label for="">Collection method:</label>

                <select name="method" id="">
                    <option value="person">Collected in person</option>
                    <option value="rep">By a representative</option>
                  
                </select>
              
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
              {{-- <span style="color:#707070;font-size:13px">NB:Make sure every document submited here is authentic and can be verified,violation of these might lead to serious sanctions</span> --}}
              </div>
              
               
              </form>
                    
        </div>
    
        <p class="account">Requested checkbooks</p>
        <hr class="main-line">
       <div style="display:flex;flex-direction:row;flex-wrap:wrap;justify-content:space-between">
        @foreach ($cheques as $cheque)
        <x-cheq-card :cheque="$cheque"/>
        @endforeach
        @unless (count($cheques) != 0)
            {{"No request"}}
        @endunless
      </div>
</x-layout>