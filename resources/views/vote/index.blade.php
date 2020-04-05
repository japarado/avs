@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="candidates">
    <div class="candidates__container">
        <div class="candidates__body">
            <div class="candidates__body-container">
                {{-- CUT --}}
                @foreach ($positions as $position)
                <div class="candidates__position">
                    <div class="candidates__position-container">
                    <div class="candidates__position-header">{{$position['name']}}</div>
                        <div class="candidates__position-body">
                            <div class="candidates__position-body-container">
                                <div class="candidates__table-container">
                                    <table class="candidates__table">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>strand</th>
                                                <th>position</th>
                                                <th>votes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@if(count($position->candidates) > 0)
												@foreach ($position->candidates as $candidate)
													@if($candidate->type === config('constants.candidatetypes.abstain'))
														<td>abstain</td>
														<td>-</td>
														<td>-</td>
														<td>{{ $candidate->votes }}</td>
													@else 
														<tr>
															<td>{{ $candidate->name }}</td>
															<td>{{ $candidate->strand->name }}</td>
															<td>{{ $position->name }}</td>
															<td>{{ $candidate->votes }}</td>
														</tr>
													@endif
												@endforeach
											@else
												<tr>
													<td>-</td>
													<td>-</td>
													<td>-</td>
													<td>-</td>
												</tr>
											@endif
											<tr>
												<td colspan="3">total</td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
		<div class="d-flex justify-content-center mb-4">
			<button class="btn btn-lg client-custom-button">printable form</button>
		</div>
		<div class="d-flex justify-content-center mb-4">
			<a href="{{route('admin.dashboard')}}" class="btn btn-lg client-custom-button">Home</a>
		</div>
	</div>
</article>
@endsection

@section('footer')
	@include('inc.admin-footer')
@endsection
