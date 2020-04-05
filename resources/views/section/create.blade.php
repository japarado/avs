@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="registry-student">
    <div class="registry-student__header mt-4">student registry</div>
    <div class="registry-student__container">
        <div class="registry-student__actions border-client-yellow registry-student__actions--custom-2">
            <div class="registry-student__card">
                <div class="registry-student__card-header bg-client-yellow">sections</div>
                <div class="registry-student__card-body">
                    <div class="registry-student__card-body-container">
                        <div class="registry-student__actions">
                            <div class="registry-student__card">
                                <div class="registry-student__card-header">add</div>
                                <div class="registry-student__card-body">
                                    <form action="{{ action('SectionController@store') }}" method="post">
										@csrf
                                        <div class="form-group custom-form-input-text">
                                            <label for="exampleInputEmail1">level:</label>
                                            <select name="level" class="form-control" required>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="form-group custom-form-input-text">
                                            <label for="exampleInputEmail1">strand:</label>
											<select class="form-control" name="strand" required>
												@foreach($strands as $strand)
													<option value="{{ $strand->id }}">{{ $strand->name }}</option>
												@endforeach
											</select>
                                        </div>
                                        <div class="form-group custom-form-input-text">
                                            <label for="exampleInputEmail1">section number:</label>
                                            <input type="number" name="number" min="0" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="01" required>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit"
                                                class="btn btn-lg client-custom-button-2 no-text-shadow">ok</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="registry-student__actions-container flex-column">
                            <div class="registry-student__actions">
                                <div class="registry-student__card">
                                    <div class="registry-student__card-header">delete</div>
                                    <div class="registry-student__card-body">
                                        <div class="registry-student__card-body-container">
											<form action="{{ action("SectionController@destroy", ['id' => -1]) }}" method="post">
												@csrf
												@method('delete')
                                                <div class="form-group custom-form-input-text">
                                                    <label for="exampleInputEmail1">level:</label>
                                                    <select name="level" class="form-control" required>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>
                                                <div class="form-group custom-form-input-text">
                                                    <label for="exampleInputEmail1">strand:</label>
													<select  class="form-control" name="strand" required>
														@foreach($strands as $strand)
															<option value="{{ $strand->id }}">{{ $strand->name }}</option>
														@endforeach
													</select>
                                                </div>
                                                <div class="form-group custom-form-input-text">
                                                    <label for="exampleInputEmail1">section number:</label>
                                                    <input type="number" name="number" min="0" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="01" required>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <button type="submit"
                                                        class="btn btn-lg client-custom-button-2 no-text-shadow">ok</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center no-wrap mt-3">
                                <a href="{{route('admin.registrySectionList')}}"
                                    class="btn btn-lg client-custom-button no-text-shadow">View list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</article>
<div class="d-flex justify-content-center align-items-center no-wrap my-3">
    <a href="{{route('admin.registry')}}" class="btn btn-lg client-custom-button no-text-shadow">back</a>
</div>
@endsection

@section('footer')
@include('inc.admin-footer')
@endsection
