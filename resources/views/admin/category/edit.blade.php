@extends('admin.layouts.master')
@section('title', 'Tüm Kategoriler')

@section('content')
<div class="col-12 col-md-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-center text-primary">Bu tabloda mevcut kategorinizi düzenliyorsunuz.
            </h6>
            <h6 class="mt-3 font-weight-bold text-center text-primary">
                {{ $category->name }}</h6>
        </div>
        <div class="card widget widget-stats">

            <div class="card-body">
                <form action="{{ route("category.update", $category->id) }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Kategori İsmi</label>
                        <input value="{{ $category->name  }}" type="text" name="name" id="name" class="form-control">
                    </div>
                    <button class="btn btn-outline-primary btn-lg w-100" type="submit">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
