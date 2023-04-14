<x-admin-layout>
  <x-flash-message/>
    <p class="accounts" >All users</p>
    <hr size='7' class="main-line">
    <br>
    <button class="action" style="margin-bottom:20px;" id="modal-btn">Create new user <span><i class="fa fa-plus"></i></span></button>
    <a href="/broadcast"><button class="action" style="margin-bottom:20px;" >Bulk Mailing <span><i class="fa fa-envelope"></i></span></button></a>
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
              <th>Restricted</th>
              
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
    
     @elseif($user->usertype == '3')
      <td  class="show"><span class="complete">{{"Super Admin"}}</span></td>
     @else
     <td  class="show"><span class="super">{{"Teller"}}</span></td>
     @endif
      <td  class="show">{{$user->restricted}}</td>
      <td  class="show">{{$user->created_at}}</td>
      <td  class="show">
        <span><a href="/user-details/{{$id = $user->id}}"><i class="fa fa-eye"></i></a></span>
          <span style="padding-right:5px"><a href="/email-user/{{$id = $user->id}}"><i class="fa fa-envelope"></i></a></span>
    
        <span><a href="/review-user/{{$id = $user->id}}"><i class="fa fa-pen"></i></a></span>
        @if ($user->restricted == "yes")
        <span style="margin-left:10px; color:grey !important"><a href="/restrict-user/{{$id = $user->id}}"><i class="fa fa-cancel" style="color:grey"></i></a></span>
        @else
        <span style="margin-left:5px; color:rgba(255, 0, 0, 0.329)"><a href="/restrict-user/{{$id = $user->id}}"><i class="fa fa-cancel"></i></a></span>
        @endif
   
       
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