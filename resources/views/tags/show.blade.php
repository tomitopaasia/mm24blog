@extends('partials.layout')
@section('content')
    <div class="container mx-auto">
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
        <div class="card bg-base-300 shadow-sm">
            <table class="table table-zebra">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $tag->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $tag->name }}</td>
                    </tr>
                    <tr>
                        <th>Posts</th>
                        <td>{{ $posts->count() }}</td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td>{{ $tag->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated</th>
                        <td>{{ $tag->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="grid grid-cols-4 gap-2 mt-2">
            @foreach ($posts as $post)
                @include('partials.post-card')
            @endforeach
        </div>
    </div>
@endsection
