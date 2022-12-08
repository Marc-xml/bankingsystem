<div class="loan-box" {{$attributes->merge(['id' => 'jake'])}}>
    <div class="laon-title">
      <span><i class="fa fa-suitcase"></i>Credit immobilier</span>
    </div>
   <div class="loan-content">
  
    <div class="loan-desc">
      <span class="title">Loan id</span>
      <span>RIB 45404 {{$loan->id}}</span>
    </div>

    <div class="loan-desc">
      <span class="title">Amount(XAF)</span>
      <span>{{$loan->amount}}</span>
    </div>

    <div class="loan-desc">
      <span class="title">Date granted</span>
      <span>{{$loan->loan_granted_at}}</span>
    </div>

    <div class="loan-desc">
      <span class="title">Loan Description</span>
      <span>SRT loan</span>
    </div>

    <div class="loan-desc">
      <span class="title">Monthly payment</span>
      <span>{{$loan->monthly_payement}}</span>
    </div>

    <div class="loan-desc">
      <span class="title-green">Amount payed(XAF)</span>
      <span>4568705967</span>
    </div>

    <div class="loan-desc">
      <span class="title-red">Amount left(XAF)</span>
      <span>#445434</span>
    </div>


   </div>
  </div>
