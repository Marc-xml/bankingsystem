<x-admin-layout>
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
              <th>date</th>
              <th>status </th>
              <th class="show">Action</th>
          

              {{-- <th  class="show">Action</th> --}}
             
           
            </tr>
          </thead>
          <tbody>
           
  
     <tr>
      <td data-label = "S.no"></td>
      <td data-label = "Name"></td>
      <td data-label = "Age"></td>
      <td class="show"></td>
      <td  class="show"></td>
      {{-- <td class="show"></td> --}}
      
    
    
    </tr>


     
    </tbody>
  </table>
      </div>
</x-admin-layout>