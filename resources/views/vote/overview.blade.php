@extends('layouts/app')
@section('header')
	@include('inc/dashboard-header')
@endsection
@section('content')
	<section class="overview py-4">
		<article class="overview__container">
			<form>
				<div class="overview__type">
					<div class="overview__header"><span>Overview</span></div>
					<div class="overview__body">
						<div class="overview__body-container">
							@foreach($candidates as $candidate)
								@if($candidate['type'] == 'president')
									<div class="overview__entry">
										<div class="overview__title"><span>President</span></div>
										<div class="overview__value">
											<input type="hidden" value="1" />
											<textarea class="overview__input form-control"
													  name="president">{{$candidate['name']}}</textarea>
										</div>
									</div>
								@endif
								@if($candidate['type'] == 'vice_president')
									<div class="overview__entry">
										<div class="overview__title"><span>Vice President</span></div>
										<div class="overview__value">
											<input type="hidden" value="1" />
											<textarea class="overview__input form-control"
													  name="vice_president">{{$candidate['name']}}</textarea>
										</div>
									</div>
								@endif
								@if($candidate['type'] == 'secretary')
									<div class="overview__entry">
										<div class="overview__title"><span>Secretary</span></div>
										<div class="overview__value">
											<input type="hidden" value="1" />
											<textarea class="overview__input form-control"
													  name="secretary">{{$candidate['name']}}</textarea>
										</div>
									</div>
								@endif
								@if($candidate['type'] == 'treasurer')
									<div class="overview__entry">
										<div class="overview__title"><span>Treasurer</span></div>
										<div class="overview__value">
											<input type="hidden" value="1" />
											<textarea class="overview__input form-control"
													  name="treasurer">{{$candidate['name']}}</textarea>
										</div>
									</div>
								@endif

								@if($candidate['type'] == 'auditor')
									<div class="overview__entry">
										<div class="overview__title"><span>Auditor</span></div>
										<div class="overview__value">
											<input type="hidden" value="1" />
											<textarea class="overview__input form-control"
													  name="auditor">{{$candidate['name']}}</textarea>
										</div>
									</div>
								@endif
							@endforeach
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center">
					<a href="{{route('dashboard.vote',['showVotePrompt'=>true])}}" class="btn btn-lg client-custom-button-2">I
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
