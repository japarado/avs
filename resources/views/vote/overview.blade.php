@extends('layouts/app')
@section('header')
	@include('inc/dashboard-header')
@endsection
@section('content')
	<section class="overview py-4">
		<article class="overview__container">
			<form action="{{ action('VoteController@store') }}" method="post">
				@csrf
				<div class="overview__type">
					<div class="overview__header"><span>Overview</span></div>
					<div class="overview__body">
						<div class="overview__body-container">
							@foreach($positions as $position)
								<div class="overview__entry">
									<div class="overview__title"><span>{{ $position->name }}</span></div>
									@foreach($position->candidates as $candidate)
										<div class="overview__value">
											<input type="hidden" name="{{ $position->id }}" value="{{ $candidate->id }}" />
											<div class="overview__input form-control">
												{{$candidate->type === config('constants.candidatetypes.regular') ? $candidate->name : 'abstain' }}
											</div>
										</div>
									@endforeach
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<a href="{{ action('VoteController@restart') }}" class="btn btn-lg client-custom-button-2">I
						change my
						mind</a>
					<button type="submit" class="btn btn-lg client-custom-button ml-4">Vote</button>
				</div>
			</form>
		</article>
	</section>
@endsection

@section('footer')
@include('inc/footer')
@endsection
