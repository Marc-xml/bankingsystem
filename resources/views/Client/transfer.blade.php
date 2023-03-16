<x-layout>


  {{-- <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\transfer.css') }}">
  <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
  <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">



    <p class="accounts" >Money transfer </p>
        <hr size='7' class="main-line">
        <x-current-account />
        <p class="opt">Select an account to see more</p>
        <!-- accoutn section for dekstop start -->
        <div class="account-container">
          @foreach ($accounts as $account)
          @php
          $first_id = $account->first()
          @endphp
      @endforeach     
     @foreach ($accounts as $account)
     @if ($account->id == $first_id->id)
     <x-active-account-container-trans :account="$account"/>
     @else
     <x-account-container-trans :account="$account"/>
     @endif
     @endforeach
        </div>
         
          <!-- accoutn section for dekstop end -->
  
            {{-- account slider  --}}
            <div class="account-slider swiper">
              <div class="account-content">
                  <div class="account-wrapper swiper-wrapper ">
                    @foreach ($accounts as $account)
          <x-account-slider-trans :account="$account"/>
            @endforeach
          </div>
        </div>
  <div class="swiper-button-next " style="font-size:8px;"></div>
  <div class="swiper-button-prev direction"></div>
  <div class="swiper-pagination direction"></div>
  </div>
         {{-- <!-- account slider end  --> --}}
    
    
    <!-- main end  -->
    <div class="actions">
          <button  class="action" id="modal-btn"><i class="fa fa-paper-plane"></i>Make transfer</button>
          {{-- <button class="action"><i class="fa fa-user"> </i>Add beneficiary</button> --}}
      </div>
<!-- modal section start  -->
<x-new-transfer />
<!-- modal section end  -->
    <p class="accounts">Transfer history</p>
      <hr class="main-line">
      <!-- tabel container start  -->
<!-- flex of benef and history  -->
<div class="flex-history-benef">
<div class="table-container">
        <!-- filter section start  -->
        {{-- <div class="table-filter">
            <!-- search start  -->

            <div class="filter-line">
            <div class="filterbox">
               <span><i class="fa fa-search"></i>Search</span>
               <input type="text" class="search-box" placeholder="Search">
            </div>

          <i class="fa fa-sliders side-line" id="search" ></i>
            </div>
<!-- hide start  -->
          <div class="offcanvas">
          <div class="filter-line">
            <div class="filterbox">
               <span><i class="fa fa-calendar"></i>By Date</span>
               <div>
               <label for="">From:</label>
               <input type="date" class="search-box-date1" placeholder="Search">
               </div>
            </div>
          <div >
          <label for="">To;</label>
           <input type="date" class="search-box-date">
          </div>
            </div>

            <div class="filter-line">
            <div class="filterbox">
               <span><i class="fa fa-dollar"></i>By Amount</span>
               <input type="number" class="search-box" placeholder="min">
            </div>

            <input type="number" class="search-box-date" placeholder="max">
            </div>
            <div class="search-button">
                <button class="search"><span><i class="fa fa-search"></i>Search</span></button>
                <button class="cancel"><span><i class="fa fa-cancel"></i>Reset</span></button>
            </div>
          </div>
<!-- hide end  -->
        </div> --}}
        <!-- filter section end -->

        <!-- real table section start -->
        <div class="table-container">
          <!-- filter section start  -->
          {{-- hey{{session()->get('tranid')}} --}}
      <x-filter-transfer :account="$account"/>
      
          <!-- filter section end -->
  
          <!-- real table section start -->
          <div class="account-table">
            <table class="table">
              <thead>
                <tr>
                  <th>Transaction id</th>
                  <th>Amount</th>
                  <th>Date(y-m-d)</th>
                  <th>Description</th>
                  <th class="show">Status</th>
               
                </tr>
              </thead>
              <tbody>
                @unless(Count($transactions) != 0)
              <div class="no-item">NO TRANSACTION FOUND</div>
               
                @endunless
         @foreach ($transactions as $transaction)
        
      
         <tr>
          <td data-label = "S.no">{{$transaction->id}}</td>
          @if ($transaction->sender_account==session()->get('acc'))
        <td data-label = "Name" style="color:red">-{{$transaction->amount}}</td>
        @else
        <td data-label = "Name" style="color:green">+{{$transaction->amount}}</td>

      @endif
          <td data-label = "Age">{{$transaction->created_at->format("y-m-d")}}</td>
          <td data-label = "Country">{{$transaction->description}}</td>
       @if($transaction->status !== "pending")
        <td data-label = "tel" class="show complete">{{$transaction->status}}</td>
       @else
        <td data-label = "tel" class="show pending"><span ><a href="/pending-trans/{{$id = $transaction->id}}" style="color:rgba(255, 0, 0, 0.692);padding-right:6px;cursor:pointer"><i class="fa fa-trash"></i></a></span>{{$transaction->status}}</td>
       @endif
        
        
        </tr>
        @endforeach
  
         
        </tbody>
      </table>
          </div>
      <!-- beneficiary section  -->
    


   <!-- message icon  -->
     


  
    
</x-layout>