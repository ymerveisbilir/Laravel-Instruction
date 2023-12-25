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
                                    <div class="col-6"> {{ __('Kategori Ekle') }}</div>
                                    <div class="col-6 d-flex justify-content-end"><a href="{{route('category.list')}}" class="btn btn-warning">Listele</a></div>
                           </div>                     
                          </div>
     
                     <div class="card-body">
     
                  <form action="{{route('category.store')}}" method="POST">
                           @csrf <!-- hidden bir input oluşturur. Güvenlik için csrf tokenı oluşturur. -->

                           <div class="form-group">
                                    <label>Kategori Adı :</label>
                                    <input type="text" name="cat_name" class="form-control">
                           </div><br>
                           <div class="form-group">
                                    <label>Url :</label>
                                    <input type="text" name="cat_slug" class="form-control">
                           </div><br>
                           <div class="form-group">
                                    <label>Durum :</label>&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="cat_status" value="0"> <label>Aktif</label> &nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="cat_status" value="1"> <label>Pasif</label>
                           </div><br>
                           <div class="form-group">
                                    <label>Meta Title :</label>
                                    <input type="text" name="cat_title" class="form-control">
                           </div>
                           <div class="form-group">
                                    <label>Meta Description :</label>
                                    <input type="text" name="cat_description" class="form-control">
                           </div>

                           <button type="submit" class="btn btn-success mt-1">Kaydet</button>
                  </form>
                        
     
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection