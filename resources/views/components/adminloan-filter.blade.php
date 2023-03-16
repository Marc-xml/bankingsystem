<div class="table-filter">
         
    {{-- <form action="/account/{{$id=$accounts->id}}" method="GET"> --}}
    <form action="/filter-adminloans" method="GET">
      <div class="filter-content">
        <span><i class="fa fa-search"></i>Search</span>
        <input type="text" class="filter-box" placeholder="search" name="search">
     
     
      </div>
     
  
      <div class="filter-content filter-off">
        <span><i class="fa fa-calendar"></i>By Date</span>
        <input type="date" class="filter-box" placeholder="search" name="date">
      </div>
  
      <div class="filter-content filter-off">
        <span><i class="fa fa-dollar"></i>By amount</span>
        <input type="number" class="filter-box" placeholder="amount" name="amount">
      </div>

      <div  style="padding:30px;">
        <span style="background:#045faa;border-radius:50%;padding:5px 8px;color:#fff"><i class="fa fa-gear"></i></span>
      </div>
      
  
        <div class="filter-result">
        <button class="filter-button">Search</button>
        <span type="reset" style="padding:10px;"><a href="{{url()->previous()}}">Reset</a></span>
       
        </div>
    </form>
    
  </div>