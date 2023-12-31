@extends('layouts.app')

@section('content')
<div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">
                           <div class="row">
                                    <div class="col-6"> {{ __('Kitap Ekle') }}</div>
                                    <div class="col-6 d-flex justify-content-end"><a href="{{route('books')}}" class="btn btn-warning">Listele</a></div>
                           </div>                     
                          </div>
     
                     <div class="card-body">
     
                  <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
                           @csrf <!-- hidden bir input oluşturur. Güvenlik için csrf tokenı oluşturur. -->

                           <div class="form-group">
                                    <label>Kitap Adı</label>
                                    <input type="text" name="name" class="form-control">
                           </div><br>
                           <div class="form-group">
                                    <label>Kategori Seç</label>
                                      <select class="form-select" name="categories" aria-label="Disabled select example" >
                                        <option value="" selected>Kategoriler</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                      </select>
                            </div><br>
                            <div class="form-group">
                                <label>Kitap Hakkında Bilgi</label>
                                <textarea type="text" name="info" class="form-control"></textarea>
                            </div><br>
                            <div class="form-group">
                                <label>Kitap Kapağı</label>
                                <input type="file" name="image" class="form-control">
                            </div><br>
                           <div class="form-group">
                                    <label>Fiyat</label>
                                    <input type="text" name="price" class="form-control">
                           </div><br>

                           @if ($errors->any()) <!-- BookStoreRequest'de zorunlu alanları ve hata mesajlarını belirttik.(back-end validation) -->
                           <div class="alert alert-danger">
                            <ul>
                                 @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                 @endforeach
                            </ul>
                           </div>
                           @endif
                           <button type="submit" class="btn btn-success mt-1">Kaydet</button>
                  </form>
                        
     
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection