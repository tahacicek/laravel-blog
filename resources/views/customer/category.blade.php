@extends('customer.layouts.master')
@section('title'," $category->name Yazıları")

@section('content')
    <!-- Main Content-->
    <div class="container-fluid px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <!-- Post preview-->
                @if (count($post)>0)
                    
                @include("customer.widgets.postwidget")

    {{$post->links('pagination::bootstrap-4')}}

                @else 
                <div class="mb-3">
                  <label for="" class="form-label">Bu kategoriye ait yazı bulunamadı.</label> 
                  <span class="input-group-text" id="inputGroup-sizing-lg">Bir şeyler göönder. Önemli Not: Kesinlikle dikkate alınmayacaktır.</span>

                  <textarea type="text" class="form-control" placeholder="" name="" id="" rows="7"> </textarea>
                </div>
             <i> Ya da</i>  <b><a href="{{ route("homepage") }}">Ana sayfaya geri dön</a></b>
                @endif

                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Gönder
                        </a>
                </div>
            </div>
            
            @include('customer.widgets.categorywidget')
        </div>
    </div>

@endsection
