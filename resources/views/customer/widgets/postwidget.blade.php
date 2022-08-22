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
        <span class="d-flex justify-content-end ">{{ \Carbon\Carbon::parse($posts->created_at)->diffForHumans() }}</span>
    </p>
</div>
@if (!$loop->last)
    <hr class="my-4" /> <!-- Eğer "hr" sonda ise çalışmaz, sonda değil ise çalışır. -->
@endif
@endforeach