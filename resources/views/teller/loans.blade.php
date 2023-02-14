<x-teller-layout>
    <x-flash-message/>
      <p class="accounts" >All Laons</p>
      <hr size='7' class="main-line">
      <br>
 
  <br>
      <br>
    
      <x-adminloan-filter>
      </x-adminloan-filter>
      <div class="account-table">
          <table class="table">
            <thead>
              <tr>
                <th>Loan id</th>
                <th>Amount</th>
                <th>date Limit</th>
                <th>Monthly payement </th>
                <th>Account concerned</th>
                <th>status</th>
                <th  class="show">action</th>
             
  
                {{-- <th  class="show">Action</th> --}}
               
             
              </tr>
            </thead>
            <tbody>
             
    
              @foreach ($loans as $loan)
              <tr>
                  <td data-label = "S.no">{{$loan->id}}</td>
                  <td data-label = "Name">{{$loan->amount}}</td>
                  <td data-label = "Age">{{$loan->date_limit}}</td>
                  <td class="show">{{$loan->monthyl_payement}}</td>
                  <td  class="show">{{$loan->account_concerned}}</td>
                  @if($loan->status == "pending")
                  <td  class="show "><span class="pending">{{$loan->status}}</span></td>
                  @elseif($loan->status == "denied")
                  <td  class="show "><span class="denied">{{$loan->status}}</span></td>

                  @else
                  <td  class="show "><span class="complete">{{$loan->status}}</span></td>
                  
                  @endif
                  @if ($loan->status == "pending" || $loan->status == "uncompleted")
                  <td  class="show"><span><a href="/loan-details/{{$id = $loan->id}}"><i class="fa fa-eye"></i></a></span><span><a href="/delete-adloan/{{$id = $loan->id}}"><i class="fa fa-trash"></i></a></span></td>
                  @else 
                  <td  class="show"><span><a href="/loan-details/{{$id = $loan->id}}"><i class="fa fa-eye"></i></a></span><i class="fa fa-trash"  style="color:transparent"></i><span></span></td>
      
                  @endif
                 
                </tr>
              @endforeach
              @unless (count($loans) !== 0)
                  {{"No transactions found"}}
              @endunless
  
  
       
      </tbody>
    </table>
        </div>
  </x-teller-layout>