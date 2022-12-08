<x-layout>
 
  <link rel="stylesheet" href="invoice_2.0\View\css\accounts.css">
  <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
 <link rel="stylesheet" href="invoice_2.0\View\css\wire_transfer.css">


  <div class="bill-info">
    <p class="bold-info">Inter-bank transfer with invoice</p>
    <x-flash-message />
   @php
       $account = session()->get('acc');
   @endphp
   {{$account}}
    <p class="grey-name">Send money to a customer of another bank in just few steps</p>
  </div>
<div>
 
</div>
  <!-- box below section  -->
  <div class="center">

    <form method="POST" action="/wire-transfer">
      @csrf
        <div class="text_field">
            <input type="text" required name="beneficiary">
            <label for="">Beneficiary name</label>
            
        </div>
        <div class="text_field">
            <input type="text" required name="account_number">
            <label for="">Account number or IBAN</label>
            
        </div>
        <div class="text_field">
            <input type="text" required name="bic_code">
            <label for="">BIC or SWIFT code</label>
            
        </div>
        <div class="text_field">
            <input type="text" required name="clearing_code">
            <label for="">National clearing code</label>
            
        </div>
        <div class="text_field" >
          <input type="text" required name="bank_name">
          <label for="">Bank name</label>
          
      </div>
      <div class="text_field" >
        <input type="text" required name="amount">
        <label for="">Amount</label>
        
    </div>
      <div class="text_field">
        <input type="text" required name="message">
        <label for="">Message to beneficiary(optional)</label>
        
    </div>
     
    <div class="submit_button">
    <input type="submit" value="Confirm">
    </div>
       
    </form>
    
   </div>

   <p class="accounts" >initiated transfers</p>
   <hr size='7' class="main-line">

   <div class="pending">
   
    @foreach ($transfers as $transfer)
    @if ($transfer->status=="unverified")
      <x-wire-card :transfer="$transfer" id="pending"/>
    @else{
      <x-wire-card :transfer="$transfer"/>

    }
    @endif
    @endforeach
    @unless (count($transfers) !== 0)
    {{"NO trasnsaction initiated yet"}}
@endunless
<p class="accounts" >Pending transfers</p>
   <hr size='7' class="main-line">
   </div>
   {{-- <p class="history">History</p> --}}

         <!-- tabel container start  -->
         <div class="table-container">
        <!-- filter section start  -->
          {{-- <x-filter-transfer :transfer="$transfer" /> --}}
        <!-- filter section end -->

        <!-- real table section start -->
        <div class="account-table">
    <table class="table">
      <thead>
        <tr>
          <th>Transaction id</th>
          <th>Beneficiary</th>
          <th>Account number</th>
          <th>Bank name</th>
          <th>BIC code</th>
          <th>Clearing code</th>
          <th>Amount</th>
          <th>status</th>
          <th>crediting account</th>
        </tr>
      </thead>
      <tbody>
        <tr>
         @foreach ($transfers as $transfer)
             <td>{{$transfer->id}}</td>
             <td>{{$transfer->Beneficiary}}</td>
             <td>{{$transfer->account_number}}</td>
             <td>{{$transfer->bank_name}}</td>
             <td>{{$transfer->bic_code}}</td>
             <td>{{$transfer->clearing_code}}</td>
             <td>{{$transfer->amount}}</td>
             <td>{{$transfer->account_concerned}}</td>
         @endforeach
         @unless (count($transfers) !== 0)
             {{"No recent transfers"}}
         @endunless
        
        </tr>
    
      </tbody>
    </table>
        </div>
        <!-- real table section end -->
      </div>
<x-message>
</x-message>
</x-layout>
