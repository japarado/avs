@extends('layouts/app')
@section('header')
	@include('inc/dashboard-header')
@endsection
@section('content')
	<article class="student-list">
		<div class="student-list__container">
			<div class="student-list__actions">
				<div class="student-list__card">

					@foreach($sections as $section)
						<div>
							<div class="student-list__card-header">{{ $section->level }} {{ $section->strand->name }} {{ $section->number }} </div>
							<div class="student-list__card-body px-0">
								<div class="student-list__card-body-container">
									<div class="candidates__position-body">
										<div class="candidates__position-body-container">
											<div class="candidates__table-container mx-0 mx-md-4">
												<table class="candidates__table student-list__table">
													<thead>
														<tr>
															<th>status</th>
															<th>cn</th>
															<th>student number</th>
															<th>full name</th>
															<th>password</th>
														</tr>
													</thead>
													<tbody>
														@foreach($section->students as $student)
															<tr class="">
																<td>{{ count($student->candidates) > 0 ? "Voted" : "No Vote" }}</td>
																<td>{{ $student->class_number }}</td>
																<td>{{ $student->email }}</td>
																<td>{{ $student->name }}</td>
																<td>Password Here</td>
															</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					<div class="d-flex justify-content-center align-items-center my-3">
						<a href="{{route('students.create')}}"
						   class="btn btn-lg client-custom-button-2 no-text-shadow">return</a>
					</div>
				</div>
			</div>
	</article>
@endsection

@section('footer')
	@include('inc.admin-footer')
@endsection
