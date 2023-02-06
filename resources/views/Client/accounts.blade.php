<x-layout>
  <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
  <x-current-account />
 
        <p class="accounts" >My Accounts</p>
        <hr size='7' class="main-line">
        <p class="opt">Select an account to see more</p>
        <!-- accoutn section for dekstop start -->
        {{-- {{session()->get('debit')}} --}}
        <div class="account-container">
         @foreach ($accounts as $account)
             @php
             $first_id = $account->first()
             @endphp
         @endforeach     
        @foreach ($accounts as $account)
        @if ($account->id == $first_id->id)
        <x-active-account-container :account="$account"/>
        @else
        <x-account-container :account="$account"/>
        @endif
        @endforeach
      </div>
       
        <!-- accoutn section for dekstop end -->

          {{-- account slider  --}}
          <div class="account-slider swiper">
            <div class="account-content">
                <div class="account-wrapper swiper-wrapper ">
                  
                  @foreach ($accounts as $account)
        <x-account-slider :account="$account" />
        
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
    @push('scripts')
    
    <script src="{{ asset('invoice_2.0\View\assets\package\dist\chart.js') }}"></script>
    <script src="{{ asset('invoice_2.0\View\assets\package\dist\chart.min.js') }}"></script>
        <script>
           // graph section 

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ],
        datasets: [{
            label: 'Number of transactions',
            data:{{Js::from($thisyeartransaction)}},
            backgroundColor: [
                '',
                '',
                '',
                '',
                '',
                ''
            ],
            borderColor: [
                '#2D89EF',
                '#2D89EF',
                '#2D89EF',
                '#2D89EF',
               '#2D89EF',
                '#2D89EF'
            ],
            borderWidth: 0.5
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

    //  second graph 
    
const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Debits ',
      backgroundColor: '#2D89EF',
      borderColor: '#2D89EF',
      data:{{Js::from($debits)}},
    
    },
    {
    label: 'credits',
      backgroundColor: 'lightgrey',
      borderColor: 'lightgrey',
      data:{{Js::from($credits)}},
    
    }
  ]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {indexAxis: 'y'}
  };


  const myChart1 = new Chart(
    document.getElementById('myChart1'),
    config
  );

        </script>
    @endpush
 
      <p class="accounts">Operations record</p>
      <hr class="main-line">
      <!-- tabel container start  -->
      <div class="table-container">
        <!-- filter section start  -->
    <x-filter :accounts="$account"/>
    
        <!-- filter section end -->

        <!-- real table section start -->
        <div class="account-table" style="min-height:500px">
          <table class="table">
            <thead>
              <tr>
                <th>Transaction id</th>
                <th>Amount(XAF)</th>
                <th>Date</th>
                <th  class="show">Description</th>
                <th  class="show">Status</th>
                {{-- <th  class="show">Action</th> --}}
               
             
              </tr>
            </thead>
            <tbody>
              
       @foreach ($transactions as $transaction)
      
    
       <tr>
        <td data-label = "S.no">RIB 01001 0107365671{{$transaction->id}}</td>
        <td data-label = "Name">{{$transaction->amount}}</td>
        <td data-label = "Age">{{$transaction->created_at}}</td>
        <td class="show">{{$transaction->description}}</td>
        <td  class="show">{{$transaction->status}}</td>
        {{-- <td class="show"></td> --}}
        
      
      
      </tr>
      @endforeach

       
      </tbody>
    </table>
    @unless(Count($transactions) !== 0)
              <div class="no-item">NO TRANSACTION FOUND</div>
             
              @endunless
        </div>

        <!-- real table section end -->

          <!-- message icon  -->
          {{-- <x-message>
          </x-message> --}}
          
        </x-layout>