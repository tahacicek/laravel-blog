

@extends("customer.layouts.master")
@section('title', 'Blog Sitesi')

@section('content')
  <!-- Page Header-->
      
  
<!-- Main Content-->
        <main  class="mb-4">
            <div class=" container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                       
                        <h3  class="text-center">{{ $page->title }}</h3>
                        <p>{!! $page->content !!}</p>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
       

@endsection

