

  <div id="my-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Create new user</h2>
      </div>
<form action="/new-user" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal-body">
<div class="center" style="text-align: center">
    <div class="text_field">
        <input type="text" required name="name">
        <label for="">Full name</label>
        
    </div>
    <div class="text_field">
        <input type="email" required name="email">
        <label for="">Email</label>
        
    </div>

    <div class="text_field">
        <select name="usertype" id="">
            <option value="0">Client user</option>
            <option value="1">Admin user</option>
            <option value="2">New Teller</option>
        </select>
    </div>

    <div class="text_field">
        <input type="text" required name="address">
        <label for="">Address</label>
        
    </div>

    <div class="text_field">
        <input type="number" required name="phone">
        <label for="">Tel number</label>
        
    </div>

    <div class="text_field">
        <input type="password" required name="password">
        <label for="">User password</label>
        
    </div>

   
    <div class="bottom">
        <button type="submit" class="action">CREATE</button>
    </div></div> 

  </div>
</form>
      <div class="modal-footer">
        <h3>Modal Footer</h3>
      </div>
    </div>

  </div>