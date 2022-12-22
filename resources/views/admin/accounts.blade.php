<x-admin-layout>
    <p class="accounts" >All accounts</p>
    <hr size='7' class="main-line">
    <br>
    <x-account-filter>
    </x-account-filter>
    <div class="account-table">
        <table class="table">
          <thead>
            <tr>
              <th>Account id</th>
              <th>Alias</th>
              <th>type</th>
              <th>balance </th>
              <th>Overdraft</th>
              <th>upcoming balance</th>
              <th>Totalbalance</th>
              <th  class="show">Owner</th>
            
              {{-- <th  class="show">status</th> --}}
              <th>Action</th>

              {{-- <th  class="show">Action</th> --}}
             
           
            </tr>
          </thead>
          <tbody>
           
  
     @foreach ($accounts as $account)
     <tr>
      <td data-label = "S.no">{{$account->id}}</td>
      <td data-label = "Name">{{$account->alias}}</td>
      <td data-label = "Age">{{$account->type}}</td>
      <td class="show">{{$account->balance}}</td>
      <td  class="show">{{$account->overdraft}}</td>
      <td  class="show">{{$account->upcoming_balance}}</td>
      <td  class="show">{{$account->total_balance}}</td>
      <td  class="show">{{$account->owner_id}}</td>
      <td  class="show"><span><a href="/account-details/{{$id = $account->id}}"><i class="fa fa-eye"></i></a></span></td>
      {{-- <td class="show"></td> --}}
    </tr>
     @endforeach
@unless (count($accounts) !==0)
    {{"No account found"}}
@endunless

     
    </tbody>
  </table>
      </div>
</x-admin-layout>