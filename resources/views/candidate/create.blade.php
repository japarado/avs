<form action="{{ action('CandidateController@store') }}" method="post">
	@csrf


	Name <input type="text" name="name"/>
	<select name="strand">
		@foreach($strands as $strand)
			<option value="{{ $strand->id }}">{{ $strand->name }}</option>
		@endforeach
	</select>

	<select name="position">
		@foreach($positions as $position)
			<option value="{{ $position->id }}">{{ $position->name }}</option>
		@endforeach
	</select>


	<input type="submit" value="Submit">
</form>
<a href="{{ action('CandidateController@index') }}">Back</a>
