

@extends("customer.layouts.grand")
@section('title', 'Blog Sitesi')

@section('content')

<header class="masthead" style="background-image: url('{{ $post->image }}">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <h2 class="subheading">{!! Str::limit($post->descr, 75) !!}</h2>
                    <span class="meta">
                            <b> Yazan:</b> {{ $post->author }} <b class="ms-4">Kategori:</b>
                            <b> <a href="#!"> {{ $post->getCategory->name }}</a></b> <b class="ms-4">Görüntülenme
                                Sayısı: </b>{{ $post->hit }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                 <p>{!! $post->descr !!}</p>
                </div>
        @include('customer.widgets.categorywidget')

            </div>
        </div>

    </article>

@endsection

