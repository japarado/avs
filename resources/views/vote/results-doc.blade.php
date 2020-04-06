@extends('layouts/app')

@section('content')
<article class="result-doc">
    <div class="result-doc__container">
        <div class="result-doc__logo-container">
            <img class="result-doc__logo-pru" src="{{asset('img/pru.png')}}" />
        </div>
        <div class="">
            <div class="result-doc__header">
                <div class="result-doc__header-container">
                    <div class="result-doc__logo">
                        <img class="result-doc__logo-img" src="{{asset('img/doc-header.png')}}" />
                    </div>
                    <div class="result-doc__header-text">
                        <span class="result-doc__header-title">results</span>
                        <div class="result-doc__header-content">
                            Rm. 7D Buenaventura Garcia Paredes, O.P.<br/>March 21, 2020
                        </div>
                    </div>
                </div>
            </div>
            <div class="result-doc__body">
                <div class="result-doc__body-container">
					@foreach($sections as $section)
						<table class="result-doc__table">
							<thead>
								<tr>
									<th colspan="2">{{ $section->level }}{{ $section->strand->name }}{{ $section->number }}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Voted</td>
									<td>{{ $section->voted_count }}</td>
								</tr>
								<tr>
									<td>No Vote</td>
									<td>{{ $section->no_vote_count }}</td>
								</tr>
								<tr>
									<td>Voted</td>
									<td>{{ $section->population }}</td>
								</tr>
								<tr class="result-doc__table-row-custom">
									<td>Vote Percentage</td>
									<td>{{ $section->vote_percentage }}</td>
								</tr>
							</tbody>
						</table>
					@endforeach
					<hr class="w-100 border">

					@foreach($positions as $position)
						<table class="result-doc__table">
							<thead>
								<tr>
									<th colspan="2">{{ $position->name }}</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Name</td>
									<td>Votes</td>
								</tr>
								@foreach($position->candidates as $candidate)
									<tr>
										@if($candidate->type === config('constants.candidatetypes.abstain'))
											<td>Abstain</td>
										@else 
											<td>{{ $candidate->name }}</td>
										@endif

										<td>{{ $candidate->votes }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					@endforeach

               </div>
            </div>
            <div class="result-doc__footer">
                <div class="result-doc__footer-container">
                    <div class="result-doc__footer-body">
                        <div class="result-doc__footer-text">
                            I agree that the result presented above is accurate according to the UST SHS IURIS SYSTEM:
                        </div>
                        <div class="result-doc__sign result-doc__footer-text">
                            Signature Over Printed Name of Polling Station Deputy
                        </div>
                        <div class="result-doc__footer-text">
                            Double Checked by:
                        </div>
                        <div class="result-doc__sign result-doc__footer-text">
                            Signature Over Printed Name of Legal Division
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection 
