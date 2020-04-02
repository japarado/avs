<article class="login-modal {{$showModal ?? '' ? '':'d-none'}}">
    <div class="login-modal__container">
        <div class="login-modal__card">
            <div class="login-modal__card-header"><span class="login-modal__card-header-text">PROMPT</span></div>
            <div class="login-modal__card-body">
                <div class="login-modal__card-body-text-container">
                    <span class="login-modal__card-body-text">
                        "Hindi naagaw ng iba ang tao dahil ang tao'y hindi paari ng iba. <br /> Kaya binigyan ang bawa't
                        tao ng sariling isip ay para magkaro'n siya ng sarili niyang pagpapasiya."<br />
                        -Lualhati Bautista
                    </span>
                </div>
                <div class="login-modal__footer">
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{route('dashboard.instructions')}}" type="submit" class="btn btn-lg client-custom-button login-modal__button">ok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
