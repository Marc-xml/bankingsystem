

  <div id="my-modal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>LOAN REQUEST FORM</h2>
      </div>
<form action="/add-loan" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal-body">
    <div class="row">
    <div class="text_field" >
      <input type="text" required name="name">
      <label for="">Full name</label>
      
  </div>
  <div class="text_field">
      <input type="text" required name="address">
      <label for="">address</label>
      
  </div>
</div>
 <div class="row">
  <div class="text_field">
    <input type="text" required name="phone" placeholder="Mobile number">
    <label for="">phone number</label>
    
</div>
<div class="text_field">
  <input type="date" required name="dob">
  <label for="">Date of birth</label>
  
</div>
 </div>

 <div class="row">
  <div class="text_field">
    <input type="text" required name="account">
    <label for="">account number </label>
    <span >@error('account'){{"Account does not exist"}}@enderror</span>
        
    
    
</div>
<div class="text_field">
  <input type="file" required name="identity">
  <label for="">proof of identity</label>
  
</div>
 </div>

 <div class="row">
  <div class="text_field">
    <input type="file" required name="income">
    <label for="">Income verification</label>
    
  </div>
  <div class="text_field">
    <input type="file" required name="addressproof">
    <label for="">proof of address</label>
    
  </div>
 </div>

<div class="row">
<div class="text_field">
<input type="text" required name="purpose">
<label for="">Loan purpose</label>

</div>
<div class="text_field">
<input type="number" required name="loan_amount">
<label for="">Loan amount</label>

</div>
</div>

<div class="row">
<div class="text_field">
<input type="text" required name="permonth">
<label for="">Amount per month</label>

</div>
<div class="text_field">
<input type="date" required name="time">
<label for="">date limit</label>

</div>
</div>
<div class="bottom">
<span><input type="checkbox" style="margin:auto 5px">By clicking you agree to all our terms and conditions</span>
</div>
<div class="bottom" style="">
<input type="submit" value="SUBMIT" class="loan-button" style="width:5rem;">
<span style="margin-top:20px;">reset</span>
</div>
<div class="bottom">
<span style="color:#707070;font-size:13px">NB:Make sure every document submited here is authentic and can be verified,violation of these might lead to serious sanctions</span>
</div>

  </div>
</form>
      <div class="modal-footer">
        <h3>Modal Footer</h3>
      </div>
    </div>

  </div>