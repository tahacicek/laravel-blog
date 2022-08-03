@extends('customer.layouts.master')
@section('title'," $category->name Yazıları")

@section('content')
    <!-- Main Content-->
    <div class="container-fluid px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <!-- Post preview-->
                @if (count($post)>0)
                    
                @foreach ($post as $posts)
                    <div class="post-preview">
                        <a target="_blank" href="{{ route('blog_detail', [$posts->getCategory->slug, $posts->slug]) }}">
                            <h2 class="post-title">{{ $posts->title }}</h2>
                            <img src="{{ $posts->image }}" class="img-fluid" width="900">
                            <h3 class="mt-3 post-subtitle">{!! Str::limit($posts->descr, 75) !!}</h3>
                        </a>
                        <p class="post-meta">
                            <b> Yazan:</b> {{ $posts->author }} <b class="ms-4">Kategori:</b>
                            <b> <a href="#!"> {{ $posts->getCategory->name }}</a></b> <b class="ms-4">Görüntülenme
                                Sayısı: </b>{{ $posts->hit }}
                            <span class="d-flex justify-content-end ">{{ $posts->created_at->diffForHumans() }}</span>
                        </p>
                    </div>
                    @if (!$loop->last)
                        <hr class="my-4" /> <!-- Eğer "hr" sonda ise çalışmaz, sonda değil ise çalışır. -->
                    @endif
                @endforeach
                @else 
                <div class="mb-3">
                  <label for="" class="form-label">Bu kategoriye ait yazı bulunamadı.</label> 
                  <span class="input-group-text" id="inputGroup-sizing-lg">İstersen buraya bir şeyler yazıp gönder. Önemli Not: Kesinlikle dikkate alınmayacaktır.</span>

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
