@extends('master')
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Content</th>
                <th>FolderFile</th>
                <th>Category_id</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article['name']}}</td>
                    <td>{{$article['content']}}</td>
                    <td>{{$article['file']}}</td>
                    <td>{{$article['category_id']}}</td>
                    <td><a href="{{action('BlogController@edit', $article['id'])}}" class="btn btn-info">Edit</a></td>
                    <td>
                        <form action="{{action('BlogController@destroy', $article['id'])}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-default width100" href="article/create">Create</a>
    </div>
@endsection