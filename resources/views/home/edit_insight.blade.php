<x-admin-layout>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
    <x-flash-message/>
    <p class="account">Edit insight</p>
    <hr class="main-line">
    <br>
 
    <div class="review-form">
      
        <form action="/change-insight/{{$id = $insight->id}}"  method="POST"  enctype="multipart/form-data">
            @csrf
           @method('PUT')
           
              <div class="row">
              <div class="text_field" >
                <input type="text" required name="title" value="{{$insight->title}}" />
                <label for="">Title</label>
                
            </div>
            <div class="text_field" >
                <input type="text" required name="content" value="{{$insight->content}}" />
                <label for="">Content</label>
                
            </div>
            <div class="text_field">
                <input type="file" required name="image" value="" />
                <label for="">Image</label>
                <img  src="{{$insight->image ? asset('storage/' .$insight->image) : asset('/images/no-image.png')}}"  >
                
            </div>
          </div>
        
          
        
          
          
         
          
           
          
        
          <div class="bottom">
       
          </div>
          <div class="bottom" style="">
          <input type="submit" value="SUBMIT" class="loan-button" style="width:5rem;">
          <span style="margin-top:20px;">reset</span>
          </div>
          <div class="bottom">
          {{-- <span style="color:#707070;font-size:13px">NB:Make sure every document submited here is authentic and can be verified,violation of these might lead to serious sanctions</span> --}}
          </div>
        </form>
           
                
    </div>
</x-admin-layout>