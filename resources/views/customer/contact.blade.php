@extends('customer.layouts.master')
@section('title', 'Blog Sitesi')

@section('content')
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-8 col-lg-8 col-xl-7">
                  
            <p>Bizimle iletişime geçin. En kısa sürede dönüş yapacağız.</p>
            <div class="my-5">

                <form method="post" action="{{ route('contact_post') }}" id="contactForm">
                    @csrf
                    <div class="container">
                        <form>
                            <div class="mb-3 row">
                                <label for="name" class="col-xs-4 col-form-label">Ad Soyad</label>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-xs-4 col-form-label">E-Posta Adresi</label>
                                <div class="col-xs-8">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="example@example.com">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="topic" class="form-label">Konu</label>
                                <select class="form-select" name="topic" id="topic">
                                    <option selected>Lütfen Konu Seçiniz</option>
                                    <option>Bilgi</option>
                                    <option>İstek</option>
                                    <option>Öneri</option>
                                </select>
                            </div>
                            <div class="mb-3 row">
                                <label for="message" class="col-xs-4 col-form-label">Mesaj</label>
                                <div class="col-xs-8">
                                    <textarea class="form-control" rows="5" name="message" id="inputName" placeholder="mesajınız"></textarea>

                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="offset-sm-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Action</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-5">
            <div class="row">
                <div class="col-xs-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </main>
@endsection
