

  <div id="my-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Transfer funds</h2>
      </div>
<form action="/new-transfer" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal-body">
<div class="center" style="text-align: center">
    <div class="text_field">
        <input type="text" required name="receiver">
        <label for="">Receiver account</label>
        
    </div>

    <div class="text_field">
        <input type="text" required name="amount">
        <label for="">Amount</label>
        
    </div>

   
    <div class="bottom">
        <button type="submit" class="action">Transfer</button>
    </div></div> 

  </div>
</form>
      <div class="modal-footer">
        <h3>Modal Footer</h3>
      </div>
    </div>

  </div>