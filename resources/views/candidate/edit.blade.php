@extends('layouts/app')
@section('header')
	@include('inc/dashboard-header')
@endsection
@section('content')
	<article class="candidates candidates--layout-1">
		<div class="candidates__container candidates__container--layout-1">
			<div class="candidates__header">
				<div class="candidates__header-container mb-4">candidate info</div>
			</div>
			<form class="candidates__form" action="{{ action("CandidateController@update", ['id' => $candidate->id]) }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('put')
				<div class="candidates__body">
					<div class="candidates__body-container">
						<div class="candidates__input-container input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon1">full name</span>
							</div>
							<input type="text" name="name" class="candidates__input form-control" value="{{ $candidate->name }}" required>
						</div>
						<div class="candidates__form-inputs">
							<div class="candidates__input-container input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">strand</label>
								</div>
								<select name="strand" class="candidates__input custom-select" id="inputGroupSelect01" required>
									@foreach($strands as $strand)
										<option value="{{ $strand->id }}" {{ $strand->id === $candidate->strand_id ? "selected" : "" }}>{{ $strand->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="candidates__input-container ml-md-3 input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">position</label>
								</div>
								<select name="position" class="candidates__input custom-select" id="inputGroupSelect01" required>
									@foreach($positions as $position)
										<option value="{{ $position->id }}" {{ $position->id === $candidate->position_id ? "selected" : "" }}>{{ $position->name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="candidates__file-input d-flex justify-content-start align-items-center">
							<div class="candidates__input-container w-auto input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupFileAddon01">image file</span>
								</div>
								<div class="candidates__input-file">
									<div class="client-custom-file-input custom-file">
										<input name="image" onchange="checkFile(event)" type="file" class="custom-file-input"
																								   id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
										<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
									</div>
								</div>
							</div>
							<div class="ml-4 candidates__input-check" id="js-file-chosen">
								{{ basename($candidate->image) }}
							</div>
						</div>
					</div>
				</div>

				<div class="d-flex justify-content-center my-4">
					<button class="btn btn-lg client-custom-button mx-4">Update</button>
					<a href="{{ action('CandidateController@index') }}" class="btn btn-lg client-custom-button-2 mx-4">Back</a>
				</div>

			</form>
		</div>
	</article>
@endsection

@section('footer')
	@include('inc.admin-footer')
@endsection

@section('javascript')
	<script>
		function checkFile(e) {
			const target = e.target;
			const fileName = target.value.replace(/^.*[\\\/]/, '');
			target.nextElementSibling.innerHTML = fileName;
			if(fileName){
				document.getElementById("js-file-chosen").innerHTML = "";
			}
		}
	</script>
@endsection
