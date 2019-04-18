@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
					All posts
				
				<a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Create new</a>
				</div>
                <div class="card-body">
                    @if($posts->count() > 0)
						<table class="table">
							 <thead>
								<tr>
								  <th scope="col">Title</th>
								  <th scope="col">Author</th>
								  <th scope="col">Published</th>
								  <th scope="col">Action</th>
								</tr>
							 </thead>
							 <tbody>
								@foreach($posts as $post)
									<tr>
										<td>{{ $post->title }}</td>
										<td>{{ $post->user->name }}</td>
										<td>{{ $post->created_at->diffForHumans() }}</td>
										<td></td>
									</tr>
								@endforeach
							 </tbody>
						</table>
					@else
						<p>There are currenty no posts.</p>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
