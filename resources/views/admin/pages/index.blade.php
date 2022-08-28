@extends('admin.layouts.master')
@section('title', 'Blog Yazıları')

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-left text-primary">Bu tabloda mevcut yazılarınızı görüntülüyorsunuz.
            </h6>
            <h6 class="m-0 font-weight-bold float-right text-primary">
                Toplam <strong>{{ $pages->count() }} </strong> yazı bulundu.</h6><br>
                <h6 class="m-0 font-weight-bold float-right text-primary">
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fotoğraf</th>
                            <th>Sayfa Başlığı</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $pages)
                            <tr>
                                <td>
                                    <img src="{{ $pages->image }}" width="200" class=" img-fluid position-absolute top-100 start-50 translate-middle"
                                        alt="">
                                </td>

                                <td class="text-center"> {{ $pages->title }}</td>
                                <td class="text-center">
                                    <input class="switch" data="{{ $pages->id }}" type="checkbox" data-on="Yayında"
                                        data-off="Pasif" data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                        data-size="mini" @if ($pages->status == 1) checked @endif>
                                </td>
                                <td class="text-center">
                                    <a target="_blank" href="" title="Görünütle" class="btn btn-sm btn-success"><i
                                            class="fa fa-eye m-2" aria-hidden="true"></i></a><br><br>
                                    <a href="{{ route('yazilar.edit', $pages->id) }}" title="Düzenle"
                                        class="btn btn-sm btn-primary"><i class="fa fa-edit m-2"
                                            aria-hidden="true"></i></a><br><br>
                                    <form method="pages" action="{{ route('yazilar.destroy', $pages->id) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" title="Sil" class="btn btn-sm btn-danger"><i
                                                class="fa fa-trash m-2" aria-hidden="true"></i></button>
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

@section('css')
    <!-- include summernote css -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endsection

@section('js')
    <!-- include summernote js -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(function() {
            $('.switch').change(function() {
                id = +$(this)[0].getAttribute("data");
                status = $(this).prop("checked");
                $.get("{{ route('switch') }}", {
                    id: id,
                    status: status
                }, function(data, status) {
                    console.log(data);
                });
            })
        })
    </script>
@endsection
