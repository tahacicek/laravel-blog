@extends('admin.layouts.master')
@section('title', 'Blog Yazıları')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="border-bottom-success card-header py-3">
            <h6 class="m-0 font-weight-bold float-left text-primary">Bu tabloda mevcut yazınızı düzenliyorsunuz
            </h6>
            <h6 class="m-0 font-weight-bold float-right text-primary">
                 <strong>{{ $post->title." " }}</strong>isimli yazı.</h6>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h5 class="card-title "></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("yazilar.update", $post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf 


                            @method("PUT")
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="title">Yazı Başlığı</label>
                                        <input value="{{ $post->title }}" type="text" name="title" id="title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="author">Yazar</label>
                                        <input type="text" value="{{ $post->author }}" name="author" id="author" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="category_id">Yazı Kategorisi</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Seçim Yapınız</option>
                                            @foreach ($categories as $category)
                                                <option  value="{{ $category->id }}" @if($post->category_id==$category->id) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="descr">Yazı İçeriği</label>
                                        <textarea id="editor" class="editor form-control" name="descr" rows="5">{!! $post->descr  !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group mb-3 col-12">
                                    <label for="image" name="image" class="form-label">Yazı Görseli </label><br>
                                    <img src="{{ asset($post->image) }}" style="width:20rem;" class="p-3 rounded mx-auto d-block img-fluid rounded-top" alt="">
                                  
                                    <input class="p-1 form-control" name="image" type="file" id="image">
                                </div>

                                <button class="btn btn-outline-primary btn-block" type="submit">Güncelle</button>
                        </form>
                    </div>
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
