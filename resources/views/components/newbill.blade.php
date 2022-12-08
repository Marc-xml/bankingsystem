

  <div id="my-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>NEW BILL SCHEDULE</h2>
      </div>
<form action="/bill-sched" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal-body">
    <div class="row">
    <div class="text_field" >
      <input type="text" required name="company_names">
      <label for="">Operator name</label>
      
  </div>
  <div class="text_field">
      <input type="text" required name="company_ids">
      <label for="">operator CNI</label>
      
  </div>
</div>
 <div class="row">
  <div class="text_field">
    <input type="text" required name="addresss">
    <label for="">Address</label>
    
</div>
<div class="text_field">
  <input type="number" required name="amounts">
  <label for="">Amount</label>
  
</div>
 </div>

 <div class="row">
  <div class="text_field">
    <input type="text" required name="company_accounts">
    <label for="">Company account number </label>
        
    
    
</div>
<div class="text_field">
  <input type="text" required name="account_sendings">
  <label for="">Acount making payements</label>
  
</div>
 </div>





<div class="row">
<div class="text_field">
   
<select name="sched" id="">
    <label for="">Every</label>
<option value="month">month</option>
<option value="day">day</option>
<option value="week">week</option>
</select>

</div>

</div>
<div class="bottom">
<span><input type="checkbox" style="margin:auto 5px">By clicking you agree to all our terms and conditions</span>
</div>
<div class="bottom" style="">
<input type="submit" value="CREATE" class="loan-button" style="width:5rem;">
<span style="margin-top:20px;">reset</span>
</div>
<div class="bottom">
</div>

  </div>
</form>
      <div class="modal-footer">
        <h3>Modal Footer</h3>
      </div>
    </div>

  </div>