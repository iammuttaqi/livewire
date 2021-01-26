@extends('layouts/app')

@section('content')
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header card-header-primary">Comments</div>
					<div class="card-body">
						<livewire:comments :allComments="$all_comments"/>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection