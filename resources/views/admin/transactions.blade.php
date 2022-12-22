<x-admin-layout>
    <p class="accounts" >All transcations</p>
    <hr size='7' class="main-line">
    <br>
    <div style="float:right">
    <button class="action" id="modal-btn">Transfer funds <span><i class="fa fa-paper-plane"></i></span></button>
    </div>
<br>
    <br>
    <x-admin-modal>
    </x-admin-modal>
    <x-transfer-filter>
    </x-transfer-filter>
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
           
  
            @foreach ($alltransactions as $transaction)
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
            @unless (count($alltransactions) !== 0)
                {{"No transactions found"}}
            @endunless


     
    </tbody>
  </table>
      </div>
</x-admin-layout>