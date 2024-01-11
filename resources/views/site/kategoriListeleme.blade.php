@extends('site.layout')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                @foreach ($categories as $category)
                    <a class="navbar-brand" href="/kategori/{{ $category->slug }}">{{ $category->name }}</a>
                @endforeach
            </ul>
        </div>
    </nav>
    <br>
    <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">Kitaplar</div>
            </div>

        </div>
     
            <div class="card-body" style="display: flex">

                @foreach ($kitaplar as $kitap)
                    <div class="card" style="width: 14rem;">
                        <img class="card-img-top" src="/images/{{ $kitap->image }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight:bold;">{{ $kitap->name }}</h4>
                            <p class="card-text">{{ $kitap->info }}</p>
                            <a href="#" class="btn btn-primary">Sepete Ekle</a>
                        </div>
                    </div>&nbsp;&nbsp;&nbsp;
                @endforeach


            </div>
        </div>
    </div>
    </div>
@endsection
