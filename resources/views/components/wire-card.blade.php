<div class="loan-box" {{$attributes->merge(['id' => 'jake'])}}>
    <div class="laon-title">
      <span><i class="fa fa-dollar"></i>Wire transfer</span>
    </div>
   <div class="loan-content">
  
    <div class="loan-desc">
      <span class="title">Transaction id</span>
      <span>RIB 45404 ---</span>
    </div>

    <div class="loan-desc">
      <span class="title">Amount(XAF)</span>
      <span>---</span>
    </div>

    <div class="loan-desc">
      <span class="title">Date </span>
      <span>----</span>
    </div>

    <div class="loan-desc">
      <span class="title">Beneficiary</span>
      <span>---</span>
    </div>

    <div class="loan-desc">
      <span class="title">account number</span>
      <span>-----</span>
    </div>

    <div class="loan-desc">
      <span class="title-green">Bank name</span>
      <span>4568705967</span>
    </div>

    <div class="loan-desc">
      <span class="title-red">status</span>
      <span>#445434</span>
    </div>


   </div>
   {{-- @if ($loan->status == 'pending')
       <x-loan-actions :loan="$loan"/>
   @endif --}}
   @if ($transfer->status== 'unverified')
       <x-transfer_actions :transfer="$transfer"/>
   @endif
  </div>
