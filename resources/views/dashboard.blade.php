<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

<a class="btn btn-success" href="{{ route('posts.create') }}">Create Post</a>

@if(isset($posts))

	<table class="table table-dark table-striped table-bordered">
		
		@for($i=0; $i<count($posts); $i++)

		<tr>
			<td>
				<a class="btn btn-primary" href="{{route('posts.edit', ['post' => $posts[$i]->id])}}">Edit Post</a>

				<a 
					href="#" 
					onclick="document.getElementById('deleter{{$i}}').submit();" 
					class="btn btn-danger">	
						Delete Post
					</a>

				<form id="deleter{{$i}}" 
					action="{{  
						route('posts.destroy', 
							['post' => $posts[$i]->id]) 
						}}" 
				method="post">

					@method('DELETE')

					@csrf

				</form>

				{{ $posts[$i]->subject  }}</td>
		</tr>
		<tr>
			<td>{{ $posts[$i]->body }}</td>
		</tr>

		@endfor

	</table>

@endif
</x-app-layout>
