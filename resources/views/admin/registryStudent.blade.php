@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="registry-student">
    <div class="registry-student__header mt-4">student registry</div>
    <div class="registry-student__container">
        <div class="registry-student__actions">
            <div class="registry-student__card">
                <div class="registry-student__card-header">Students</div>
                <div class="registry-student__card-body">
                    <div class="registry-student__card-body-container">
                        <div class="registry-student__actions registry-student__actions--custom">
                            <div class="registry-student__card">
                                <div class="registry-student__card-header">add</div>
                                <div class="registry-student__card-body">
                                    <form>
                                        <div class="registry-student__card-body-container">
                                            <div class="candidates__input-container input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">full name</span>
                                                </div>
                                                <input type="text" name="full_name"
                                                    placeholder="surname, first name, m.i."
                                                    class="candidates__input form-control">
                                            </div>
                                            <div class="candidates__form-inputs">
                                                <div class="candidates__input-container input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">student
                                                            number</span>
                                                    </div>
                                                    <input type="text" name="student_number" placeholder="2018-106296"
                                                        class="candidates__input form-control">
                                                </div>
                                                <div class="candidates__input-container ml-md-3 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text"
                                                            for="inputGroupSelect01">section</label>
                                                    </div>
                                                    <select name="section" class="candidates__input custom-select"
                                                        id="inputGroupSelect01">
                                                        <option value="-1" selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="candidates__form-inputs">
                                                <div class="candidates__input-container input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">password</span>
                                                    </div>
                                                    <input type="text" name="password" placeholder="161100001"
                                                        class="candidates__input form-control">
                                                </div>
                                                <div class="candidates__input-container ml-md-3 input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text"
                                                            for="inputGroupSelect01">strand</label>
                                                    </div>
                                                    <select name="strand" class="candidates__input custom-select"
                                                        id="inputGroupSelect01">
                                                        <option value="-1" selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit"
                                                class="btn btn-lg client-custom-button-2 no-text-shadow">Submit</button>
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
                                            <form>
                                                <div class="candidates__input-container input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">student
                                                            number</span>
                                                    </div>
                                                    <input type="text" name="student_number" placeholder="2018-106296"
                                                        class="candidates__input form-control">
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
                                <a href="{{route('admin.registryStudentList')}}" class="btn btn-lg client-custom-button no-text-shadow">View list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center no-wrap mt-3">
            <a href="{{route('admin.registry')}}" class="btn btn-lg client-custom-button no-text-shadow">back</a>
        </div>
</article>
@endsection

@section('footer')
@include('inc.admin-footer')
@endsection
