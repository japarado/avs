@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="admin-dashboard">
    <div class="admin-dashboard__header mt-4">student registry</div>
    <div class="admin-dashboard__container">
        <div class="admin-dashboard__actions">
            <div class="admin-dashboard__card">
                <div class="admin-dashboard__card-body">
                    <div class="admin-dashboard__card-body-container">
                        <div class="d-flex flex-column">
                            <div class="admin-dashboard__button-container">
                                <a href="{{action('SectionController@create')}}" class="btn btn-lg client-custom-button admin-dashboard__button">sections</a>
                            </div>
                            <div class="admin-dashboard__button-container">
                                <a href="{{action('StudentController@create')}}" class="btn btn-lg client-custom-button-2 admin-dashboard__button">students</a>
                            </div>
                            <div class="admin-dashboard__button-container">
                                <a href="{{action('SuperUserController@index')}}" class="btn btn-lg client-custom-button admin-dashboard__button">back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection

@section('footer')
    @include('inc.admin-footer')
@endsection
