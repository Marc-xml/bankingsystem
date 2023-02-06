<div class="table-filter">
         
    {{-- <form action="/account/{{$id=$accounts->id}}" method="GET"> --}}
    <form action="/statement/precise" method="GET">
      <div class="filter-content" style="z-index:40;">
        <span><i class="fa fa-search"></i>Month</span>
        <select name="month" id="" style="background:#2d87ef25;
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
        <span><i class="fa fa-calendar"></i>year</span>
        <input type="text" class="filter-box" placeholder="search" name="year" required>
      </div>
  
      <div class="filter-content filter-off">
        <span><i class="fa fa-dollar"></i>Date</span>
        <input type="text" class="filter-box" placeholder="Enter date" name="date" required>
      </div>
      
  
        <div class="filter-result">
        <button class="filter-button">Search</button>
        <span type="reset" style="margin:10px;"><a href="/">Reset</a></span>
       
        </div>
    </form>
    
  </div>