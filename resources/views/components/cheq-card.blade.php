<div class="loan-box" {{$attributes->merge(['id' => 'jake'])}}>
    <div class="laon-title">
      <span><i class="fa fa-suitcase"></i>Credit immobilier</span>
    </div>
   <div class="loan-content">
  
    <div class="loan-desc">
      <span class="title">Checkbook id</span>
      <span>CHQC W 45404{{$cheque->id}}</span>
    </div>

    <div class="loan-desc">
      <span class="title">Date</span>
      <span>{{$cheque->date}}</span>
    </div>

    <div class="loan-desc">
      <span class="title">Number of leaves</span>
      <span>{{$cheque->pages}}</span>
    </div>

    <div class="loan-desc">
      <span class="title">Method of collection</span>
      <span>{{$cheque->collection}}</span>
    </div>

    <div class="loan-desc">
      <span class="title">Address line one</span>
      <span>{{$cheque->address1}}</span>
    </div>

    <div class="loan-desc">
      <span class="title-green">Adrress line two</span>
      <span>{{$cheque->address2}}</span>
    </div>

    <div class="loan-desc">
      <span class="title-red">Account number </span>
      <span>{{$cheque->account_number}}</span>
    </div>

    <div class="actionbelow" style=";float:right;">
      <span><a href="/delete-cheque/{{$id = $cheque->id}}"  style="color:#fff;background-color:rgba(255, 0, 0, 0.452);border-radius:4px;padding:6px;">Cancel</a></span>
     </div>
   </div>
  
  </div>
