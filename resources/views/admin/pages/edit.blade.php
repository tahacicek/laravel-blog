@extends('admin.layouts.master')
@section('title', 'Blog Yazıları')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="border-bottom-success card-header py-3">
            <h6 class="m-0 font-weight-bold float-left text-primary">Bu tabloda mevcut sayfaınızı düzenliyorsunuz
            </h6>
            <h6 class="m-0 font-weight-bold float-right text-primary">
                 <strong>{{ $page->title." " }}</strong>isimli sayfa.</h6>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                    </div>
                    <div class="card-body">
                        <form action="{{ route("page.update", $page->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <label class="" for="title">Sayfa Başlığı</label>
                                        <input value="{{ $page->title }}" type="text" name="title" id="title" class="border-left-success form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="descr">Sayfa İçeriği</label>
                                        <textarea id="editor" class="editor form-control" name="content" rows="5">{!! $page->content  !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-12">
                                    <label for="image" name="image" class="form-label">Sayfa Görseli </label><br>
                                    <img src="{{ asset($page->image) }}" style="width:20rem;" class="p-3 rounded mx-auto d-block img-fluid rounded-top" alt="">
                                    <input class="border-left-success p-1 form-control" name="image" type="file" id="image">
                                </div>
                                <button class="btn btn-outline-primary btn-block" type="submit">Güncelle</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
@endsection
@section('css')
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js')
    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote({
                "height": 250,
                placeholder: 'özelliştirilebilir yazı içeriğinizi buraya yazın',
                focus: true,
                lang: 'tr-TR', // default: 'en-US'

            });
        });
    </script>
@endsection
