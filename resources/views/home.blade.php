@extends('site.layout')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                @foreach ($categories as $category)
                    <a class="navbar-brand" href="kategori/{{ $category->slug }}">{{ $category->name }}</a>
                @endforeach
            </ul>
        </div>
    </nav>
    <br>
    <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6"> {{ __('Tüm Kitaplar') }}</div>
            </div>

        </div>
     
            <div class="card-body" style="display: flex">

                @foreach ($books as $book)
                    <div class="card" style="width: 14rem;">
                        <img class="card-img-top" src="/images/{{ $book->image }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title" style="font-weight:bold;">{{ $book->name }}</h4>
                            <p class="card-text">{{ $book->info }}</p>
                            <a href="#" class="btn btn-primary">Sepete Ekle</a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    </div>
@endsection
