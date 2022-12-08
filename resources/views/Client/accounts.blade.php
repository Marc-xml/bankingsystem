<x-layout>
  <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
  
  
        <p class="accounts" >My Accounts</p>
        <hr size='7' class="main-line">
        <p class="opt">Select an account to see more</p>
        <!-- accoutn section for dekstop start -->
        <div class="account-container">
        @foreach ($accounts as $account)
        <x-account-container :account="$account"/>
     
        @endforeach
      </div>
       
        <!-- accoutn section for dekstop end -->

          {{-- account slider  --}}
          <div class="account-slider swiper">
            <div class="account-content">
                <div class="account-wrapper swiper-wrapper ">
                  @foreach ($accounts as $account)
        <x-account-slider :account="$account"/>
          @endforeach
        </div>
      </div>
<div class="swiper-button-next " style="font-size:8px;"></div>
<div class="swiper-button-prev direction"></div>
<div class="swiper-pagination direction"></div>
</div>
       {{-- <!-- account slider end  --> --}}
  
    <p class="accounts"> Income and expenses</p>
    <hr class="main-line">
    <!-- graph start  -->
    <div class="graph-container">
<div class="first-graph">
<canvas id="myChart" ></canvas>

</div>
<div class="second-graph">
  <canvas id="myChart1"></canvas>
</div>
    </div>
   
      <p class="accounts">Operations record</p>
      <hr class="main-line">
      <!-- tabel container start  -->
      <div class="table-container">
        <!-- filter section start  -->
    <x-filter :accounts="$account"/>
    
        <!-- filter section end -->

        <!-- real table section start -->
        <div class="account-table">
          <table class="table">
            <thead>
              <tr>
                <th>Transaction id</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
                <th>Status</th>
             
              </tr>
            </thead>
            <tbody>
              @unless(Count($transactions) == 1)
              {{"no Transaction record available"}}
             
              @endunless
       @foreach ($transactions as $transaction)
      
    
       <tr>
        <td data-label = "S.no">{{$transaction->id}}</td>
        <td data-label = "Name">{{$transaction->amount}}</td>
        <td data-label = "Age">{{$transaction->date}}</td>
        <td data-label = "Country">{{$transaction->description}}</td>
        <td data-label = "tel">{{$transaction->status}}</td>
      
      
      </tr>
      @endforeach

       
      </tbody>
    </table>
        </div>

        <!-- real table section end -->

          <!-- message icon  -->
          <x-message>
          </x-message>
        </x-layout>