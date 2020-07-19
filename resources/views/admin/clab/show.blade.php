@extends('layouts.app')
@section('content')
   @foreach ($model->blocks as $key => $value)
       {{ $model->renderBlock($value->type, $value->data) }}
    @endforeach
@endsection
