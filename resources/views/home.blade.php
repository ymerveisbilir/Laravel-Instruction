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
                            <form method="POST" action="{{route('sepet.liste')}}">
                                {{ csrf_field() }} <!-- post data yollayabilmek için -->
                                {{ method_field('put') }} <!-- post data yollayabilmek için -->
                                <input type="hidden" name="user_id" value="1">
                                <input type="hidden" name="productID" value="{{ $book->id }}">
                                <input type="hidden" name="category_id" value="{{ $book->category_id }}">
                                <input type="hidden" name="product_name" value="{{ $book->name }}">
                                <input type="hidden" name="price" value="{{ $book->price }}">

                                <input type="submit" class="btn btn-primary" name="sepetBtn" value="Sepete Ekle">
                            </form>
                        </div>&nbsp;&nbsp;&nbsp;
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    </div>
@endsection
