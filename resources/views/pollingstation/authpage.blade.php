@extends('layouts/app')
@section('header')
	@include('inc/dashboard-header')
@endsection

@if(session('show-auth-key-settings-modal'))
	@include('parts.authorization-key-settings-modal')
@else 
	@section('content')
		<article class="login-modal position-relative py-3">
			<div class="login-modal__container">
				<div class="login-modal__card">
					<div class="login-modal__card-header"><span
						 class="login-modal__card-header-text no-text-shadow text-uppercase no-letter-spacing px-sm-4">authorization
						 key</span></div>
					<div class="login-modal__card-body">
						<form action="{{ action("PollingStationController@auth") }}" method="post">
							@csrf
							<div class="login-modal__card-body-text-container">
								<span class="login-modal__card-body-text">
									<div class="form-group custom-form-input-text">
										<input type="text" name="auth_key" min="0" autocomplete="off" class="form-control no-letter-spacing" autofocus>
									</div>
								</span>
							</div>
							<div class="login-modal__footer">
								<div class="d-flex justify-content-center mt-3">
									<button type="submit"
											class="btn btn-lg client-custom-button login-modal__button">submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</article>
	@endsection
@endif


@section('footer')
	@include('inc.admin-footer')
@endsection
