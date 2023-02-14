<div class="table-filter">
         
    {{-- <form action="/account/{{$id=$accounts->id}}" method="GET"> --}}
    <form action="/filter/{{$id=$accounts->id}}" method="GET"  style="margin-left:auto;margin-right:auto">
      <div class="filter-content" style="z-index:40;">
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
      
  
        <div class="filter-result">
        <button class="filter-button">Search</button>
        <span type="reset" style="margin:10px;"><a href="/">Reset</a></span>
       
        </div>
    </form>
    
  </div>