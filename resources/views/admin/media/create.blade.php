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
@endsection
