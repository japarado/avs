@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<article class="vote-modal position-relative py-4">
    <div class="vote-modal__container">
        <div class="vote-modal__card">
            <div class="vote-modal__card-header"><span class="vote-modal__card-header-text">PROMPT</span></div>
            <div class="vote-modal__card-body px-5">
                <div class="vote-modal__card-body-text-container">
                    <div class="vote-modal__card-body-text">
                        <div>
                            <div class="vote-modal__card-admin-text">
                                Authorized Access Only
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vote-modal__footer">
                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-lg client-custom-button vote-modal__button">ok</a>
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
