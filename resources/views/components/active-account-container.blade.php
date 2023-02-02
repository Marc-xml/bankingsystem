<div>
    <a href="/account/{{$id = $account->id}}">
    

        <div class="account-card-dekstop swiper-slide   {{ 'account/'.$account->id == request()->path() ? 'active-account' : ''}} {{ '/' == request()->path() ? 'active-account' : ''}}"  >
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
                <a href="/account/alias/{{$id = $account->id}}"><span class="option-content"><i class="fa fa-clipboard"></i>Personalise  account Alias</span></a>
                {{-- <a href=""><span class="option-content"><i class="fa fa-gauge"></i>Manage my gauge</span></a> --}}
             <a href="/account/{{$id = $account->id}}">
            </div>
           </div>
        </a>
    
    <span  style="cursor:pointer"><i class="fa fa-ellipsis" id="toggle{{$account->id}}" type="button"></i></span>
    
    
              
      
    
</div>