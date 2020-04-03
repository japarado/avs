<article class="vote-prompt {{$showVotePrompt ?? false ? '':'d-none'}}" id="js-vote-prompt">
    <div class="vote-prompt__container">
        <div class="vote-prompt__card">
            <div class="vote-prompt__card-header"><span class="vote-prompt__card-header-text">PROMPT</span></div>
            <div class="vote-prompt__card-body">
                <div class="vote-prompt__card-body-text-container">
                    <div class="vote-prompt__card-body-text">
                        Don't be afraid to start over. It's a chance to build something better this time.
                    </div>
                </div>
                <div class="vote-prompt__footer">
                    <div class="d-flex justify-content-center mt-3">
                    <a href="{{route('dashboard.vote')}}" class="btn btn-lg client-custom-button vote-prompt__button">ok</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>