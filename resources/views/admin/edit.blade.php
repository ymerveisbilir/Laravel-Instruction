@extends('layouts.app')

@section('content')
<div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">
                           <div class="row">
                                    <div class="col-6">{{ __('Kitap Düzenle') }} </div>
                                    <div class="col-6 d-flex justify-content-end"><a href="{{route('books')}}" class="btn btn-warning">Listele</a></div>
                           </div>
                           </div>
     
                     <div class="card-body">
     
                  <form action="{{route('book.update', $book->id)}}" method="POST">
                           @csrf <!-- hidden bir input oluşturur. Güvenlik için csrf tokenı oluşturur. -->
                           <div class="form-group">
                                    <label>Kitap Adı</label>
                                    <input type="text" name="name" class="form-control" value="{{$book->name}}">
                           </div>
                           <div class="form-group">
                            <label>Kategori :</label>
                              <select class="form-select" name="categories" aria-label="Disabled select example" >
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($category->id == $book->category->id) selected @endif>{{$category->name}}</option>
                                @endforeach
                              </select>
                             </div>
                           <div class="form-group">
                                    <label>Fiyat</label>
                                    <input type="text" name="price" class="form-control" value="{{$book->price}}">
                           </div>
                           <button type="submit" class="btn btn-success mt-1">Güncelle</button>
                  </form>
                        
     
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection