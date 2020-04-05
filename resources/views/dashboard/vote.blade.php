@extends('layouts/app')
@section('header')
@include('inc/dashboard-header')
@endsection
@section('content')
<section class="vote py-4">
    <article class="vote__container">
        <form onsubmit="submitVote(event)" id="js-vote-form">
            <div class="vote__type">
                <div class="vote__header"><span>President</span></div>
                <div class="vote__body">
                    <div class="vote__body-container">
                        @foreach ($candidates as $candidate)
                        @if($candidate['type'] == 'president')
                        <div class="vote__entry">
                            <div class="vote__img-container">
                                <img class="vote__img" src="{{$candidate['img']}}" />
                            </div>
                            <div class="vote__name">

                                <div class="form-group">
                                    <label class="custom-radio-button">{{$candidate['name']}}
                                        <input type="radio" value="{{$candidate['id']}}"
                                            name="president_vote">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="vote__entry vote__entry--padding">
                            <div class="form-group">
                                <label class="custom-radio-button text-uppercase">abstain
                                    <input type="radio" value="none" name="president_vote">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="vote__type">
                <div class="vote__header"><span>Vice President</span></div>
                <div class="vote__body">
                    <div class="vote__body-container">
                        @foreach ($candidates as $candidate)
                        @if($candidate['type'] == 'vice_president')
                        <div class="vote__entry">
                            <div class="vote__img-container">
                                <img class="vote__img" src="{{$candidate['img']}}" />
                            </div>
                            <div class="vote__name">

                                <div class="form-group">
                                    <label class="custom-radio-button">{{$candidate['name']}}
                                        <input type="radio" value="{{$candidate['id']}}"
                                            name="vice_president_vote">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="vote__entry vote__entry--padding">
                            <div class="form-group">
                                <label class="custom-radio-button text-uppercase">abstain
                                    <input type="radio" value="none"
                                        name="vice_president_vote">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="vote__type">
                <div class="vote__header"><span>Secretary</span></div>
                <div class="vote__body">
                    <div class="vote__body-container">
                        @foreach ($candidates as $candidate)
                        @if($candidate['type'] == 'secretary')
                        <div class="vote__entry">
                            <div class="vote__img-container">
                                <img class="vote__img" src="{{$candidate['img']}}" />
                            </div>
                            <div class="vote__name">

                                <div class="form-group">
                                    <label class="custom-radio-button">{{$candidate['name']}}
                                        <input type="radio" value="{{$candidate['id']}}"
                                            name="secretary_vote">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="vote__entry vote__entry--padding">
                            <div class="form-group">
                                <label class="custom-radio-button text-uppercase">abstain
                                    <input type="radio" value="none" name="secretary_vote">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="vote__type">
                <div class="vote__header"><span>Teasurer</span></div>
                <div class="vote__body">
                    <div class="vote__body-container">
                        @foreach ($candidates as $candidate)
                        @if($candidate['type'] == 'treasurer')
                        <div class="vote__entry">
                            <div class="vote__img-container">
                                <img class="vote__img" src="{{$candidate['img']}}" />
                            </div>
                            <div class="vote__name">

                                <div class="form-group">
                                    <label class="custom-radio-button">{{$candidate['name']}}
                                        <input type="radio" value="{{$candidate['id']}}"
                                            name="treasurer_vote">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="vote__entry vote__entry--padding">
                            <div class="form-group">
                                <label class="custom-radio-button text-uppercase">abstain
                                    <input type="radio" value="none" name="treasurer_vote">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="vote__type">
                <div class="vote__header"><span>Auditor</span></div>
                <div class="vote__body">
                    <div class="vote__body-container">
                        @foreach ($candidates as $candidate)
                        @if($candidate['type'] == 'auditor')
                        <div class="vote__entry">
                            <div class="vote__img-container">
                                <img class="vote__img" src="{{$candidate['img']}}" />
                            </div>
                            <div class="vote__name">

                                <div class="form-group">
                                    <label class="custom-radio-button">{{$candidate['name']}}
                                        <input type="radio" value="{{$candidate['id']}}"
                                            name="auditor_vote">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="vote__entry vote__entry--padding">
                            <div class="form-group">
                                <label class="custom-radio-button text-uppercase">abstain
                                    <input type="radio" value="none" name="auditor_vote">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-lg client-custom-button">Vote</button>
            </div>
        </form>

    </article>
</section>
@endsection

@section('footer')
@include('inc/footer')
@endsection

@section('modal')
@include('parts/vote-modal')
    @include('parts/vote-prompt')
@endsection

@section('javascript')
<script>

    const params = new URLSearchParams(document.location.search.substring(1));

    var positionsText = document.getElementById("js-positions");
    var voteModal = document.getElementById("js-vote-modal");
    var voteForm = document.getElementById("js-vote-form");
    var votePrompt = document.getElementById('js-vote-prompt')

    if(params.get('showVotePrompt')){
        votePrompt.classList.remove('d-none');
    }

    function submitVote(e){
        var presidentElements = document.getElementsByName('president_vote');
        var vicePresidentElements = document.getElementsByName('vice_president_vote');
        var secretaryElements = document.getElementsByName('secretary_vote');
        var treasurerElements = document.getElementsByName('treasurer_vote');
        var auditorElements = document.getElementsByName('auditor_vote');
        var votes = {
            President:getValue(presidentElements),
            "Vice President": getValue(vicePresidentElements),
            Secretary: getValue(secretaryElements),
            Treasurer: getValue(treasurerElements),
            Auditor: getValue(auditorElements),
        }
        var missingValues = setMissingValues(votes);
        if(missingValues.length <= 0){
            return true;
        }
        positionsText.innerHTML = `It appears that you do not have an answer for (${missingValues.join(', ')}), if you don't want to vote in the said position click abstain.`;
        voteModal.classList.remove('d-none');
        e.preventDefault();
        return false;
    }

    function getValue(list) {
        var value = ""

        for(var i=0;i<list.length;i++){
            if (list[i].checked) {
            value=list[i].value;
            }
        }
        return value;
    }

    function setMissingValues(votes) {
        var values = [];
        for(var i=0;i<Object.keys(votes).length;i++){
            if(!votes[Object.keys(votes)[i]]){
            values.push(Object.keys(votes)[i]);
            }
        }
        return values;
    }

    function hideModal(){
        voteModal.classList.add('d-none');
    }

    function hideVotePrompt(){
        votePrompt.classList.add('d-none');
        params.set('showVotePrompt',false)
    }
</script>
@endsection
