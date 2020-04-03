<a href="{{ action('CandidateController@create') }}">Create</a>
<table>
	@foreach($candidates as $candidate)
		<tr>
			<td>{{ $candidate->name }}</td>
			<td>{{ $candidate->strand->name }}</td>
			<td>{{ $candidate->position->name }}</td>
			<td>
				<a href="{{ action('CandidateController@edit', ['id' => $candidate->id]) }}">Edit</a>
				<a href="{{ action('CandidateController@destroy', ['id' => $candidate->id]) }}">Destroy</a>
			</td>
		</tr>
	@endforeach
</table>
