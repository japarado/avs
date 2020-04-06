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
                        <a class="btn btn-lg client-custom-button vote-modal__button" href="{{ action("PollingStationController@authpage") }}">ok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
