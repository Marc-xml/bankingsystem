<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My cards</title>
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\all.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.min.css">
    <link rel="stylesheet" href="..\..\View\assets\swiper.css">
    <link rel="stylesheet" href="..\..\View\css\card.css">

</head>
<body >
    
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
        <p class="accounts" >My Cards</p>
        <hr size='7' class="main-line">
        <p class="opt">Choose a card to see more</p>
        <!-- accoutn section for dekstop start -->
        <div class="account-container">
                    
        <div class="account-card-dekstop swiper-slide">
                        <div class="card-cover">
                           <p class="card-title">
                            Invoice Bank
                           </p>
                           <span class="card-image"><img src="..\..\View\Images\icons8-chip-card-48.png" alt="" srcset=""></span>
                           <span class="card-number"><span class="card-id">.... .... ....</span> 2541</span>
                            <div class="card-dates"><span>03/18</span> <span class="card-dates-left">03/28</span></div>
                            <div class="credit-card-bottom">
                                <span>Credit card</span>
                                <span class="mastercard"><img src="..\..\View\Images\icons8-maestro-48.png" alt="" srcset=""></span>
                            </div>
                        </div>
                </div>

                <div class="account-card-dekstop swiper-slide">
                        <div class="card-cover-1">
                           <p class="card-title">
                            Invoice Bank
                           </p>
                           <span class="card-image"><img src="..\..\View\Images\icons8-chip-card-48.png" alt="" srcset=""></span>
                           <span class="card-number"><span class="card-id">.... .... ....</span> 2541</span>
                            <div class="card-dates"><span>03/18</span> <span class="card-dates-left">03/28</span></div>
                            <div class="credit-card-bottom">
                                <span>Credit card</span>
                                <span class="mastercard"><img src="..\..\View\Images\icons8-maestro-48.png" alt="" srcset=""></span>
                            </div>
                        </div>
                </div>

                <div class="account-card-dekstop swiper-slide">
                        <div class="card-cover-2">
                           <p class="card-title">
                            Invoice Bank
                           </p>
                           <span class="card-image"><img src="..\..\View\Images\icons8-chip-card-48.png" alt="" srcset=""></span>
                           <span class="card-number"><span class="card-id">.... .... ....</span> 2541</span>
                            <div class="card-dates"><span>03/18</span> <span class="card-dates-left">03/28</span></div>
                            <div class="credit-card-bottom">
                                <span>Credit card</span>
                                <span class="mastercard"><img src="..\..\View\Images\icons8-maestro-48.png" alt="" srcset=""></span>
                            </div>
                        </div>
                </div>
        </div>
        <!-- accoutn section for mobile end -->

     <div class="account-slider swiper">
            <div class="account-content">
                <div class="account-wrapper swiper-wrapper ">
                
                <div class="account-card swiper-slide">
                        <div class="card-cover">
                           <p class="card-title">
                            Invoice Bank
                           </p>
                           <span class="card-image"><img src="..\..\View\Images\icons8-chip-card-48.png" alt="" srcset=""></span>
                           <span class="card-number"><span class="card-id">.... .... ....</span> 2541</span>
                            <div class="card-dates"><span>03/18</span> <span class="card-dates-left">03/28</span></div>
                            <div class="credit-card-bottom">
                                <span>Credit card</span>
                                <span class="mastercard"><img src="..\..\View\Images\icons8-maestro-48.png" alt="" srcset=""></span>
                            </div>
                        </div>
                </div>
       


                <div class="account-card swiper-slide">
                        <div class="card-cover">
                           <p class="card-title">
                            Invoice Bank
                           </p>
                           <span class="card-image"><img src="..\..\View\Images\icons8-chip-card-48.png" alt="" srcset=""></span>
                           <span class="card-number"><span class="card-id">.... .... ....</span> 2541</span>
                            <div class="card-dates"><span>03/18</span> <span class="card-dates-left">03/28</span></div>
                            <div class="credit-card-bottom">
                                <span>Credit card</span>
                                <span class="mastercard"><img src="..\..\View\Images\icons8-maestro-48.png" alt="" srcset=""></span>
                            </div>
                        </div>
                </div>
                <!-- account wrapper end  -->
        </div>
                </div>
       <div class="swiper-button-next " style="font-size:8px;"></div>
      <div class="swiper-button-prev direction"></div>
      <div class="swiper-pagination direction"></div>
       <!-- account slider end  -->
    </div>
    <!-- graph start  -->
   <!-- now information sections starts -->
   <div class="card-container">
<div class="card-info">
    <p class="card-header">Card info</p>
    <div class="card-information">
       <span><span class="bold-info">Card balance:</span>XAF 746940; </span>
        <span><span class="bold-info">card limit:</span>746940;</span>
       <span><span class="bold-info">Card Types:</span>credit;</span>
       <span><span class="bold-info">Card balance:</span>609879</span>
     <span><span class="bold-info">EXp date:</span>2022-03-11</span>
     <span><span >Status:</span><span class="bold-info-green">Active</span></span>
    </div>
  

    </div>
   

   
  



   </div>
   <!-- now information sections end -->
      <p class="accounts">Recent activity</p>
      <hr class="main-line">
      <!-- tabel container start  -->
      <div class="table-container">
        <!-- filter section start  -->
        <div class="table-filter">
            <!-- search start  -->

            <div class="filter-line">
            <div class="filterbox">
               <span><i class="fa fa-search"></i>Search</span>
               <input type="text" class="search-box" placeholder="Search">
            </div>

          <i class="fa fa-sliders side-line" id="search" ></i>
            </div>
<!-- hide start  -->
          <div class="offcanvas">
          <div class="filter-line">
            <div class="filterbox">
               <span><i class="fa fa-calendar"></i>By Date</span>
               <div>
               <label for="">From:</label>
               <input type="date" class="search-box-date1" placeholder="Search">
               </div>
            </div>
          <div >
          <label for="">To;</label>
           <input type="date" class="search-box-date">
          </div>
            </div>

            <div class="filter-line">
            <div class="filterbox">
               <span><i class="fa fa-dollar"></i>By Amount</span>
               <input type="number" class="search-box" placeholder="min">
            </div>

            <input type="number" class="search-box-date" placeholder="max">
            </div>
            <div class="search-button">
                <button class="search"><span><i class="fa fa-search"></i>Search</span></button>
                <button class="cancel"><span><i class="fa fa-cancel"></i>Reset</span></button>
            </div>
          </div>
<!-- hide end  -->
        </div>
        <!-- filter section end -->

        <!-- real table section start -->
        <div class="account-table">
   <table class="table">
   <tr>
          <th>S.no</th>
          <th>Name</th>
          <th>Age</th>
          <th>Country</th>
          <th class="move">tel</th>
          <th class="move">Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country" >cameroon</td>
          <td data-label = "tel" class="move">674159544</td>
          <td data-label = "Email" class="move">jeanpoutcheu@gmail.com</td>
        
        </tr>
        <tr>
        <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country"
          >cameroon</td>
          <td data-label = "tel" class="move">674159544</td>
          <td data-label = "Email" class="move">jeanpoutcheu@gmail.com</td>
        </tr>
        <tr>
        <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country" >cameroon</td>
          <td data-label = "tel" class="move">674159544</td>
          <td data-label = "Email" class="move">jeanpoutcheu@gmail.com</td>
        </tr>
      </tbody>
   
    </table>
    <span class="message-trigger"><i class="fa fa-plus"></i></span>
        </div>
        <!-- real table section end -->
       
      </div>

       <!-- modal start  -->
       <div class="modal">
           
        </div>
        <!-- modal end -->
    </div>
      <!-- tabel container end  -->
    <!-- main end  -->
 
 <!-- graph section  -->
    <script src="..\..\View\assets\swiper.js"></script>
    <script src="..\..\View\assets\script.js"></script>
    <script src="..\..\View\assets\jquery\jquery-3.6.0.min.js"></script>
    <script src="..\..\View\js\card.js"></script>
    <script src="..\..\View\assets\package\dist\chart.js"></script>
    <script src="..\..\View\assets\package\dist\chart.min.js"></script>

   

 


</body>
</html>