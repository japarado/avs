@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<section class="instructions p-4">
    <article class="instructions__container">
        <div class="instructions__header">
            <div class="instructions__header-container"><span
                    class="instructions__header-container-text">instructions</span></div>
        </div>
        <div class="instructions__body">
            <div class="instructions__body-container">
                <div class="instructions__card">
                    <div class="instructions__card-header">
                        (General Instructions)
                    </div>
                </div>
            </div>
        </div>
        <div class="instructions__footer">
            <div class="instructions__footer-container">
                <div class="d-flex justify-content-center">
                    <a href="{{route('dashboard.vote')}}" type="submit" class="btn btn-lg client-custom-button">Proceed</a>
                </div>
            </div>
        </div>
    </article>
</section>
@endsection

@section('footer')
@include('inc/footer')
@endsection
