
<x-layout>
  <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
  <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
    <p class="account">My loans</p>
    <hr class="main-line">

    <div class="loan-actions">
      
       <button class="loan-button" id="modal-btn">Apply for a loan <span><i class="fa fa-plus"></i></span></button>
      <a href="/loan-calculator"><button class="loan-button">Loan simulator <span><i class="fa fa-dollar"></i></span></button></a>
  </div>
  <x-flash-message />
{{"Result:".count($loans)}}


      <div class="laon-container">
        {{-- @unless(count($loans) == 1)
        {{"YOu currently have no ongoing laons"}}
        @endunless --}}
        @unless (count(session()->get('complete')) != 0)
        <div class="no-item">NO  UNGRANTED LOAN FOUND</div>
        @endunless

        @foreach ($loans as $loan)
        @if ($loan->status == 'complete')
        <x-loan-card :loan="$loan" />
       
            
        @endif
       
        @endforeach

       
      </div>
      <br>
      <p class="account">pending loans</p>
      <hr class="main-line">
      @foreach ($loans as $loan)
          @if ($loan->status == 'pending')
         
          <x-loan-card :loan="$loan" id="pending" />
          
          @endif
      @endforeach

@unless (count(session()->get('pending')) != 0)
<div class="no-item">NO UNVERIFIED LOANS</div>
@endunless
      
        <x-newloan />
        <p class="account">Loan history</p>
        <hr class="main-line">
      {{-- <div class="filter">
        <x-loan-filter :owner="$loan"/>
      </div> --}}
        <!-- real table section start -->
        <div class="account-table" style="">
          <table class="table" >
            <thead>
              <tr>
                <th>Loan id</th>
                <th>Amount(XAF)</th>
                <th>Date granted</th>
                <th class="show">Date limit</th>
                <th class="show">monthly payement(XAF)</th>
                <th class="show">Loan type</th>
                {{-- <th class="show">Date completed</th> --}}
                <th>Status</th>
             
              </tr>
            </thead>
            <tbody>
              @unless(Count($loans) !== 1)
              {{"no Transaction record available"}}
             
              @endunless
       @foreach ($loans as $loan)
      
    
       <tr>
        <td data-label = "S.no">{{$loan->id}}</td>
        <td data-label = "Name">{{$loan->amount}}</td>
        <td data-label = "Age">{{$loan->loan_granted_at}}</td>
        <td class="show">{{$loan->date_limit}}</td>

        <td class="show">{{$loan->monthly_payement}}</td>
        <td class="show">SRT</td> 
     {{-- @if ($loan->status == "denied")
     <td data-label = "Country">--- --- ---</td>
     @else
     <td data-label = "Country">23-45-554</td>
     @endif  --}}
        @if ($loan->status == "denied")
        <td data-label = "tel" style="color:red   "><span style="margin-right:5px;"><i class="fa fa-warning x-cancel"></i></span>{{$loan->status}}</td>
        @elseif($loan->status == "pending")
        <td data-label = "tel" style="color:grey">{{$loan->status}}</td>

        @else
        <td data-label = "tel" style="color:green">{{$loan->status}}</td>
        @endif
      
      
      
      </tr>
      @endforeach

       
      </tbody>
    </table>
        </div>
  </x-layout>
