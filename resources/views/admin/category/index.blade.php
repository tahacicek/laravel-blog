@extends('admin.layouts.master')
@section('title', 'Tüm Kategoriler')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold float-left text-primary">Bu tabloda mevcut kategorileriniz
                        görüntülüyorsunuz.
                    </h6>
                    <h6 class="m-0 font-weight-bold float-right text-primary">
                     Toplam    <b>{{ $categories->count() }}</b> kategori mevcut.</h6><br>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Kategori Adı</th>
                                    <th>Yazı Sayısı</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->categoryCount() }}</td>
                                        <td class="text-center">
                                            <input class="switch" data="{{ $category->id }}" type="checkbox"
                                                data-on="Yayında" data-off="Pasif" data-onstyle="success"
                                                data-offstyle="danger" data-toggle="toggle" data-size="mini"
                                                @if ($category->status == 1) checked @endif>
                                        </td>
                                        <td class="text-center">
                                            <a target="_blank" href="" title="Görünütle"
                                                class="btn btn-sm btn-success"><i class="fa fa-eye m-2"
                                                    aria-hidden="true"></i></a><br><br>
                                            <a href="{{ route("category.edit", $category->id) }}" title="Düzenle" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-edit m-2" aria-hidden="true"></i></a><br><br>
                                            <a href="{{ route("category.delete", $category->id) }}" title="Sil" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-trash m-2" aria-hidden="true"></i></a>
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
        <div class="col-12 col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-center text-primary">Burada kategori oluşturuyorsunuz.
                    </h6>

                </div>
                <div class="card widget widget-stats">

                    <div class="card-body">
                        <form action="{{ route("category.insert") }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Kategori İsmi</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <button class="btn btn-outline-primary btn-lg w-100" type="submit">Oluştur</button>
                        </form>
                    </div>
                </div>
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
                $.get("{{ route("category.switch") }}", {
                    id: id,
                    status: status
                }, function(data, status) {
                    console.log(data);
                });
            })
        })
    </script>
@endsection
