<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My bills</title>
    <link rel="stylesheet" href="..\..\View\css\bills.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\all.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.min.css">
    <link rel="stylesheet" href="..\..\View\assets\swiper.css">

</head>
<body>
    <div class="header">
    <span class="logo">INVOICE</span>
        <div class="icons">
        <span><i class="fa fa-user  "></i></span>
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


  <div class="bill-info">
    <p class="bold-info">Pay your bils with invoice</p>
    <p class="grey-name">Your bills can be payed manually or be payed on schedule</p>
  </div>

  <!-- box below section  -->
  <div class="center">
    <form action="POST">
        <div class="text_field">
            <input type="text" required>
            <label for="">Operator</label>
            
        </div>
        <div class="text_field">
            <input type="password" required>
            <label for="">Operator</label>
            
        </div>
        <div class="text_field">
            <input type="password" required>
            <label for="">Operator</label>
            
        </div>
        <div class="text_field">
            <input type="password" required>
            <label for="">Operator</label>
            
        </div>
     
    <div class="submit_button">
    <input type="submit" value="Confirm">
    </div>
       
    </form>
   </div>
   <!-- box below section end  -->
   <div class="bill-info">
    <p class="bold-info">Schedule payements</p>
    <p class="grey-name">Upcoming bills</p>
  </div>


  <div class="upcoming-bills">
    <div class="bill">
        <span class="bill-logo">Amazon</span>
        <span class="sub-bill">
            <span>schedule: <b>Monthly</b></span>
            <span>Next payement: <b>12/03/33</b></span>
        </span>
    </div>

    <div class="bill">
        <span class="bill-logo">Amazon</span>
        <span class="sub-bill">
            <span>schedule: <b>Monthly</b></span>
            <span>Next payement: <b>12/03/33</b></span>
        </span>
    </div>

    <div class="bill">
        <span class="bill-logo">Amazon</span>
        <span class="sub-bill">
            <span>schedule: <b>Monthly</b></span>
            <span>Next payement: <b>12/03/33</b></span>
        </span>
    </div>
  </div>

  <span class="message-trigger"><i class="fa fa-plus"></i></span>
    </div>

</body>
</html>