@extends('layouts.app')

@section('content')
<article class="login-page">
    <div class="login-page__container">
        <div class="login-page__card">
            <div class="login-page__card-header">
                @include('parts/logo-text')
            </div>
            <div class="login-page__card-body">
                <form id="js-login-form"  class="login-page__form" action="{{ route('login') }}" method="post">
					@csrf
                    <div class="form-group">
                        <input id="js-student-number" type="text" class="form-control client-custom-input" name="email"
                            placeholder="Student Number">
                    </div>

                    <div class="form-group">
                        <input id="js-password" type="password" class="form-control client-custom-input" name="password"
                            placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label class="custom-radio-button">I understand that the choices I will make is influenced by my
                            own preference and is not coerced by any candidate or party.
                            <input id="js-access" type="checkbox" name="access">
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

@section('javascript')
    <script>
        function promptAlert(){
            const studentNumber = document.getElementById('js-student-number');
            const password = document.getElementById('js-password');
            const access = document.getElementById('js-access');
            console.log({student: studentNumber.value,password:password.value,access:access.checked})

            if(!studentNumber.value || !password.value || !access.checked) {
                alert(`Missing values: ${!studentNumber.value ? "-STUDENT NUMBER":""} ${!password.value ? "-PASSWORD":""} ${!access.checked ? "-AGREEMENT":""}`)
            }
        }
    </script>
@endsection
