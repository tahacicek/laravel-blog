@extends('admin.layouts.master')
@section('title', 'Blog Ayarları')
@section('content')
    <!-- DataTales Example -->
    <div class="card   shadow mb-4">
        <div class="card-header dark:bg-slate-800 py-3">
            <h6 class="m-0 font-weight-bold float-left text-primary">Bu sayfada sitenizin mevcut ayarlarını düzenliyorsunuz.
            </h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('config.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="title">Site Başlığı</label>
                            <input class="form-control" value="{{ $config->title }}" type="text" name="title"
                                id="title" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="active">Site Aktiflik Durumu</label>
                            <select class="form-control" name="active" id="active">
                                <option @if ($config->active == 1) selected @endif class="form-control"
                                    value="1">Açık</option>
                                <option @if ($config->active == 0) selected @endif class="form-control"
                                    value="0">Kapalı</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="logo">Site Logo</label>
                            <input class="text-center p-1 form-control" value="" type="file"
                                name="logo" id="logo">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="favicon">Site Favicon</label>
                            <input class="text-center p-1 form-control" value="" type="file"
                                name="favicon" id="favicon">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="facebook">Facebook</label>
                            <i class="text-white fa fa-facebook-official" aria-hidden="true"></i>
                            <input class="text-center p-1 form-control" value="{{ $config->facebook }}" type="text"
                                name="facebook" id="facebook">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="instagram">İnstagram</label>
                            <input class="text-center p-1 form-control" value="{{ $config->instagram }}" type="text"
                                name="instagram" id="instagram">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="twitter">Twitter</label>
                            <input class="text-center p-1 form-control" value="{{ $config->twitter }}" type="text"
                                name="twitter" id="twitter">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="github">Github</label>
                            <input class="text-center p-1 form-control" value="{{ $config->github }}" type="text"
                                name="github" id="github">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="linkedin">Linkedin</label>
                            <input class="text-center p-1 form-control" value="{{ $config->linkedin }}" type="text"
                                name="linkedin" id="linkedin">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="youtube">Youtube</label>
                            <input class="text-center p-1 form-control" value="{{ $config->youtube }}" type="text"
                                name="youtube" id="youtube">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="tumblr">Tumblr</label>
                            <input class="text-center p-1 form-control" value="{{ $config->tumblr }}" type="text"
                                name="tumblr" id="tumblr">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="google">Google</label>
                            <input class="text-center p-1 form-control" value="{{ $config->google }}" type="text"
                                name="google" id="google">
                        </div>
                    </div>
                    <button class="btn btn-outline-primary btn-block" type="submit">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.tailwindcss.com"></script>
@endsection
