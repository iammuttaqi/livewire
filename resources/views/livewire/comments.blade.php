<div>
	
	@if (session()->has('message'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>{{ session('message') }}</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif

    <form class="input-group mb-3" wire:submit.prevent="store">
	  <input type="text" class="form-control" wire:model="comment" placeholder="Comment" aria-label="Comment" aria-describedby="button-addon2">
	  <button type="submit" class="btn btn-success" id="button-addon2">Submit</button>
	</form>
	@foreach ($comments as $comment)
		<div class="card">
			<div class="card-body">
				<div>
					<h4 class="d-inline">{{ $comment->author->name }}</h4>
					<span class="d-inline px-2 font-italic">{{ $comment->created_at->diffForHumans() }}</span>
					<button class="btn btn-sm btn-danger float-right" wire:click="destroy({{ $comment->id }})"><span aria-hidden="true">&times;</span></button>
				</div>
				<p class="mt-2">{{ $comment->comment }}</p>
			</div>
		</div>
	@endforeach
</div>