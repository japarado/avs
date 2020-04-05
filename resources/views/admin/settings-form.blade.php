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
                <form>
                    <div class="registry-student__card-body">
                        <div class="registry-student__card-body-container">
                            <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">current</span>
                                </div>
                                <input type="text" name="current_password" class="candidates__input form-control">
                            </div>
                            <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">new</span>
                                </div>
                                <input type="text" name="new_password" class="candidates__input form-control">
                            </div>
                            <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">confirm new</span>
                                </div>
                                <input type="text" name="confirm_password" class="candidates__input form-control">
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
                    <form>
                        <div class="registry-student__card-body">
                            <div class="registry-student__card-body-container">
                                <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">new</span>
                                    </div>
                                    <input type="text" name="new_admin" class="candidates__input form-control">
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
                    <div class="registry-student__card-header bg-client-yellow">change polling station</div>
                    <form>
                        <div class="registry-student__card-body">
                            <div class="registry-student__card-body-container">
                                <div class="candidates__input-container input-group mb-3 client-custom-input-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">new</span>
                                    </div>
                                    <input type="text" name="new_polling" class="candidates__input form-control">
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
<div class="d-flex justify-content-center align-items-center no-wrap my-3">
    <a href="#" class="btn btn-lg client-custom-button no-text-shadow">back</a>
</div>
@endsection

@section('footer')
@include('inc.admin-footer')
@endsection
