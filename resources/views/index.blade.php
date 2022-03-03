@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="d-flex fles-row justify-content-between">
                <h1 class="display-3">Blogs Test Project</h1>
                <a href="{{ route('blogs.create')}}" class="btn btn-primary mt-3" style="width:120px;height:50px">New Blog</a>
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td>Content</td>
                    <td colspan = 2>Actions</td>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->id}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->author}}</td>
                        <td>{{$blog->content}}</td>
                        <td>
                            <a href="{{ route('blogs.edit',$blog->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('blogs.destroy', $blog->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
