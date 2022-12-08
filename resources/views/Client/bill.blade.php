<x-layout>    <link rel="stylesheet" href="invoice_2.0\View\css\loans.css">
    <link rel="stylesheet" href="invoice_2.0\View\css\bills.css">




  <div class="bill-info">
    <p class="bold-info">Pay your bils with invoice</p>
    <p class="grey-name">Your bills can be payed manually or be payed on schedule</p>
  </div>
  <button class="addbutton" id="modal-btn">
    New schedule
  </button>
  <!-- box below section  -->
  <div class="center">
    <form action="/add-bill" method="POST">
      @csrf
        <div class="text_field">
            <input type="text" required name="company_name">
            <label for="">Operator name</label>
            
        </div>
        <div class="text_field">
            <input type="text" required name="company_id">
            <label for="">Operator CNI</label>
            
        </div>
        <div class="text_field">
          <input type="text" required name="address">
          <label for="">Address</label>
          
      </div>
        <div class="text_field">
            <input type="number" required name="amount">
            <label for="">Amount</label>
            
        </div>
        <div class="text_field">
            <input type="text" required name="company_account">
            <label for="">Company Account number</label>
            
        </div>
        <div class="text_field">
          <input type="text" required name="account_sending">
          <label for=""> Account making payment</label>
          
      </div>
  
    <div class="submit_button">
    <input type="submit" value="Confirm">
    </div>
       
    </form>
    <x-newbill />
   </div>
   <!-- box below section end  -->
   <div class="bill-info">
    <p class="bold-info">Schedule payements</p>
    <p class="grey-name">Upcoming bills</p>
  </div>


  <div class="upcoming-bills">
    <x-bill-box>
    </x-bill-box>

     <x-bill-box>
    </x-bill-box>

    <x-bill-box>
    </x-bill-box>
  </div>
</x-layout>