@extends('layouts.app')

@push('scripts')
<!-- CKEDITOR -->
<script type="text/javascript" src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
@endpush

@push('script')
CKEDITOR.replace('content');
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
					Create new post
				</div>
                <div class="card-body">
					<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" id="title" class="form-control"/>
							{!! $errors->has('title') ?  $errors->first('title', '<p class="text-danger">:message</p>') : '' !!}
						</div>
						
						<div class="form-group">
							<label for="content">Content</label>
							<textarea name="content" id="content" class="form-control" rows="10"></textarea>
						</div>
						
						<div class="form-group">
							<label for="image">Image</label>
							<input type="file" name="image" id="image" class="form-control"/>
							{!! $errors->has('image') ?  $errors->first('image', '<p class="text-danger">:message</p>') : '' !!}
						</div>
						
						<div class="form-group">
						
						{{ csrf_field() }}
							<button class="btn btn-primary">Create Post</button>
						</div>
 
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
