@extends('master')
@section('content')
    <div class="container">
        <form method="post" action="{{url('category')}}">
            <div class="form-group row">
                {{csrf_field()}}
                <label for="Input1" class="col-sm-2">Name Category</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Input1" placeholder="name" name="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="Input2" class="col-sm-2">Descriptiont</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Input2" placeholder="description" name="description" required>
                </div>
            </div>

            <div class="form-group row">
                <input type="submit" class="btn btn-primary width100">
            </div>
        </form>
    </div>
@endsection