@extends('layouts.app')

@section('content')
<style>
         label{
         color:blue;
         }
</style>
<div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
                 <div class="card">
                     <div class="card-header">
                           <div class="row">
                                    <div class="col-6"> <b style="color:blueviolet">{{ $category->name }}</b> Kategorisini Düzenle</div>
                                    <div class="col-6 d-flex justify-content-end"><a href="{{route('category.list')}}" class="btn btn-warning">Listele</a></div>
                           </div>                     
                          </div>
     
                     <div class="card-body">
     
                  <form action="{{route('category.update', $category->id)}}" method="POST">
                           @csrf <!-- hidden bir input oluşturur. Güvenlik için csrf tokenı oluşturur. -->

                           <div class="form-group">
                                    <label>Kategori Adı :</label>
                                    <input type="text" name="cat_name" class="form-control" value="{{$category->name}}">
                           </div><br>
                           <div class="form-group">
                                    <label>Url :</label>
                                    <input type="text" name="cat_slug" class="form-control" value="{{$category->slug}}">
                           </div><br>
                           <div class="form-group">
                                    <label>Durum :</label>&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="cat_status" @if($category->status == 0) checked @endif value="0"> <label>Aktif</label> &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="cat_status" @if($category->status == 1) checked @endif value="1"> <label>Pasif</label>
                           </div><br>
                           <div class="form-group">
                                    <label>Meta Title :</label>
                                    <input type="text" name="cat_title" class="form-control" value="{{$category->meta_title}}">
                           </div>
                           <div class="form-group">
                                    <label>Meta Description :</label>
                                    <input type="text" name="cat_description" class="form-control" value="{{$category->meta_description}}">
                           </div>

                           <button type="submit" class="btn btn-success mt-1">Kaydet</button>
                  </form>
                        
     
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection