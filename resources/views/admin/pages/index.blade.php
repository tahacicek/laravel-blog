@extends('admin.layouts.master')
@section('title', 'Blog Yazıları')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold float-left text-primary">Bu tabloda mevcut sayfalarınızı görüntülüyorsunuz.
            </h6>
            <h6 class="m-0 font-weight-bold float-right text-primary">
                Toplam <strong>{{ $pages->count() }} </strong> sayfa bulundu.</h6><br>
            <h6 class="m-0 font-weight-bold float-right text-primary">
        </div>
        <div class="card-body">
            <div id="orderSuccess" style="display: none;" class="border-left-danger border-bottom-danger alert alert-success">
                Sıralama Başarılı!
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sıralama</th>
                            <th class="text-center">Fotoğraf</th>
                            <th class="text-center">Sayfa Başlığı</th>
                            <th  class="text-center">Durum</th>
                            <th class="text-center">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody id="orders">
                        @foreach ($pages as $pages)
                            <tr id="page_{{ $pages->id }}">
                                <td style="width: 10px" class=" text-center " >
                                    <i class="fa fa-3x mt-5 fa-sort handle" style="cursor: move" aria-hidden="true">
                            </td>
                                <td style="width: 350px" class="text-center">
                                    <img src="{{ $pages->image }}" width="200" class="mt-4 img-fluid img-responsive"
                                        alt="">
                                </td>
                                <td class="text-center"> {{ $pages->title }}</td>
                                <td class="text-center">
                                    <input class="switch" page-id="{{ $pages->id }}" type="checkbox" data-on="Yayında"
                                        data-off="Pasif" data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                        data-size="mini" @if ($pages->status == 1) checked @endif>
                                </td>
                                <td class="text-center">
                                    <a target="_blank" href="{{ route('page', $pages->slug) }}" title="Görünütle"
                                        class="btn btn-sm btn-success"><i class="fa fa-eye m-2"
                                            aria-hidden="true"></i></a><br><br>
                                    <a href="{{ route('page.edit', $pages->id) }}" title="Düzenle"
                                        class="btn btn-sm btn-primary"><i class="fa fa-edit m-2"
                                            aria-hidden="true"></i></a><br><br>
                                    <a href="{{ route('page.delete', $pages->id) }}" title="Sil"
                                        class="btn btn-sm btn-danger"><i class="fa fa-trash m-2" aria-hidden="true"></i></a>
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
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

    <script>
        $("#orders").sortable({
            handle:".handle",
            update:function(){
             var siralama = $("#orders").sortable("serialize");
             $.get("{{route("page.orders")}}?"+siralama, function(data,status){
                $("#orderSuccess").show();
                setTimeout(function(){$("#orderSuccess").hide();}, 999)
             });
            }
        });
    </script>
    <script>
        $(function() {
            $('.switch').change(function() {
                id = +$(this)[0].getAttribute("page-id");
                status = $(this).prop("checked");
                $.get("{{ route('page.switch') }}", {
                    id: id,
                    status: status
                }, function(data, status) {
                    console.log(data);
                });
            })
        })
    </script>
@endsection
