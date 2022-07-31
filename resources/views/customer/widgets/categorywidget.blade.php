<div class="col-md-2">
    <div class="card" style="width:19rem;">
      <img src="https://images.unsplash.com/photo-1561154464-82e9adf32764?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="display-6 mb-3 card-title"> <em> Kategoriler</em></h5>
        <ul class="list-group">
         @foreach ($categories as $category)
             
         <li class="list-group-item"><button type="button" class="btn btn-outline-dark">
            <em>{{ $category->name }}</em>  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                 +1
                 <span class="visually-hidden">unread messages</span>
               </span>
           </button></li>
         @endforeach
       </ul>
      </div>
    </div>
 </div>