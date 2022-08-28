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
                        Toplam <b>{{ $categories->count() }}</b> kategori mevcut.</h6><br>
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

                                            <a category-id="{{ $category->id }}" title="Düzenle"
                                                class="edit-click btn btn-sm btn-primary"><i class="fa fa-edit m-2"
                                                    aria-hidden="true"></i></a><br><br>

                                            <a category-id="{{ $category->id }}"
                                                category_count="{{ $category->categoryCount() }}" title="Sil"
                                                class="delete-click btn btn-sm btn-danger"><i class="fa fa-trash m-2"
                                                    aria-hidden="true"></i></a>
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
                        <form action="{{ route('category.insert') }}" method="post">
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



    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="text-center modal-header">
                    <h5 class="text-center modal-title" id="{{ $category->id }}"><b
                            class="text-success">{{ $category->id }}</b> adlı kategoriyi düzenliyorsunuz.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('category.update', $category->id) }}" method="post" class="form-group mb-3">
                        @csrf
                        <label for="name">Kategori Adı</label>
                        <input class="form-control" type="text" name="name" id="category">
                        <input type="hidden" name="id" id="category_id">
                        <label class="mt-3" for="slug">Kategori Slug</label>
                        <input class="form-control" type="text" name="slug" id="slug">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="text-white btn btn-success">Kaydet</button>
                </div>
                    </form>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="text-center modal-header">
                    <h5 class="text-center modal-title">Kategoriyi Sil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="body" class="modal-body">
                    <div class="mt-3 alert alert-danger" id="postAlert">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    <form action="{{ route('category.delete', $category->id) }}" method="get">
                        @csrf
                        <input type="hidden" name="deleteid" id="deleteid">
                        <button id="del" category-name="{{ $category->name }}" type="submit"
                            class="text-white btn btn-success">Sil</button>
                </div>
                </form>

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
            //DELETE CATEGORY
            $(".delete-click").click(function() {
                id = +$(this)[0].getAttribute("category-id");
                count = +$(this)[0].getAttribute("category_count");
                name = +$(this)[0].getAttribute("category-name");
                if (id == 1) {
                    $("#postAlert").html(name +
                        " kategorisi sabittir. Diğer kategorilere ait yazılar buraya eklenecektir buraya eklenecektir."
                    );
                    $("#body").show();
                    $("#deleteModal").modal();
                    $("#del").hide();

                    return;
                }

                $("#del").show();
                $("#deleteid").val(id);
                $("#postAlert").html("");
                $("#body").show();
                if (count > 0) {
                    $("#postAlert").html("Bu kategoriye ait " + count +
                        " yazı bulunmaktadır. Silmek istediğinize emin misiniz?");
                    $("#body").show();

                } else {
                    $('#postAlert').html(
                        'Bu kategoriye ait yazı bulunmamaktadır. Silmek istediğinize emin misiniz?');
                }

                $("#deleteModal").modal();

            });

            //EDİT CATEGORY
            $(".edit-click").click(function() {
                id = +$(this)[0].getAttribute("category-id");
                $.ajax({
                    type: "GET",
                    url: "{{ route('category.getdata') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        $("#category").val(data.name);
                        $("#slug").val(data.slug);
                        $("#category_id").val(data.id);
                        $("#editModal").modal();
                    }
                });
            });

            //SWTİCH
            $('.switch').change(function() {
                id = +$(this)[0].getAttribute("data");
                status = $(this).prop("checked");
                $.get("{{ route('category.switch') }}", {
                    id: id,
                    status: status
                }, function(data, status) {
                    console.log(data);
                });
            })
        })
    </script>
@endsection
