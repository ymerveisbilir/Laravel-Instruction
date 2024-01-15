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
                <div class="product-container">
                    <img src="/images/{{ $kitap->image }}" alt="Ürün Resmi">
                    <div class="product-details">
                        <h1>{{ $kitap->name }}</h1>
                        <p class="price">{{ $kitap->price }}₺</p>
                        <p class="description">{{ $kitap->info }}</p>
                        <form method="POST" action="{{route('sepet.liste')}}">
                            {{ csrf_field() }} <!-- post data yollayabilmek için -->
                            {{ method_field('put') }} <!-- post data yollayabilmek için -->
                            <input type="hidden" name="user_id" value="1">
                            <input type="hidden" name="productID" value="{{ $kitap->id }}">
                            <input type="hidden" name="category_id" value="{{ $kitap->category_id }}">
                            <input type="hidden" name="product_name" value="{{ $kitap->name }}">
                            <input type="hidden" name="price" value="{{ $kitap->price }}">
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
