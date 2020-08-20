@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="registry-student">
    <div class="registry-student__container justify-content-center mt-md-7">

        <div class="registry-student__actions border-client-yellow registry-student__actions--custom-2 mr-lg-4 flex-basis-50">
            <div class="registry-student__card justify-content-start">
                <div class="registry-student__card-header bg-client-yellow">Change Password</div>
				<form action="{{ action('PollingStationController@updateAdminPassword', ['id' => $user->id]) }}" method="post">
					@csrf 
					@method('put')

                    <div class="registry-student__card-body">
                        <div class="registry-student__card-body-container">
                            <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">current</span>
                                </div>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>
                            <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">new</span>
                                </div>
                                <input type="password" name="new_password" class="form-control" required>
                            </div>
                            <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">confirm new</span>
                                </div>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center no-wrap my-3">
                            <button type="submit" class="btn btn-lg client-custom-button no-text-shadow">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex-basis-50">
            <div class="registry-student__actions border-client-yellow registry-student__actions--custom-2 mb-lg-4">
                <div class="registry-student__card">
                    <div class="registry-student__card-header bg-client-yellow">Change admin id</div>
					<form action="{{ action("PollingStationController@updateAdminId", ['id' => $user->id]) }}" method="post">
						@csrf
						@method('put')
                        <div class="registry-student__card-body">
                            <div class="registry-student__card-body-container">
                                <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">new</span>
                                    </div>
									<input type="text" name="new_id" class="form-control" value="{{ $user->email }}" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center no-wrap my-3">
                                <button type="submit"
                                    class="btn btn-lg client-custom-button no-text-shadow">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="registry-student__actions border-client-yellow registry-student__actions--custom-2">
                <div class="registry-student__card">
                    <div class="registry-student__card-header bg-client-yellow">change polling staton</div>
					<form action="{{ action('PollingStationController@update', ['id' => $user->pollingStation->id]) }}" method="post">
						@csrf
						@method('put')
                        <div class="registry-student__card-body">
                            <div class="registry-student__card-body-container">
                                <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">new</span>
                                    </div>
									<input type="text" name="name" class="form-control" value="{{ $user->pollingStation->name }}" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center no-wrap my-3">
                                <button type="submit"
                                    class="btn btn-lg client-custom-button no-text-shadow">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</article>
<article class="registry-student">
    <div class="registry-student__container justify-content-center mt-md-7">
        <div class="w-100">
            <div class="registry-student__actions border-client-yellow registry-student__actions--custom-2 mb-lg-4">
                <div class="registry-student__card">
                    <div class="registry-student__card-header bg-client-yellow">Instructions Page Contents</div>
					<form action="{{ action("PollingStationController@updateInstructions") }}" method="post">
						@csrf
						@method('put')
                        <div class="registry-student__card-body">
                            <div class="registry-student__card-body-container">
                                <div class="candidates__input-container input-group mb-3 client-custom-input-2">
									<textarea style="width: 100%;" id="instructions" name="instructions" cols="30" rows="10">{{ $user->pollingStation->instructions }}</textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center no-wrap my-3">
                                <button type="submit"
                                    class="btn btn-lg client-custom-button no-text-shadow">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>
</article>
<div class="d-flex justify-content-center align-items-center no-wrap my-3">
    <a href="{{ action('SuperUserController@index') }}" class="btn btn-lg client-custom-button no-text-shadow">back</a>
</div>
@endsection

@section('modal')
	@include('parts.generic-modal')
@endsection

@section('javascript')
	<script src="https://cdn.tiny.cloud/1/ald473q2wszkcp6f80q5lgj0pgmeqnwhpbnr5rabybrz621h/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: '#instructions'
		});
	</script>
@endsection

@section('footer')
@include('inc.admin-footer')
@endsection
