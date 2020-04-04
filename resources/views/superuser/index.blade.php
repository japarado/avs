@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="admin-dashboard">
    <div class="admin-dashboard__container">
        <div class="admin-dashboard__actions">
            <div class="admin-dashboard__card">
                <div class="admin-dashboard__card-body">
                    <div class="admin-dashboard__card-body-container">
                        <div class="d-flex flex-column">
                            <div class="admin-dashboard__button-container">
                            <a href="{{action('CandidateController@index')}}" class="btn btn-lg client-custom-button admin-dashboard__button">edit candidates</a>
                            </div>
                            <div class="admin-dashboard__button-container">
                                <a href="{{action('registry')}}" class="btn btn-lg client-custom-button-2 admin-dashboard__button">student registry</a>
                            </div>
                            <div class="admin-dashboard__button-container">
                                <a class="btn btn-lg client-custom-button admin-dashboard__button">results</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="admin-dashboard__actions">
            <div class="admin-dashboard__card">
                <div class="admin-dashboard__card-header">
                    <div class="admin-dashboard__card-title">admin id: {{ $id }}</div>
                    <div class="admin-dashboard__card-content">
                        Polling station<br />rm. 7d<br />Buenaventura garcia paredes O.P.
                    </div>
                </div>
                <div class="admin-dashboard__card-body">
                    <div class="admin-dashboard__card-body-container">
                        <div class="d-flex flex-column">
                            <div class="admin-dashboard__button-container">
                                <a class="btn btn-lg client-custom-button-2 admin-dashboard__button">settings</a>
                            </div>
                            <div class="admin-dashboard__button-container">
                                <form>
                                    <button class="btn btn-lg client-custom-button admin-dashboard__button">logout</button>
                                </form>
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
