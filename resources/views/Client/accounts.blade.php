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
<div class="first-graph" >
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
// const cty = document.getElementById('myChart1').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:[
    'Jan',
    'Feb',
    'March',
    'April',
    'May',
    'June',
    'July',
    'Aug',
    'Sep',
    'Oct',
    'Nov',
    'Dec'
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
//     const myChart1 = new Chart(cty, {
//     type: 'bar',
//     data: {
//         labels:[
//     'Jan',
//     'Feb',
//     'March',
//     'April',
//     'May',
//     'June',
//     'July',
//     'Aug',
//     'Sep',
//     'Oct',
//     'Nov',
//     'Dec'
//   ],
//         datasets: [{
//             label: 'Number of transactions',
//             data:{{Js::from($debits)}},
//             backgroundColor: [
//                 '',
//                 '',
//                 '',
//                 '',
//                 '',
//                 ''
//             ],
//             borderColor: [
//                 '#2D89EF',
//                 '#2D89EF',
//                 '#2D89EF',
//                 '#2D89EF',
//                '#2D89EF',
//                 '#2D89EF'
//             ],
//             borderWidth: 0.5
//         }]
//     },
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     }
// });

    
const labels = [
  'Jan',
    'Feb',
    'March',
    'April',
    'May',
    'June',
    'July',
    'Aug',
    'Sep',
    'Oct',
    'Nov',
    'Dec'
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
    // options: {indexAxis: 'y'}
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
      @if ($transaction->sender_account==session()->get('acc'))
        <td data-label = "Name" style="color:red">-{{$transaction->amount}}</td>
        @else
        <td data-label = "Name" style="color:green">+{{$transaction->amount}}</td>

      @endif
        <td data-label = "Age">{{$transaction->created_at}}</td>
        <td class="show">{{$transaction->description}}</td>
        @if($transaction->status !== "pending")
        <td data-label = "tel" class="show complete">{{$transaction->status}}</td>
       @else
        <td data-label = "tel" class="show pending"><span ><a href="/pending-trans/{{$id = $transaction->id}}" style="color:rgba(255, 0, 0, 0.692);padding-right:6px;cursor:pointer"><i class="fa fa-trash"></i></a></span>{{$transaction->status}}</td>
       @endif
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
          
  <span class="message-trigger"><i class="fa fa-message"></i></span>

  <div class="message-box" style="background: #fff;z-index:50;height: 500px;">
   <div class="message-actions">
           <span><i class="fa fa-trash"></i></span>
           <span class="move-box">Cancel</span>
   </div>

   @php
       $messages = session()->get('mss');
   @endphp

     {{-- <div style="height:20rem;overflow;scroll;"> --}}
 <div style="height:400px;overflow:scroll">
  @foreach ($messages as $message)
  <div class="message" style="box-shadow:2px 2px 2px 2px #2d87ef2d;z-index:50">
      {{$message->content}}
     {{-- <span style="font-size:10px;">sender:{{auth()->user()->name}} at {{$message->created_at->Carbon::format('H:i:s')}}</span> --}}
     </div>
     
     <div class="message-1" style="box-shadow:2px 2px 2px 2px #2d87ef2d;padding:10px;">
         {{$message->reply}}
     </div>
  @endforeach
 

 </div>
    



 <hr>
  <div class="below">
  
  <span class="message-icon"><i class="fa fa-message"></i></span>
   <form action="/send-message" method="post">
    @csrf
        <input type="text" class="message-input" name="content" required>
       <button type="submit" style="color:inherit;background:transparent;border:none"><i class="fa fa-paper-plane" ></i><button>
        {{-- <span> type="submit"</span> --}}
   </form>
 
  </div> 
          
        </x-layout>