<x-app-layout>

@if(Request::is('posts/create'))

	@section('title', 'Create Post')

@elseif(Request::is('posts/*/edit'))

	@section('title', 'Edit Post')

@endif

    <x-slot name="header">
    </x-slot>


<div class="form-group">


@if(Request::is('posts/create'))

	<form action="{{route('posts.store')}}" method="post">

@elseif(Request::is('posts/*/edit'))

	<form action="{{route('posts.update', ['post' => $post->id])}}" method="post">

@endif
	@csrf
		<br />

		<br />

		<br />

@if(Request::is('posts/create'))

		<input 
			class="form-control" 
			type="text" 
			name="subject"
			placeholder="Subject" />

		<br />

		<br />

		<br />



		<textarea 
			class="form-control" 
			name="body"
			placeholder="Body" ></textarea>

@elseif(Request::is('posts/*/edit'))

@method('put')
		<input 
			class="form-control" 
			type="text" 
			name="subject"
			placeholder="Subject"
			value="{{ $post->subject  }}" />

		<br />

		<br />

		<br />



		<textarea 
			class="form-control" 
			name="body"
			placeholder="Body" >{{$post->body}}</textarea>

@endif
		<input type="submit" class="btn btn-success form-control" />

	</form>
</div>

</x-app-layout>
