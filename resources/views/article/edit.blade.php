@extends('master')
@section('content')
    <div class="container">
        <form method="post" action="{{action('BlogController@update', $id)}}">
            <div class="form-group row">
                {{csrf_field()}}
                <label for="Input1" class="col-sm-2">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Input1" value="{{ $articles->name }}" placeholder="name" name="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Input2" class="col-sm-2">Content</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Input2" value="{{ $articles->content }}" placeholder="content" name="content" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="file" class="col-sm-2">File</label>
                <div class="col-sm-10">
                    <input type="text" value="{{ $articles->file }}"  class="form-control"><br>
                    <input type="file" class="form-control" id="file"  placeholder="file" name="file">
                </div>
            </div>
            <div class="form-group row">
                <label for="Input3" class="col-sm-2">Country</label>
                <div class="col-sm-10">
                    <select name="country" class="form-control" id="Input3">
                        <option value="{{ $articles->category_id }}">{{ $articles->category_id }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <button type="submit" class="btn btn-primary width100">Update</button>
            </div>
        </form>
    </div>
@endsection