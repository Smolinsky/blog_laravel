@extends('master')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category['name']}}</td>
                    <td>{{$category['description']}}</td>
                    <td><a href="{{action('BlogController@create', $category['id'])}}" class="btn btn-info">Create post</a></td>
                    <td><a href="{{action('CategoryController@edit', $category['id'])}}" class="btn btn-info">Edit</a></td>
                    <td>
                        <form action="{{action('CategoryController@destroy', $category['id'])}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-default width100" href="category/create">Create</a>
    </div>
@endsection