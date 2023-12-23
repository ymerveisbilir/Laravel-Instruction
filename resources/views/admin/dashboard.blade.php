@extends('layouts.app')

@section('content')

<div class="header" id="header" style="padding: 0px 16px;background: #555;color: #f1f1f1;">
         <p style="text-align:center;">Admin Panele Hoşgeldiniz...</p>
</div>
<div class="container" style="background-color:antiquewhite; width: 210px;height: 100px;">
         <div style="float:inline-start">
                   <img src="https://tr.seaicons.com/wp-content/uploads/2017/03/library-icon-1-1.png" style=" width:95px; height:95px;" >
         </div>
         <div class="content" style="padding:13px">
                  <span style="font-weight:bold;color:blue">Tüm Kitaplar</span><br>
                  <span>Adet : {{$book}}</span>
         </div>

</div>


@endsection