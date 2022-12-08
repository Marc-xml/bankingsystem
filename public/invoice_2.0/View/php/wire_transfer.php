<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wire transfer</title>
    <link rel="stylesheet" href="..\..\View\css\wire_transfer.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\all.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.css">
    <link rel="stylesheet" href="..\..\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.min.css">
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
        <li><a href="..\..\View\php\accounts.php"> <i class="fa fa-user-circle side-icon"></i>Accounts</a></li>
        <hr class="line">
        <li><a href="..\..\View\php\transfer.php"><i class="fa fa-exchange side-icon"></i>Transactions</a></li>
        <hr class="line">
        <li><a href="..\..\View\php\card.php"><i class="fa fa-credit-card side-icon"></i>cards</a></li>
        <hr class="line">
        <li><a href="..\..\View\php\loans.php"><i class="fa fa-dollar side-icon"></i>Loans</a></li>
        <hr class="line">
        <li><a href="..\..\View\php\E_statement.php"><i class="fa fa-file side-icon"></i>E-statement</a></li>
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
    <p class="bold-info">Inter-bank transfer with invoice</p>
    <p class="grey-name">Send money to a customer of another bank in just few steps</p>
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
   <p class="history">History</p>

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

          <i class="fa fa-filter side-line" id="search" ></i>
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
      <thead>
        <tr>
          <th>S.no</th>
          <th>Name</th>
          <th>Age</th>
          <th>Country</th>
          <th>tel</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country">cameroon</td>
          <td data-label = "tel">674159544</td>
          <td data-label = "Email">jeanpoutcheu@gmail.com</td>
        
        </tr>
        <tr>
        <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country">cameroon</td>
          <td data-label = "tel">674159544</td>
          <td data-label = "Email">jeanpoutcheu@gmail.com</td>
        </tr>
        <tr>
        <td data-label = "S.no">1</td>
          <td data-label = "Name">marc</td>
          <td data-label = "Age">18</td>
          <td data-label = "Country">cameroon</td>
          <td data-label = "tel">674159544</td>
          <td data-label = "Email">jeanpoutcheu@gmail.com</td>
        </tr>
      </tbody>
    </table>
        </div>
        <!-- real table section end -->
      </div>
</div>
</body>
</html>