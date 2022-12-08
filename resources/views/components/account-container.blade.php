<a href="/account/{{$id = $account->id}}">
    

    <div class="account-card-dekstop swiper-slide  {{ 'account/'.$account->id == request()->path() ? 'active-account' : ''}}  {{ '/'.$account->id == request()->path() ? 'active-account' : ''}} "  >
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
         <span class="ellipsis"  ><i class="fa fa-ellipsis" id="toggle" type="button"></i></span>
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
        <!-- modal start  -->
        <div class="options" id="show">
         <span class="option-content"><i class="fa fa-clipboard"></i>Personalise  account Alias</span>
         <span class="option-content"><i class="fa fa-gauge"></i>Manage my gauge</span>
        </div>
       </div>
</a>

          
  
