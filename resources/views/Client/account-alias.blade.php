<x-layout>
    {{-- <link rel="stylesheet" href="invoice_2.0\View\css\loans.css"> --}}
    <link rel="stylesheet" href="{{asset("invoice_2.0\View\css\bill.css")}}">
    <p class="accounts" >Modify account name</p>
    <hr size='7' class="main-line">
    <div style="display:flex;justify-content:center;flex-wrap:wrap">
        <div>
            <a href="/account/{{$id = $account->id}}">
            
        
                <div class="account-card-dekstop swiper-slide  {{ '/' == request()->path() ? 'active-account' : ''}}   {{ 'account/'.$account->id == request()->path() ? 'active-account' : ''}} "  >
                    <!-- uper section of card start  -->
                    <div class="upper-card">
            
                    <span>
                       <i class="fa fa-suitcase suit-card"></i>
                    </span>
                     <div class="inner-upper-card">
                     <span>
                       <span class="alias">{{$account->alias}}</span> <span class="type">{{$account->account_type}}</span>
                     </span>
                     <span class=" acc-no">{{$account->account_type}}</span>
                     <span class="agency">PRINCIPAL AGENCY</span>
                     </div>
                    </div>
                    <hr class="card-line">
                    <!-- uper section of card end  -->
                    <!-- lower section of card start  -->
                    <div class="lower-card">
                           <div class="lower-card-div">
                               <span class="test"> <span> BALANCE</span></span>
                               <span class="bolder-lower-card-div">{{$account->balance}}XAF</span>
                         
                           </div>
            
                           <div class="lower-card-div">
                           <span class="test"> <span> UPCOMING </span></span>
                               <span class="bolder-lower-card-div">{{$account->upcoming_balance}} XAF</span>
                           </div>
            
                           <div class="lower-card-div">
                               <span>OVERDRAFT</span>
                               <span class="bolder-lower-card-div">{{$account->overdraft}} XAF</span>
                           </div>
                    </div>
                    <!-- lower section of card end  -->
                    <!-- modal start  --></a>
                    <div class="options" id="show{{$account->id}}" style="z-index:30;">
                     {{-- <span class="option-content"><i class="fa fa-clipboard"></i>Personalise  account Alias</span>
                     <span class="option-content"><i class="fa fa-gauge"></i>Manage my gauge</span> --}}
                     <a href="/account/{{$id = $account->id}}">
                    </div>
                   </div>
                </a>
            
            {{-- <span  style="cursor:pointer"><i class="fa fa-ellipsis" id="toggle{{$account->id}}" type="button"></i></span> --}}
            
            
                      
              
            
        </div>
        <br>
        <form action="/change-alias/{{$id = $account->id}}" method="POST" style="margin-left:20px;margin-top:30px;">
            @csrf
            @method('PUT')
            <div class="text_field">
                <input type="text" required name="alias" value="{{$account->alias}}">
             
            </div>
                <div class="submit_button">
                    <input type="submit" value="Confirm">
                    </div>
           
        </form>
        </div>
</x-layout>