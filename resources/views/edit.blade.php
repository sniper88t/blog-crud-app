@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a Blog</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('blogs.update', $blogs->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" value={{ $blogs->title }} />
                </div>

                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" class="form-control" name="author" value={{ $blogs->author }} />
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <input type="text" class="form-control" name="content" value={{ $blogs->content }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
