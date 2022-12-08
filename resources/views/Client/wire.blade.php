<x-layout>
  <link rel="stylesheet" href="invoice_2.0\View\css\wire_transfer.css">
  <link rel="stylesheet" href="invoice_2.0\View\css\accounts.css">
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
<x-message>
</x-message>
</x-layout>
