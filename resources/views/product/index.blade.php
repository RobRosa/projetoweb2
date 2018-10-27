@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<h2>Product List</h2>
			</div>
			<div class="col-md-2">
				<a class="btn btn-primary" href="{{ route('product.create') }}" title="Create">Create</a>
			</div>
		</div>
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
		<table class="table">
			<tr>
				<th>Nro</th>
				<th>Name</th>
				<th>Description</th>
				<th>Btn</th>
			</tr>
			@foreach ($products as $row)
				<tr>
					<td>{{ ++$i }}.</td>
					<td>{{ $row->name }}</td>
					<td>{{ $row->description }}</td>
					<td>
						<form action="{{ route('product.destroy', $row->id) }}" method="post">
							<a class="btn btn-success" href="{{ route('product.show', $row->id) }}" title="show">Show</a>
							<a class="btn btn-warning" href="{{ route('product.edit', $row->id) }}" title="edit">Edit</a>
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection