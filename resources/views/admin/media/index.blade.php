@extends('layouts.app')
@section('content')
    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Media Image</label>
            <input type="file" name="file" id="file" class="form-control-file">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
    <section class="container">
        <div class="row">
            @foreach ($medias as $media)
                {{ $media->render('col-12 col-md-6') }}
            @endforeach
        </div>

    </section>

@endsection
