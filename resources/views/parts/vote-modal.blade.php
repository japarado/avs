<article class="vote-modal" id="js-vote-modal">
    <div class="vote-modal__container">
        <div class="vote-modal__card">
            <div class="vote-modal__card-header"><span class="vote-modal__card-header-text">PROMPT</span></div>
            <div class="vote-modal__card-body">
                <div class="vote-modal__card-body-text-container">
                    <div class="vote-modal__card-body-text">
                        <span class="">
							<span id="js-positions">
								It appears that you do not have an answer for ({{ session('unused_position_names') }}), if you don't want to vote in the said position click abstain
							</span>
                        </span>
                        <div>
                            <img class="vote-modal__img" src="{{asset('img/abstain-text.png')}}" />
                            <div>
                                formally decline to vote either for or against a proposal or motion <br />
                                 - Oxford Dictionary
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vote-modal__footer">
                    <div class="d-flex justify-content-center mt-3">
                        <a onclick="hideModal()" class="btn btn-lg client-custom-button vote-modal__button">ok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
