
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
   

    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\all.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\bills.css') }}">

</head>
<body>
    
    <div class="header">
      <span class="logo">INVOICE</span>
          <div class="icons">
           <span>{{Auth::user()->name}}</span>
          <span><a href="{{url('/profile')}}"><i class="fa fa-user {{ '/profile' == request()->path() ? 'active' : ''}}"></i></a></span>
          <span><i class="fa fa-bell"></i></span>
          <span><i class="fa fa-globe"></i></span>
          <span><a href="/logout">Logout</a></span>
          </div>
      </div>
     
      <input type="checkbox" name="" id="open">
      <label for="open" class="sidebarIcon">
          <div class="wrapper first"></div>
          <div class="wrapper second"></div>
          <div class="wrapper third"></div>
      </label>

      <!-- mobile screen sidebar  -->
      {{-- <div id="sidebarMenu">
          <ul class="menu">
          <li><a href="accounts.php"> <i class="fa fa-user-circle side-icon"></i>Accounts</a></li>
          <hr class="line">
          <li><a href="transfer.php"><i class="fa fa-exchange side-icon" id="side-icon"></i>Transactions</a></li>
          <hr class="line">
          <li><a href="card.php"><i class="fa fa-credit-card side-icon"></i>cards</a></li>
          <hr class="line">
          <li><a href="loans.php"><i class="fa fa-dollar side-icon"></i>Loans</a></li>
          <hr class="line">
          <li><a href="E_statement.php"><i class="fa fa-file side-icon"></i>E-statement</a></li>
          <hr class="line">
          <li><a href=""><i class="fa fa-person side-icon"></i>Other services</a></li>
          <hr class="line">
          </ul>
          <div class="info-sidebar">
              <span>Invoice 2023</span>
              <span><i class="fa fa-user side-icon"></i></span>
          </div>
      </div> --}}
      <!-- desktop screen sidebar  -->
      <nav>
          <ul>
              
          <li>
                  <a href="/"><i class="fa fa-user-circle fac {{ '/' == request()->path() ? 'active' : ''}}"></i>
                  <span class="nav-item"></span>
                </a>
              </li>
  
              <li>
                  <a href="/transactions"><i class="fa fa-exchange fac{{ 'transactions' == request()->path() ? 'active' : ''}}"></i>
                  <span class="nav-item"></span>
                </a>
              </li>
  
              <li>
                  <a href="/check"><i class="fa fa-book fac {{'check' == request()->path() ? 'active' : ''}}"></i></a>
                  <span class="nav-item"></span>
              </li>
  
              <li class="{{'loans' == request()->path() ? 'active' : ''}}">
                  <a href="/loans"><i class="fa fa-dollar fac {{'/loans' == request()->path() ? 'active' : ''}}"></i></a>
                  <span class="nav-item"></span>
              </li>
  
              <li>
                  <a href="/statement"><i class="fa fa-file fac {{'statement' == request()->path() ? 'active' : ''}}"></i></a>
                  <span class="nav-item"></span>
              </li>
  
              <li>
                  <a href="/wire"><i class="fa fa-tasks fac {{'wire' == request()->path() ? 'active' : ''}}"></i></a>
                  <span class="nav-item"></span>
              </li>
          </ul>
      </nav>
  
      <div class="main">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loan-calculator.css') }}">
    <main>
        <div class="box">
         
            <div class="row">
                <span><i class="fa fa-dollar icon"></i><span class="desc">Loan amount</span></span>
                <input type="number" placeholder="Amount in XAF" id="interest" value=''>
            </div>
            <div class="row">
                <span><i class="fa fa-percentage icon"></i><span class="desc">Interest rate</span></span>
                <input type="text" placeholder="Interest" id="amount" value=''>
            </div>
            <div class="row">
                <span><i class="fa fa-clock icon"></i><span class="desc">Number of years</span></span>
                <input type="text" placeholder="? months" id="years" value=''>
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
    <x-message>
    </x-message>
      </div>
      <script src="{{ asset('invoice_2.0\View\js\loan-calculator.js') }}"></script>
      
      {{-- <script >
        setTimeout(function(){
      $('.loader_bg').fadeToggle();
     }, 1500);8
      </script> --}}
    </body>
    </html>