<x-admin-layout>
  <x-flash-message/>
    <p class="accounts" >All complains</p>
    <hr size='7' class="main-line">
    <br>
    <x-user-filter>
    </x-user-filter>
    <div class="account-table">
        <table class="table">
          <thead>
            <tr>
              <th> id</th>
              <th>complainer</th>
              <th>email</th>
              <th class="show">date</th>
              <th class="show">title </th>
              <th class="show">content </th>
              <th class="show">status </th>
              <th class="show">Action</th>
          

              {{-- <th  class="show">Action</th> --}}
             
           
            </tr>
          </thead>
          <tbody>
           
            @foreach ($complains as $complain)            
                  <tr>
                    <td data-label = "S.no">{{$complain->id}}</td>
                    <td data-label = "Name">{{$complain->complainer}}</td>
                    <td data-label = "Age">{{$complain->email}}</td>
                    <td class="show">{{$complain->date}}</td>
                    <td  class="show">{{$complain->title}}</td>
                    <td  class="show">{{$complain->content}}</td>
                   @if ($complain->status == "unsolved")
                   <td  class="show "><span class="pending">{{$complain->status}}</span></td>
                   @else
                   <td  class="show c"><span class="complete">{{$complain->status}}</span></td>
                       
                   @endif
                    <td  class="show">
                      {{-- <span class="i fa fa-eye"></span> --}}
                      <a href="/complain-detail/{{$id = $complain->id}}"><span class="i fa fa-reply"></span></a>
                     <a href="/delete-complain/{{$id = $complain->id}}"> <span class="i fa fa-trash" type="button" style="margin-left:4px;"></span></a>
                    </td>
                  </tr>
            @endforeach


     
    </tbody>
  </table>
      </div>
</x-admin-layout>