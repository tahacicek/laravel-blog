@extends('admin.layouts.master')
@section('title', 'Blog Yazıları')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="border-bottom-success card-header py-3">
            <h6 class="p-2 m-0 font-weight-bold float-left text-success">Bu tabloda yazı yayınlıyorsunuz.
            </h6>
            <h6 class="m-0 font-weight-bold float-right text-success">
                <p class="text-center"><i class="p-2 text-danger fa fa-exclamation-triangle" aria-hidden="true"></i> Yazılaranız direkt
                    <span class="">yayınlanmayacaktır.</span></p></h6>
        </div>
       
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <h5 class="card-title "></h5>

                        <div class="card-body">
                            <form action="{{ route('yazilar.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="title">Yazı Başlığı</label>
                                            <input value="" type="text" name="title" id="title"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="author">Yazar</label>
                                            <input type="text" name="author" id="author" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="category_id">Yazı Kategorisi</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">Seçim Yapınız</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="descr">Yazı İçeriği</label>
                                            <textarea id="editor" class="editor form-control" name="descr" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 col-12">
                                        <label for="image" name="image" class="form-label">Yazı Görseli </label>
                                        <input class="p-1 form-control" name="image" type="file" id="image">
                                    </div>
                                    <button class="btn btn-outline-primary btn-block" type="submit">Oluştur</button>
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
