@extends('admin.layouts.master')
@section('title', 'Blog Ayarları')
@section('content')
    <!-- DataTales Example -->
    <div class="card dark:bg-slate-800  shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-left text-primary">Bu sayfada sitenizin mevcut ayarlarını düzenliyorsunuz.
            </h6>
        </div>
        <div class="card-body">
            <form action="">
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
                            <input class="text-center p-1 form-control" value="{{ $config->title }}" type="file"
                                name="logo" id="logo" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                            <label class="form-group" for="favicon">Site Favicon</label>
                            <input class="text-center p-1 form-control" value="{{ $config->title }}" type="file"
                                name="favicon" id="favicon" required>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
@section("js")
<script src="https://cdn.tailwindcss.com"></script>
@endsection
