@extends('layouts.app')
@section('content')
<div class="container">

<br>
<form action="{{ url('/producto') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('producto.form',['modo'=>'Registrar']);
    

</form>
<br>
</div>
@endsection