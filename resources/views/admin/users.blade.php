<x-admin-layout>
  <x-flash-message/>
    <p class="accounts" >All users</p>
    <hr size='7' class="main-line">
    <br>
    <button class="action" style="margin-bottom:20px;" id="modal-btn">Create new user <span><i class="fa fa-plus"></i></span></button>
    <br>
    <x-user-modal>
    </x-user-modal>

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
              <th>status</th>
              
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
     @if ($user->usertype == '0')
      <td  class="show"><span class="pending">{{"Client"}}</span></td>
     @elseif($user->usertype == '1')
      <td  class="show"><span class="complete">{{"Admin"}}</span></td>
     @else
     <td  class="show"><span class="super">{{"Super Admin"}}</span></td>
     @endif
      <td  class="show">{{$user->created_at}}</td>
      <td  class="show">
        <span><a href="/user-details/{{$id = $user->id}}"><i class="fa fa-eye"></i></a></span>
        <span><a href="/review-user/{{$id = $user->id}}"><i class="fa fa-pen"></i></a></span>
        <span><a href="/email-user/{{$id = $user->id}}"><i class="fa fa-envelope"></i></a></span>
        <span style="margin-left:10px"><a href="/delete-user/{{$id = $user->id}}"><i class="fa fa-trash"></i></a></span>
        <span style="margin-left:10px; color:rgba(255, 0, 0, 0.329)"><a href="/restrict-user/{{$id = $user->id}}"><i class="fa fa-cancel"></i></a></span>
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