<x-layout>
  <link rel="stylesheet" href="{{asset("invoice_2.0\View\css\E_statement.css")}}">

    <h5>INVOICE <span><i class="fa fa-feather"></i></span></h5>
    <div class="main">
        <p class="top-stat">STATEMENT OF ACCOUNT</p>
        <x-current-account />
<!-- account details  -->
        <p class="account-details"> 
     {{-- {{$final_date}} --}}
   <P style="margin:5px 0">ACCOUNT NUMBER:<span style="color:#2D89EF"> RIB 6986 52{{session()->get('acc')}}</span></P>
    <P style="margin:5px 0">PRESENT DATE: {{Date('d/m/y')}}</P>
    <P style="margin:5px 0">MONTH COVERED: <form action="/statement/month" method="GET">
@isset($date)
    Result for:{{$date}}th month
@endisset
      <select name="month" id="" required style="background:#2d87ef25;
      outline:none;
      margin:20px 0px;
      border:none;
      padding:7px;
      border-radius:5px;
      max-width:7rem;">
        <option value="01">January</option>  
        <option value="02">ferbruary</option>  
        <option value="03">March</option>  
        <option value="04">April</option>  
        <option value="05">May</option>  
        <option value="06">June</option>  
        <option value="07">July</option>  
        <option value="08">August</option>  
        <option value="09">September</option>  
        <option value="10">October</option>  
        <option value="11">November</option>  
        <option value="12">December</option> 
      </select>
    <input type="submit" value="submit" style=" padding:2px;
    border:none;
    background: #2D89EF;
    color:#fff;
    padding:9px;
    /* height:3rem; */
    border-radius: 5px;
    width:5rem;">
    </form></P>
   
  <div style="text-align:center;margin-bottom:10px;font-weight:600">    CHOOSE PARTICULAR DAY:(@isset($date,$month,$year)
      Result for:{{$date}}-{{$month}}-{{$year}}
  @endisset)</div>
    <x-statement_filter />

    <br><div style="text-align:center;margin-bottom:10px;font-weight:600">SELECT PERIOD:(@isset($from,$to,$year)
        Result From:{{$from}}th month To{{$to}}th month in the year{{$year}}
    @endisset)</div>
    <div class="table-filter">
         
      {{-- <form action="/account/{{$id=$accounts->id}}" method="GET"> --}}
      <form action="/statement/range" method="GET">
        <div class="filter-content" style="z-index:40;">
          <span><i class="fa fa-calendar"></i>From</span>
          <select name="from" id="" required style="background:#2d87ef25;
          outline:none;
          border:none;
          padding:7px;
          border-radius:5px;
          max-width:7rem;">
            <option value="01">January</option>  
            <option value="02">ferbruary</option>  
            <option value="03">March</option>  
            <option value="04">April</option>  
            <option value="05">May</option>  
            <option value="06">June</option>  
            <option value="07">July</option>  
            <option value="08">August</option>  
            <option value="09">September</option>  
            <option value="10">October</option>  
            <option value="11">November</option>  
            <option value="12">December</option> 
          </select>
       
       
        </div>
       
    
        <div class="filter-content filter-off">
          <span><i class="fa fa-calendar"></i>To</span>
          <select name="to" required id="" style="background:#2d87ef25;
          outline:none;
          border:none;
          padding:7px;
          border-radius:5px;
          max-width:7rem;">
            <option value="01">January</option>  
            <option value="02">ferbruary</option>  
            <option value="03">March</option>  
            <option value="04">April</option>  
            <option value="05">May</option>  
            <option value="06">June</option>  
            <option value="07">July</option>  
            <option value="08">August</option>  
            <option value="09">September</option>  
            <option value="10">October</option>  
            <option value="11">November</option>  
            <option value="12">December</option> 
          </select>
        </div>
    
        <div class="filter-content filter-off">
          <span>Year</span>
          <input type="number" class="filter-box" reuired placeholder="Enter year" name="year">
        </div>
        
        
    
          <div class="filter-result">
          <button class="filter-button">Retrive</button>
          <span type="reset" style="margin:10px;"><a href="/">Reset</a></span>
         
          </div>
      </form>
      
    </div>

   
    </P>
        </p>

        <!-- client info  -->
        <div class="client-info">
            <p style="margin:5px 0">{{auth()->user()->name}}</p>
            <p style="margin:5px 0">Douala  {{auth()->user()->address}}</p>
            <p style="margin:5px 0">{{auth()->user()->email}}</p>
        </div>

        <p class="top-head">ACCOUNT SUMMARY</p>

        <!-- account summary  -->
        <div class="account-summary">
            <p style="margin:5px 0">Total debits: {{$debit}}XAF</p>
            <p style="margin:5px 0">Total Credits: {{$credit}}XAF</p>
            {{-- <p>other subscriptions:XXX</p> --}}
            {{-- <p>checks:XXX</p> --}}
            {{-- <p>service fees:XXXX</p> --}}
            <p style="margin:5px 0">Total spent: {{$total}}XAF</p>
            <p style="margin:5px 0">Number of transactions: {{Count($transactions)}}</p>

        </div>

        <!-- transaction summary -->
        <p class="top-head">TRANSACTIONS</p>
        <table class="table">
   <tr>
          <th>Transaction id</th>
          <th>Description</th>
          <th>Amount</th>
          <th>Date</th>
          <th>Type</th>
        </tr>
      </thead>
      <tbody>
     @foreach ($transactions as $transaction)
     <tr>
      <td data-label = "S.no">{{$transaction->id}}</td>
      <td data-label = "Name">{{$transaction->description}}</td>
      <td data-label = "Age">{{$transaction->amount}}</td>
      <td data-label = "Country" >{{$transaction->created_at}}</td>
      @if ($transaction->sender_account == session()->get('acc'))
      <td data-label = "tel" class="move">Debit</td>
      @else
      <td data-label = "tel" class="move">Credit</td>
      @endif
      

    
    </tr>
     @endforeach
     @unless (Count($transactions) !== 0)
     <div class="no-item">NO TRANSACTION FOUND</div>
         
     @endunless
      </tbody>
   
    </table>
    </div>
</x-layout>