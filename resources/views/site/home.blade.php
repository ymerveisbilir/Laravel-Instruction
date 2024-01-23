@extends('site.layout')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-muted">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                @foreach ($categories as $category)
                    <a class="navbar-brand" href="/category/{{ $category->slug }}">{{ $category->name }}</a>
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
     
            <div class="card-body" style="">

                @foreach ($books as $book)
                <div class="product-container" >
                    <img src="/images/{{ $book->image }}" alt="Ürün Resmi">
                    <div class="product-details">
                        <h1>{{ $book->name }}</h1>
                        <p class="price">{{ $book->price }}₺</p>
                        <p class="description">{{ $book->info }}</p>
                        <form method="POST" action="{{route('cart.liste')}}">
                        @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="productID" value="{{ $book->id }}">
                            <input type="hidden" name="category_id" value="{{ $book->category_id }}">
                            <input type="hidden" name="product_name" value="{{ $book->name }}">
                            <input type="hidden" name="price" value="{{ $book->price }}">
                            <input type="submit" class="buy-button" name="sepetBtn" value="Sepete Ekle">
                        </form>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
    </div>


<style>

.product-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.product-details {
    margin-left: 20px;
}

.product-details h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

.price {
    font-size: 18px;
    color: green;
}

.description {
    font-size: 14px;
    color: #555;
    margin-bottom: 20px;
}

.buy-button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.buy-button:hover {
    background-color: #2980b9;
}

</style>

@endsection
