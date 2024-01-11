@extends('site.layout')

@section('content')

    <div class="container">
         <h4>SEPETİNİZ</h4><br><br>

    <table class="table table-sm">
         <thead>
           <tr>
             <th scope="col"></th>
             <th scope="col">Ürün Adı</th>
             <th scope="col">Adet</th>
             <th scope="col">Fiyat</th>
           </tr>
         </thead>
         <tbody>
                  @foreach ($products as $product)
                  <tr>
                      <td><img src="/images/btn_sil.png"></td>
                      <td>{{ $product->product_name }}</td>
                      <td>1</td>
                      <td>{{ $product->price }}₺</td>
                  </tr>
              @endforeach
         </tbody>
       </table>
    </div>
@endsection
