<a href="{{ action('CandidateController@create') }}">Create</a>
<table>
	@foreach($candidates as $candidate)
		<tr>
			<td>{{ $candidate->name }}</td>
			<td>{{ $candidate->strand->name }}</td>
			<td>{{ $candidate->position->name }}</td>
			<td>
				<a href="{{ action('CandidateController@edit', ['id' => $candidate->id]) }}">Edit</a>
			</td>
			<td>
				<form action="{{ action('CandidateController@destroy', ['id' => $candidate->id]) }}" method="post">
					@csrf 
					@method('DELETE')
					<button type="submit">Delete</button>
				</form>
			</td>
		</tr>
	@endforeach
</table>
