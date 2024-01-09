@extends('layouts.app')

@section('content')

<div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">
                        <div class="row">
                            <div class="col-6"> {{ __('Kitaplar') }}</div>
                        </div>
                       
                    </div>
     
                     <div class="card-body">
     
                      
                          @foreach ($books as $book)

                          <div class="card" style="width: 14rem;">
                            <img class="card-img-top" src="/images/{{ $book->image }}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{ $book->name }}</h5>
                              <p class="card-text">{{ $book->info }}</p>
                              <a href="#" class="btn btn-primary">Sepete Ekle</a>
                            </div>
                          </div>

                          @endforeach

     
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection