<div class="table-filter">
         
    {{-- <form action="/account/{{$id=$accounts->id}}" method="GET"> --}}
    <form action="/filter-accounts" method="GET">
      <div class="filter-content">
        <span><i class="fa fa-search"></i>Search</span>
        <input type="text" class="filter-box" placeholder="search" name="search">
     
     
      </div>
     
  
      <div class="filter-content filter-off">
        <span><i class="fa fa-calendar"></i>By Date</span>
        <input type="date" class="filter-box" placeholder="search" name="date">
      </div>
  
    
  
        <div class="filter-result">
        <button class="filter-button">Search</button>
        <span type="reset"><a href="{{url('/')}}">Reset</a></span>
       
        </div>
    </form>
    
  </div>