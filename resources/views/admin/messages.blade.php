<x-admin-layout>
    <x-flash-message/>
      <p class="accounts" >All messages</p>
      <hr size='7' class="main-line">
      <br>
      <x-message-filter>
      </x-message-filter>
      <div class="account-table">
          <table class="table">
            <thead>
              <tr>
                <th> id</th>
                <th>Content</th>
                <th>receiver</th>
                <th>Date</th>
                <th>reply</th>
                <th>status </th>
                <th class="show">Action</th>
            
  
                {{-- <th  class="show">Action</th> --}}
               
             
              </tr>
            </thead>
            <tbody>
             
              @foreach ($messages as $message)            
                    <tr>
                      <td data-label = "S.no">{{$message->id}}</td>
                      <td data-label = "Name">{{$message->content}}</td>
                      <td data-label = "Age">{{$message->receiver}}</td>
                      <td class="show">{{$message->created_at}}</td>
                      <td class="show">{{$message->reply}}</td>
                     @if ($message->status == "unanswered")
                     <td  class="show "><span class="pending">{{$message->status}}</span></td>
                     @else
                     <td  class="show c"><span class="complete">{{$message->status}}</span></td>
                         
                     @endif
                      <td  class="show">
                        {{-- <span class="i fa fa-eye"></span> --}}
                        <a href="/reply-message/{{$id = $message->id}}"><span class="i fa fa-reply"></span></a>
                       <a href="/delete_message/{{$id = $message->id}}"> <span class="i fa fa-trash" type="button" style="margin-left:4px;"></span></a>
                      </td>
                    </tr>
              @endforeach
  
  
       
      </tbody>
    </table>
        </div>
  </x-admin-layout>