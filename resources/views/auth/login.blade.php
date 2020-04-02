@extends('layouts.app')

@section('content')
<article class="login-page">
    <div class="login-page__container">
        <div class="login-page__card">
            <div class="login-page__card-header">
                @include('parts/logo-text')
            </div>
            <div class="login-page__card-body">
                <form class="login-page__form">
                    <div class="form-group">
                        <input type="text" class="form-control client-custom-input" name="student_number"
                            placeholder="Student Number">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control client-custom-input" name="password"
                            placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label class="custom-radio-button">I understand that the choices I will make is influenced by my
                            own preference and is not coerced by any candidate or party.
                            <input type="radio" name="access">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-lg client-custom-button">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>
@endsection
