
<form action="{{ action('CandidateController@update', ['id' => $candidate->id]) }}" method="post">
	@csrf
	@method('PUT')


	Name <input type="text" name="name" value="{{ $candidate->name }}"/>
	<select name="strand">
		@foreach($strands as $strand)
			@if($candidate->strand_id === $strand->id)
				<option value="{{ $strand->id }}" selected>{{ $strand->name }}</option>
			@else 
				<option value="{{ $strand->id }}">{{ $strand->name }}</option>
			@endif
		@endforeach
	</select>

	<select name="position">
		@foreach($positions as $position)
			@if($candidate->position_id === $position->id)
				<option value="{{ $position->id }}" selected>{{ $position->name }}</option>
			@else 
				<option value="{{ $position->id }}">{{ $position->name }}</option>
			@endif
		@endforeach
	</select>

	<input type="submit" value="Submit">
</form>
<a href="{{ action('CandidateController@index') }}">Back</a>
