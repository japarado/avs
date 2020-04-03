@extends('layouts.app')
@section('header')
    @include('inc/header')
@endsection
@section('content')
<article class="login-page p-4">
    <div class="login-page__container">
        <div class="login-page__card">
            <div class="login-page__card-header">
                @include('parts/logo-text')
            </div>
            <div class="login-page__card-body pt-0">
                <div class="login-page__admin-header">Admin account</div>
                <form id="js-login-form" onsubmit="promptAlert(event)" class="login-page__form">
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
                        <label class="custom-radio-button">I am authorized to access this and is sworn to secrecy; unless needed for the good of the community
                            <input id="js-access" type="checkbox" value="true" name="access">
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

@section('modal')
    @include('parts/authorized-access-modal')
@endsection

@section('javascript')
    <script>
        var accessModal = document.getElementById('js-access-modal');

        function promptAlert(e){
            const studentNumber = document.getElementById('js-student-number');
            const password = document.getElementById('js-password');
            const access = document.getElementById('js-access');
            var values = {
                "Student Number":studentNumber.value,
                "Password":password.value,
                "Access": access.checked
            }
            var missingValues = setMissingValues(values);
            if(missingValues.length <= 0){
                return true;
            }
            e.preventDefault();
            if(missingValues.includes('Access')){
                accessModal.classList.remove('d-none');
                return false;
            }

            alert(`Missing values: ${missingValues.join(', ')}`)
            return false;
        }

    function setMissingValues(inputs) {
        var values = [];
        for(var i=0;i<Object.keys(inputs).length;i++){
            if(!inputs[Object.keys(inputs)[i]]){
            values.push(Object.keys(inputs)[i]);
            }
        }
        return values;
    }

    function hideAuthorizedModal(){
        accessModal.classList.add('d-none');
    }
    </script>
@endsection
