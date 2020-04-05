@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<section class="logout py-4">
    <article class="logout__container">
        <div class="logout__bubble">
            <span>
            your participation in promoting thomasian democracy is highly appreciated.
            </span>
            <div class="mt-4">
            Thank you!
            </div>
        </div>
        <form class="mt-5">
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-lg client-custom-button-2">log out</button>
            </div>
        </form>
    </article>
</section>
@endsection

@section('footer')
@include('inc/footer')
@endsection
