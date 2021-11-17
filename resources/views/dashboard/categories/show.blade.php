@extends('dashboard.master')
@section('content')
    <div class="form-group">
        <input readonly type="text" class="form-control" name="category" id="category"
            value="{{'category',$category->category}}">
    </div>
    <div class="mb-3">
        <a class="btn btn-danger btn-sm" href="{{URL::previous()}}">atras</a>
    </div>
@endsection
