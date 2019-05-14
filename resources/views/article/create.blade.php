@extends('master')
@section('content')
    <div class="container">
        <form method="post" action="{{url('article')}}" enctype="multipart/form-data">
            <div class="form-group row">
                {{csrf_field()}}
                <label for="Input1" class="col-sm-2">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Input1" placeholder="name" name="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Input2" class="col-sm-2">Content</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Input2" placeholder="content" name="content" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="file" class="col-sm-2">File</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="file" placeholder="file" name="file" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Input3" class="col-sm-2">Country</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control" id="Input3" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <input type="submit" class="btn btn-primary width100">
            </div>
        </form>
    </div>
@endsection