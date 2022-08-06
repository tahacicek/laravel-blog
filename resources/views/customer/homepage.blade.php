@extends('customer.layouts.master')
@section('title', 'Blog Sitesi')

@section('content')
    <!-- Main Content-->
    <div class="container-fluid px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <!-- Post preview-->
               
                @include("customer.widgets.postwidget")

                {{$post->links('pagination::bootstrap-4')}}
               
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older
                        Posts →</a>
                </div>
            </div>
            @include('customer.widgets.categorywidget')
        </div>
    </div>
@endsection
