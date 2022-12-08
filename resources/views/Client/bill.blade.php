<x-layout>
    <link rel="stylesheet" href="invoice_2.0\View\css\bills.css">



  <div class="bill-info">
    <p class="bold-info">Pay your bils with invoice</p>
    <p class="grey-name">Your bills can be payed manually or be payed on schedule</p>
  </div>

  <!-- box below section  -->
  <div class="center">
    <form action="POST">
        <div class="text_field">
            <input type="text" required>
            <label for="">Operator</label>
            
        </div>
        <div class="text_field">
            <input type="password" required>
            <label for="">Operator</label>
            
        </div>
        <div class="text_field">
            <input type="password" required>
            <label for="">Operator</label>
            
        </div>
        <div class="text_field">
            <input type="password" required>
            <label for="">Operator</label>
            
        </div>
     
    <div class="submit_button">
    <input type="submit" value="Confirm">
    </div>
       
    </form>
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
    </x-bill-box>>

    <x-bill-box>
    </x-bill-box>
  </div>
</x-layout>