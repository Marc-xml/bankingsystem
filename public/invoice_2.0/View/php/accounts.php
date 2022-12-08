<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Accounts</title>
    <link rel="stylesheet" href="..\..\View\css\accounts.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\all.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.min.css">
    <link rel="stylesheet" href="..\..\View\assets\swiper.css">

</head>
<body>
<div class="loader_bg">
    <div class="loader"></div>
</div>
    <div class="header">
    <span class="logo">INVOICE</span>
        <div class="icons">
        <span><i class="fa fa-gear  "></i></span>
        <span><i class="fa fa-bell"></i></span>
        <span><i class="fa fa-globe"></i></span>
        </div>
    </div>
   
    <input type="checkbox" name="" id="open">
    <label for="open" class="sidebarIcon">
        <div class="wrapper first"></div>
        <div class="wrapper second"></div>
        <div class="wrapper third"></div>
    </label>
    <!-- mobile screen sidebar  -->
    <div id="sidebarMenu">
        <ul class="menu">
        <li><a href="accounts.php"> <i class="fa fa-user-circle side-icon"></i>Accounts</a></li>
        <hr class="line">
        <li><a href="transfer.php"><i class="fa fa-exchange side-icon"></i>Transactions</a></li>
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
    </div>
    <!-- desktop screen sidebar  -->
    <nav>
        <ul>
        <li>
                <a href="accounts.php"><i class="fa fa-user-circle fac"></i></a>
                <span class="nav-item"></span>
            </li>

            <li>
                <a href="transfer.php"><i class="fa fa-exchange fac"></i></a>
                <span class="nav-item"></span>
            </li>

            <li>
                <a href="card.php"><i class="fa fa-credit-card fac"></i></a>
                <span class="nav-item"></span>
            </li>

            <li>
                <a href="loans.php"><i class="fa fa-dollar fac"></i></a>
                <span class="nav-item"></span>
            </li>

            <li>
                <a href="E_statement.php"><i class="fa fa-file fac"></i></a>
                <span class="nav-item"></span>
            </li>

            <li>
                <a href="wire_transfer.php"><i class="fa fa-tasks fac"></i></a>
                <span class="nav-item"></span>
            </li>
        </ul>
    </nav>
    <div class="main">
        <p class="accounts" >My Accounts</p>
        <hr size='7' class="main-line">
        <p class="opt">Select an account to see more</p>
        <!-- accoutn section for dekstop start -->
        <div class="account-container">
        <div class="account-card-dekstop swiper-slide"  >
                 <!-- uper section of card start  -->
                 <div class="upper-card">
    
                 <span>
                    <i class="fa fa-suitcase suit-card"></i>
                 </span>
                  <div class="inner-upper-card">
                  <span>
                    <span class="alias">Alias2</span> <span class="type">Current</span>
                  </span>
                  <span class=" acc-no">0008 01001 01073600601 09</span>
                  <span class="agency">PRINCIPAL AGENCY</span>
                  </div>
                  <span class="ellipsis"  ><i class="fa fa-ellipsis" id="toggle" type="button"></i></span>
                 </div>
                 <hr class="card-line">
                 <!-- uper section of card end  -->
                 <!-- lower section of card start  -->
                 <div class="lower-card">
                        <div class="lower-card-div">
                            <span class="test"> <span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                      
                        </div>
    
                        <div class="lower-card-div">
                        <span class="test"> <span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
    
                        <div class="lower-card-div">
                            <span>OVERDRAFT</span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
                 </div>
                 <!-- lower section of card end  -->
                 <!-- modal start  -->
                 <div class="options" id="show">
                  <span class="option-content"><i class="fa fa-clipboard"></i>Personalise  account Alias</span>
                  <span class="option-content"><i class="fa fa-gauge"></i>Manage my gauge</span>
                 </div>
                </div>

                <div class="account-card-dekstop swiper-slide">
                 <!-- uper section of card start  -->
                 <div class="upper-card">
    
                 <span>
                    <i class="fa fa-suitcase suit-card"></i>
                 </span>
                  <div class="inner-upper-card">
                  <span>
                    <span class="alias">Alias1</span> <span class="type">Current</span>
                  </span>
                  <span class=" acc-no">0008 01001 01073600601 09</span>
                  <span class="agency">PRINCIPAL AGENCY</span>
                  </div>
                  <span class="ellipsis"><i class="fa fa-ellipsis"></i></span>
                 </div>
                 <hr class="card-line">
                 <!-- uper section of card end  -->
                 <!-- lower section of card start  -->
                 <div class="lower-card">
                        <div class="lower-card-div">
                            <span class="test"> <span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                      
                        </div>
    
                        <div class="lower-card-div">
                        <span class="test"><span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
    
                        <div class="lower-card-div">
                            <span>OVERDRAFT</span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
                 </div>
                 <!-- lower section of card end  -->
                </div>

                <div class="account-card-dekstop swiper-slide">
                 <!-- uper section of card start  -->
                 <div class="upper-card">
    
                 <span>
                    <i class="fa fa-suitcase suit-card"></i>
                 </span>
                  <div class="inner-upper-card">
                  <span>
                    <span class="alias">Alias1</span> <span class="type">Current</span>
                  </span>
                  <span class=" acc-no">0008 01001 01073600601 09</span>
                  <span class="agency">PRINCIPAL AGENCY</span>
                  </div>
                  <span class="ellipsis"><i class="fa fa-ellipsis"></i></span>
                 </div>
                 <hr class="card-line">
                 <!-- uper section of card end  -->
                 <!-- lower section of card start  -->
                 <div class="lower-card">
                        <div class="lower-card-div">
                            <span class="test"><span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                      
                        </div>
    
                        <div class="lower-card-div">
                        <span class="test"><span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
    
                        <div class="lower-card-div">
                            <span>OVERDRAFT</span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
                 </div>
                 <!-- lower section of card end  -->
                </div>
        </div>
        <!-- accoutn section for dekstop end -->

     <div class="account-slider swiper">
            <div class="account-content">
                <div class="account-wrapper swiper-wrapper ">
                
                <div class="account-card swiper-slide">
                 <!-- uper section of card start  -->
                 <div class="upper-card">
    
                 <span>
                    <i class="fa fa-suitcase suit-card"></i>
                 </span>
                  <div class="inner-upper-card">
                  <span>
                    <span class="alias">Alias1</span> <span class="type">Current</span> 
                  </span>
                  <span class=" acc-no">0008 01001 01073600601 09</span>
                  <span class="agency">PRINCIPAL AGENCY</span>
                  </div>
                  <span class="ellipsis"><i class="fa fa-ellipsis" id="toggle1"></i></span>
                 </div>
                 <hr class="card-line">
                 <!-- uper section of card end  -->
                 <!-- lower section of card start  -->
                 <div class="lower-card">
                        <div class="lower-card-div">
                            <span class="test"> <span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                      
                        </div>
    
                        <div class="lower-card-div">
                        <span class="test"> <span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
    
                        <div class="lower-card-div">
                            <span>OVERDRAFT</span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
                 </div>
                 <!-- lower section of card end  -->
                 <div class="options" >
                  <span class="option-content"><i class="fa fa-clipboard"></i>Personalise  account Alias</span>
                  <span class="option-content"><i class="fa fa-gauge"></i>Manage my gauge</span>
                 </div>
                </div>
       


                <div class="account-card swiper-slide">
                 <!-- uper section of card start  -->
                 <div class="upper-card">
    
                 <span>
                    <i class="fa fa-suitcase suit-card"></i>
                 </span>
                  <div class="inner-upper-card">
                  <span>
                    <span class="alias">Alias1</span> <span class="type">Current</span>
                  </span>
                  <span class=" acc-no">0008 01001 01073600601 09</span>
                  <span class="agency">PRINCIPAL AGENCY</span>
                  </div>
                  <span class="ellipsis"><i class="fa fa-ellipsis"></i></span>
                 </div>
                 <hr class="card-line">
                 <!-- uper section of card end  -->
                 <!-- lower section of card start  -->
                 <div class="lower-card">
                        <div class="lower-card-div">
                            <span class="test"> <span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                      
                        </div>
    
                        <div class="lower-card-div">
                        <span class="test"> <span> BALANCE</span></span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
    
                        <div class="lower-card-div">
                            <span>OVERDRAFT</span>
                            <span class="bolder-lower-card-div">92780 XAF</span>
                        </div>
                 </div>
                 <!-- lower section of card end  -->
                </div>
                <!-- account wrapper end  -->
        </div>
                </div>
       <div class="swiper-button-next " style="font-size:8px;"></div>
      <div class="swiper-button-prev direction"></div>
      <div class="swiper-pagination direction"></div>
       <!-- account slider end  -->
    </div>
    <p class="accounts"> Income and expenses</p>
    <hr class="main-line">
    <!-- graph start  -->
    <div class="graph-container">
<div class="first-graph">
<canvas id="myChart" ></canvas>

</div>
<div class="second-graph">
  <canvas id="myChart1"></canvas>
</div>
    </div>
   
      <p class="accounts">Operations record</p>
      <hr class="main-line">
      <!-- tabel container start  -->
      <div class="table-container">
        <!-- filter section start  -->
      <div class="table-filter">
         
        <div class="filter-content">
          <span><i class="fa fa-search"></i>Search</span>
          <input type="text" class="filter-box" placeholder="search">
       
       
        </div>
       

        <div class="filter-content filter-off">
          <span><i class="fa fa-calendar"></i>By Date</span>
          <input type="date" class="filter-box" placeholder="search">
        </div>

        <div class="filter-content filter-off">
          <span><i class="fa fa-dollar"></i>By amount</span>
          <input type="text" class="filter-box" placeholder="min">
        </div>
        <div class="filter-content filter-off" style="margin-top:20px;">
        <input type="text" class="filter-box" placeholder="max">
        </div>

          <div class="filter-result">
          <button class="filter-button">Search</button>
          <span><a href="">Reset</a></span>
         
          </div>
        
      </div>
        <!-- filter section end -->

        <!-- real table section start -->
        <div class="account-table">
    <table class="table">
      <thead>
        <tr>
          <th>S.no</th>
          <th>Name</th>
          <th>Age</th>
          <th>Country</th>
          <th>tel</th>
          <th class="move">Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country">cameroon</td>
          <td data-label = "tel">674159544</td>
          <td data-label = "Email" class="move">jeanpoutcheu@gmail.com</td>
        
        </tr>
        <tr>
        <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country">cameroon</td>
          <td data-label = "tel">674159544</td>
          <td data-label = "Email" class="move">jeanpoutcheu@gmail.com</td>
        </tr>
        <tr>
        <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country">cameroon</td>
          <td data-label = "tel">674159544</td>
          <td data-label = "Email" class="move">jeanpoutcheu@gmail.com</td>
        </tr>
      </tbody>
    </table>
        </div>
        <!-- real table section end -->

          <!-- message icon  -->
     
  <span class="message-trigger"><i class="fa fa-message"></i></span>

<div class="message-box">
 <div class="message-actions">
         <span><i class="fa fa-trash"></i></span>
         <span class="move-box">Cancel</span>
 </div>
<div class="message">i am so sorry about what  happened</div>
<div class="message-1">o tell me what happened</div>
<div class="message">Your android cable is bad</div>
<div class="message-1">My charger is bad?</div>
<hr>
<div class="below">

<span class="message-icon"><i class="fa fa-message"></i></span>
 <input type="text" class="message-input">
 <span><i class="fa fa-paper-plane"></i></span>
</div>
</div>
      </div>
      <!-- tabel container end  -->
    <!-- main end  -->
 
 <!-- graph section  -->
    <script src="..\..\View\assets\swiper.js"></script>
    <script src="..\..\View\assets\script.js"></script>
    <script src="..\..\View\assets\jquery\jquery-3.6.0.min.js"></script>
    <script src="..\..\View\js\account.js"></script>
    <script src="..\..\View\assets\package\dist\chart.js"></script>
    <script src="..\..\View\assets\package\dist\chart.min.js"></script>
    <script >
      setTimeout(function(){
    $('.loader_bg').fadeToggle();
}, 1500);
    </script>


</body>
</html>