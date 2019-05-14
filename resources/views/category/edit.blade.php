@extends('master')
@section('content')
    <div class="container">
        <form method="post" action="{{action('CategoryController@update', $id)}}">
            <div class="form-group row">
                {{csrf_field()}}
                <label for="Input1" class="col-sm-2">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Input1" value="{{ $categories->name }}" placeholder="name" name="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Input2" class="col-sm-2">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Input2" value="{{ $categories->description }}" placeholder="description" name="description" required>
                </div>
            </div>

            <div class="form-group row">
                <button type="submit" class="btn btn-primary width100">Update</button>
            </div>
        </form>
    </div>
@endsection