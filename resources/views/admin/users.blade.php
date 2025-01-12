<x-admin-layout>
  <x-flash-message/>
    <p class="accounts" >All users</p>
    <hr size='7' class="main-line">
    <br>
    <x-user-filter>
    </x-user-filter>
    <div class="account-table">
        <table class="table">
          <thead>
            <tr>
              <th>User id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone number </th>
              <th>Address</th>
              
              <th class="show">Date registered</th>
              <th class="show">Action</th>

              {{-- <th  class="show">Action</th> --}}
             
           
            </tr>
          </thead>
          <tbody>
           
  
     @foreach ($users as $user)
     <tr>
      <td data-label = "S.no">{{$user->id}}</td>
      <td data-label = "Name">{{$user->name}}</td>
      <td data-label = "Age">{{$user->email}}</td>
      <td class="show">{{$user->Phone}}</td>
      <td  class="show">{{$user->address}}</td>

      <td  class="show">{{$user->created_at}}</td>
      <td  class="show">
        <span><a href="/user-details/{{$id = $user->id}}"><i class="fa fa-eye"></i></a></span>
        <span><a href="/review-user/{{$id = $user->id}}"><i class="fa fa-pen"></i></a></span>
        <span><a href="/delete-user/{{$id = $user->id}}"><i class="fa fa-trash"></i></a></span>
      </td>
      
      {{-- <td class="show"></td> --}}
    </tr>
     @endforeach
     @unless (count($users) !== 0)
         {{"No users found "}}
     @endunless


     
    </tbody>
  </table>
      </div>
</x-admin-layout>