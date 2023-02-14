<x-layout>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loan-calculator.css') }}">
    <main>
        <div class="box">
         
            <div class="row">
                <span><i class="fa fa-dollar icon"></i><span class="desc">Loan amount</span></span>
                <input type="number" placeholder="Amount in XAF" id="interest_rate" value=''>
            </div>
            <div class="row">
                <span><i class="fa fa-percentage icon"></i><span class="desc">Interest rate</span></span>
                <input type="text" placeholder="Interest" id="amount" value=''>
            </div>
            <div class="row">
                <span><i class="fa fa-clock icon"></i><span class="desc">Number of years</span></span>
                <input type="text" placeholder="? months" id="months" value=''>
            </div>

            <button class="send" type="submit" id="calculate" onClick="computeResults()">
                Calculate
            </button>
          
        </div>
        {{-- Results  --}}
        <div class="line">
            <div class="cube">
                <p id="paymentresult">$</p>
                <p >Monthly payment</p>
            </div>
            <div class="cube1">
                <p id="interestresult">%</p>
                <p >Total interest</p>
            </div>
            <div class="cube2">
                <p id="totalresult">XAF</p>
                <p >Total amount</p>
            </div>
        </div>
    </main>
    
      </div>
      <script src="{{ asset('invoice_2.0\View\js\loan-calculator.js') }}"></script>
      
</x-layout>