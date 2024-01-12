@extends('site.layout')

@section('content')
@if($count > 0)
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
                      <td><a href="{{ route('sepet.sil' , $product->id) }}"><img src="/images/btn_sil.png"></a></td>
                      <td>{{ $product->product_name }}</td>
                      <td>{{ $product->quantity }}</td>
                      <td>{{ $product->price }}₺</td>
                  </tr>
              @endforeach
         </tbody>
       </table>
       <br>
       <div style="text-align:right">
        <span style="font-weight: bold; color:red">Ödenecek Tutar :</span> {{ $totalPrice }}₺
       </div>
    
    </div>
    @else
    <div class="container ">
      <div style="position: absolute; top:50%;transform:translateX(-50%);left: 50%;text-align:center;" >
        <h4>Sepetinizde ürün bulunmamaktadır.</h4><br>
        <a href="/home" class="btn btn-warning"><span style="font-weight:bold">Ürünleri incelemek için tıklayınız.</span></a>
      </div>
    </div>
  @endif
@endsection
