@extends('layouts.app')
@section('content')
    <h1>A form with all blocks and fields of a model</h1>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        @foreach ($model->getBlocks() as $key => $params)
            {{ $model->renderFields('fields', $key, $params) }}
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
