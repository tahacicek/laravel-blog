@extends('admin.layouts.master')
@section('title', 'Silinen Yazılar')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-left text-primary">Bu tabloda silinen yazılarınızı görüntülüyorsunuz.
            </h6>
            <h6 class="m-0 font-weight-bold float-right text-primary">
                Toplam <strong>{{ $post->count() }} </strong> yazı bulundu.</h6><br>
            <h6 class="m-0 font-weight-bold float-right text-primary">

                <a href="{{ route('yazilar.index') }}" class="btn btn-success btn-sm"> <i class="m-2 fa fa-chevron-left "
                        aria-hidden="true"></i>Güncel Yazılar</a>
            </h6>

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
                                <td class="text-center">
                                    <a href="{{ route("recover", $post->id) }}" title="Geri Al" class="btn btn-sm btn-success"><i
                                            class="fa fa-undo m-2" aria-hidden="true"></i></a><br><br>
                                    <a href="{{ route("harddelete", $post->id) }}" title="Kaldır" class="btn btn-sm btn-success"><i
                                            class="fa fa-trash m-2" aria-hidden="true"></i></a><br><br>
                                <td class="text-center">
                                    </form>
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
