@extends('site.layout')

@section('content')

<h1>SEPETİNİZ</h1>

@foreach($products as $product)
{{ $product->name }}
@endforeach

@endsection