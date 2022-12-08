<x-layout>
    
  <link rel="stylesheet" href="invoice_2.0\View\css\transfer.css">
    <p class="accounts" >Money transfer </p>
        <hr size='7' class="main-line">
        <p class="opt">Select an account to see more</p>
        <!-- accoutn section for dekstop start -->
        <x-account-container>
        </x-account-container>
        <!-- accoutn section for dekstop end -->
<x-account-slider>
</x-account-slider>
       <!-- account slider end  -->

    
    <!-- main end  -->
    <div class="actions">
          <button class="action" id="toggle"><i class="fa fa-paper-plane"></i>Make transfer</button>
          <button class="action"><i class="fa fa-user"> </i>Add beneficiary</button>
      </div>
<!-- modal section start  -->
<!-- <div class="modal">
  hlfjkhnv.bjkfkbnjk;fklcvnjfhyj
</div> -->
<!-- modal section end  -->
    <p class="accounts">Transfer history</p>
      <hr class="main-line">
      <!-- tabel container start  -->
<!-- flex of benef and history  -->
<div class="flex-history-benef">
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
      <thead>
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
        </div>
        <!-- real table section end -->
      </div>
      <!-- buttons  -->
      

      </div>
      <!-- beneficiary section  -->
      <div class="beneficiary">
          <p class="accounts">Declared benficiary</p>
          <hr class="main-line">
          <p class="opt">My accounts</p>

          <!-- card begin  -->
          <div class="card-benef">
            <span class="user"><i class="fa fa-user"></i></span>

            <div class="benef-info">
              <span class="alias">Account1</span>
              <span class="acc-no">RIB 01001 0107365671066</span>
            </div>

            <span class="plane"><i class="fa fa-paper-plane"></i></span>
            <span class="trash"><i class="fa fa-trash"></i></span>
          </div>

          <div class="card-benef">
            <span class="user"><i class="fa fa-user"></i></span>

            <div class="benef-info">
              <span class="alias">Account1</span>
              <span class="acc-no">RIB 01001 0107365671066</span>
            </div>

            <span class="plane"><i class="fa fa-paper-plane"></i></span>
            <span class="trash"><i class="fa fa-trash"></i></span>
          </div>
      </div>


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
      <x-message>
      </x-message>
</x-layout>