@extends('layouts/app')
@section('header')
	@include('inc/dashboard-header')
@endsection
@section('content')
	<section class="vote py-4">
		<article class="vote__container">

			<form id="js-vote-form" method='post' action="{{ action("VoteController@overview") }}">
				@csrf

				@foreach($positions as $position)
					<div class="vote__type">
						<div class="vote__header"><span>{{ $position->name }}</span></div>
						<div class="vote__body">
							<div class="vote__body-container">
								@foreach ($position->candidates as $candidate)
									@if($candidate->type === config('constants.candidatetypes.regular'))
										<div class="vote__entry">
											<div class="vote__img-container">
												<img class="vote__img" src="{{ $candidate->image ? url("storage/$candidate->image") : 'https://picsum.photos/id/870/1200' }}" alt="candidate image" />
											</div>
											<div class="vote__name">

												<div class="form-group">
													<label class="custom-radio-button">{{ $candidate->name }}
														<input type="radio" value="{{ $candidate->id }}"
																			name="{{ $position->id }}">
																			<span class="checkmark"></span>
													</label>
												</div>
											</div>
										</div>
									@endif
								@endforeach

								@foreach($position->candidates as $candidate)
									@if($candidate->type === config('constants.candidatetypes.abstain'))
										<div class="vote__entry vote__entry--padding">
											<div class="form-group">
												<label class="custom-radio-button text-uppercase">abstain
													<input type="radio" value="{{ $candidate->id }}" name="{{ $position->id }}">
													<span class="checkmark"></span>
												</label>
											</div>
										</div>
									@endif
								@endforeach

							</div>
						</div>
					</div>
				@endforeach

				<div class="d-flex justify-content-center">
					<button type="submit" class="btn btn-lg client-custom-button">Vote</button>
				</div>
			</form>

		</article>
	</section>
@endsection

@section('footer')
@include('inc/footer')
@endsection

@section('modal')
	@if(session("show-vote-modal"))
		@include('parts.vote-modal')
	@endif

	@if(session('show-vote-prompt'))
		@include('parts.vote-prompt')
	@endif
@endsection

@section('javascript')
	<script>

		const params = new URLSearchParams(document.location.search.substring(1));

var positionsText = document.getElementById("js-positions");
var voteModal = document.getElementById("js-vote-modal");
var voteForm = document.getElementById("js-vote-form");
var votePrompt = document.getElementById('js-vote-prompt')

if(params.get('showVotePrompt')){
	votePrompt.classList.remove('d-none');
}

function submitVote(e){
	var presidentElements = document.getElementsByName('president_vote');
	var vicePresidentElements = document.getElementsByName('vice_president_vote');
	var secretaryElements = document.getElementsByName('secretary_vote');
	var treasurerElements = document.getElementsByName('treasurer_vote');
	var auditorElements = document.getElementsByName('auditor_vote');
	var votes = {
		President:getValue(presidentElements),
		"Vice President": getValue(vicePresidentElements),
		Secretary: getValue(secretaryElements),
		Treasurer: getValue(treasurerElements),
		Auditor: getValue(auditorElements),
	}
	var missingValues = setMissingValues(votes);
	if(missingValues.length <= 0){
		return true;
	}
	positionsText.innerHTML = `It appears that you do not have an answer for (${missingValues.join(', ')}), if you don't want to vote in the said position click abstain.`;
	voteModal.classList.remove('d-none');
	e.preventDefault();
	return false;
}

function getValue(list) {
	var value = ""

	for(var i=0;i<list.length;i++){
		if (list[i].checked) {
			value=list[i].value;
		}
	}
	return value;
}

function setMissingValues(votes) {
	var values = [];
	for(var i=0;i<Object.keys(votes).length;i++){
		if(!votes[Object.keys(votes)[i]]){
			values.push(Object.keys(votes)[i]);
		}
	}
	return values;
}

function hideModal(){
	voteModal.classList.add('d-none');
}

function hideVotePrompt(){
	votePrompt.classList.add('d-none');
	params.set('showVotePrompt',false)
}
	</script>
@endsection
