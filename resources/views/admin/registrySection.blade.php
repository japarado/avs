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
                <div class="registry-student__card-header bg-client-yellow">Students</div>
                <div class="registry-student__card-body">
                    <div class="registry-student__card-body-container">
                        <div class="registry-student__actions">
                            <div class="registry-student__card">
                                <div class="registry-student__card-header">add</div>
                                <div class="registry-student__card-body">
                                    <form>
                                        <div class="form-group custom-form-input-text">
                                            <label for="exampleInputEmail1">level:</label>
                                            <select name="level" class="form-control">
                                                <option value="-1" selected>Choose...</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="form-group custom-form-input-text">
                                            <label for="exampleInputEmail1">strand:</label>
                                            <input type="text" name="strand" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ABM">
                                        </div>
                                        <div class="form-group custom-form-input-text">
                                            <label for="exampleInputEmail1">section number:</label>
                                            <input type="number" name="section" min="0" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="01">
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
                                            <form>
                                                <div class="form-group custom-form-input-text">
                                                    <label for="exampleInputEmail1">level:</label>
                                                    <select name="level" class="form-control">
                                                        <option value="-1" selected>Choose...</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>
                                                <div class="form-group custom-form-input-text">
                                                    <label for="exampleInputEmail1">strand:</label>
                                                    <input type="text" name="strand" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="ABM">
                                                </div>
                                                <div class="form-group custom-form-input-text">
                                                    <label for="exampleInputEmail1">section number:</label>
                                                    <input type="number" name="section" min="0" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="01">
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

        <div class="d-flex justify-content-center align-items-center no-wrap mt-3">
            <a href="{{route('admin.registry')}}" class="btn btn-lg client-custom-button no-text-shadow">back</a>
        </div>
</article>
@endsection

@section('footer')
@include('inc.admin-footer')
@endsection
