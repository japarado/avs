@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="registry-student">
    <div class="registry-student__header mt-4">student registry</div>
    <div class="registry-student__container flex-column">
        <div class="registry-student__actions">
            <div class="registry-student__card">
                <div class="registry-student__card-header">Students</div>
                <div class="registry-student__card-body">
                    <div class="registry-student__card-body-container">
                        <div class="registry-student__actions registry-student__actions--custom">
                            <div class="registry-student__card">
                                <div class="registry-student__card-header">add</div>
                                <div class="registry-student__card-body">
                                    <form action="{{ action("StudentController@store") }}" method="post">
										@csrf
                                        <div class="registry-student__card-body-container">
                                            <div class="candidates__input-container input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">full name</span>
                                                </div>
                                                <input type="text" name="name"
                                                    placeholder="Surname, First Name, M.I."
                                                    class="form-control"
													required>
                                            </div>
                                            <div class="candidates__form-inputs">
                                                <div class="candidates__input-container input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">student
                                                            number</span>
                                                    </div>
                                                    <input type="text" name="student_number" placeholder="2018-106296"
                                                        class="form-control"
														required>
                                                </div>
                                                <div class="candidates__input-container ml-md-3 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text"
                                                            for="inputGroupSelect01">section</label>
                                                    </div>
                                                    <select name="section" class="custom-select"
                                                        id="inputGroupSelect01" required>
														@foreach($sections as $section)
															<option value="{{ $section->id }}">{{ $section->level }} / {{ $section->strand->name }} / {{ $section->number }}</option>
														@endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="candidates__form-inputs">
                                                <div class="candidates__input-container input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">password</span>
                                                    </div>
                                                    <input type="text" name="password" placeholder="161100001"
                                                        class="form-control" 
														required>
                                                </div>
                                                <div class="candidates__input-container ml-md-3 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">cn</span>
                                                    </div>
                                                    <input type="number" name="cn" placeholder="01"
                                                        class="form-control" 
														required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-lg client-custom-button-2 no-text-shadow">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="registry-student__actions-container">
                            <div class="registry-student__actions mr-0 mr-md-3 registry-student__actions--custom">
                                <div class="registry-student__card">
                                    <div class="registry-student__card-header">delete</div>
                                    <div class="registry-student__card-body">
                                        <div class="registry-student__card-body-container">
											<form action="{{ action("StudentController@destroy", ['id' => '-1']) }}" method="post">
												@csrf 
												@method('delete')

                                                <div class="candidates__input-container input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">student
                                                            number</span>
                                                    </div>
													<select class="form-control" name="student_number" placeholder="2018-106296" required>
														<option disabled selected value></option>
														@foreach($students as $student)
															<option value="{{ $student->email }}">{{ $student->email }}</option>
														@endforeach
													</select>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <button type="submit"
                                                        class="btn btn-lg client-custom-button-2 no-text-shadow">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center no-wrap mt-3 mt-md-0">
                                <a href="{{action('StudentController@index')}}" class="btn btn-lg client-custom-button no-text-shadow">View list</a>
                            </div>
                        </div>
                        <div class="registry-student__actions-container">
                            <div class="registry-student__actions mr-0 mr-md-3 registry-student__actions--custom">
                                <div class="registry-student__card">
                                    <div class="registry-student__card-header">mass import (excel file)</div>
                                    <div class="registry-student__card-body">
                                        <div class="registry-student__card-body-container">
											<form action="{{ action("StudentController@upload") }}" method="post">
												@csrf 
												@method('post')

                                                <div class="candidates__input-container input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">student
                                                            number</span>
                                                    </div>
													<input type="file" class="form-control" required>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <button type="submit"
                                                        class="btn btn-lg client-custom-button-2 no-text-shadow">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center no-wrap mt-3">
            <a href="{{action('SuperUserController@registry')}}" class="btn btn-lg client-custom-button no-text-shadow">back</a>
        </div>
</article>
@endsection

@section('footer')
@include('inc.admin-footer')
@endsection
