@extends('admin.layouts.master')
@section('title', 'Blog Yazıları')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-left text-primary">Bu tabloda mevcut yazılarınızı görüntülüyorsunuz.
            </h6>
            <h6 class="m-0 font-weight-bold float-right text-primary">
                Toplam <strong>{{ $post->count() }} </strong> yazı bulundu.</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Yazı Başlığı</th>
                            <th>Kategori</th>
                            <th>Tıklanma Say.</th>
                            <th>Oluşturma Tar.</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $post)
                            <tr>
                                <td>
                                    <img src="{{ $post->image }}" width="200" class="img-fluid rounded-top"
                                        alt="">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->getCategory->name }}</td>
                                <td>{{ $post->hit }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                <td class="text-center">{!! $post->status == 0
                                    ? "<span class='text-center text-dark badge bg-warning '>Pasif</span>"
                                    : "<span class='text-center text-white badge bg-success'>Yayınlandı</span>" !!}</td>
                                <td class="text-center">
                                    <a href="" title="Görünütle" class="btn btn-sm btn-success"><i
                                            class="fa fa-eye m-2" aria-hidden="true"></i></a><br><br>
                                    <a href="{{ route("yazilar.edit", $post->id) }}" title="Düzenle" class="btn btn-sm btn-primary"><i
                                            class="fa fa-edit m-2" aria-hidden="true"></i></i></i></a><br><br>
                                    <a href="" title="Sil" class="btn btn-sm btn-danger"><i
                                            class="fa fa-trash m-2" aria-hidden="true"></i></i></i></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
@endsection
