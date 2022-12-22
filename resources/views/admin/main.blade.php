<x-admin-layout>

    <p class="accounts" >Dashboard statistics</p>
    <hr size='7' class="main-line">

    <div class="stats">
    {{-- FOR USERS --}}
    <div class="stat-card">
        <span><i class="fa fa-user"></i></span>
        <span class="number">{{session()->get("countUsers")}}</span>
        <span class="index">users</span>
        <span ><i class="fa fa-arrow-up" id="flow"></i></span>
    </div>

    {{-- for accounts  --}}
    <div class="stat-card">
        <span><i class="fa fa-user-circle"></i></span>
        <span class="number">{{session()->get("countAcc")}}</span>
        <span class="index">accounts</span>
        <span ><i class="fa fa-arrow-down" id="flow1"></i></span>
    </div>

    {{-- for transactions  --}}
    <div class="stat-card">
        <span><i class="fa fa-exchange"></i></span>
        <span class="number">{{session()->get("countTransactions")}}</span>
        <span class="index">transactions made</span>
        <span ><i class="fa fa-arrow-up" id="flow"></i></span>
    </div>

    {{-- for complains  --}}

    <div class="stat-card">
        <span><i class="fa fa-triangle-exclamation"></i></span>
        <span class="number">20</span>
        <span class="index">new complains</span>
        <span ><i class="fa fa-arrow-down" id="flow1"></i></span>
    </div>


</div>
<p class="accounts" >Statistics summary</p>
    <hr size='7' class="main-line">

<div class="graph-container">
    <div class="first-graph">
    <canvas id="myChart" ></canvas>
    
    </div>
    <div class="second-graph">
      <canvas id="myChart1"></canvas>
    </div>
        </div>
<br>
<p class="accounts" >Ongoing transactions</p>
    <hr size='7' class="main-line">
    <br>
        <x-admin-filter>
        </x-admin-filter>

        <div class="account-table">
            <table class="table">
              <thead>
                <tr>
                  <th>transaction id</th>
                  <th>Amount</th>
                  <th>date</th>
                  <th>sender </th>
                  <th>receiver</th>
                  <th>status</th>

                  <th  class="show">action</th>
             
    
                  {{-- <th  class="show">Action</th> --}}
                 
               
                </tr>
              </thead>
              <tbody>
             
      
        @foreach ($adminTransactions as $transaction)
        <tr>
            <td data-label = "S.no">{{$transaction->id}}</td>
            <td data-label = "Name">{{$transaction->amount}}</td>
            <td data-label = "Age">{{$transaction->created_at}}</td>
            <td class="show">{{$transaction->sender_account}}</td>
            <td  class="show">{{$transaction->receiver_account}}</td>
            @if($transaction->status == "pending")
            <td  class="show "><span class="pending">{{$transaction->status}}</span></td>
            @else
            <td  class="show "><span class="complete">{{$transaction->status}}</span></td>
            
            @endif
            @if ($transaction->status == "pending")
            <td  class="show"><span><a href="/transfer-details/{{$id = $transaction->id}}"><i class="fa fa-eye"></i></a></span><span><a href="/delete-admintrans/{{$id = $transaction->id}}"><i class="fa fa-trash"></i></a></span></td>
            @else 
            <td  class="show"><span><a href="/transfer-details/{{$id = $transaction->id}}"><i class="fa fa-eye"></i></a></span><i class="fa fa-trash"  style="color:transparent"></i><span></span></td>

            @endif
           
          </tr>
        @endforeach
 
    
    
         
        </tbody>
        @unless (count($adminTransactions) !== 0)
        {{"No transactions"}}
    @endunless
      </table>
          </div>"
</x-admin-layout>