@if(session('show-generic-modal'))
	<article class="vote-prompt" id="js-vote-prompt">
		<div class="vote-prompt__container">
			<div class="vote-prompt__card">
				<div class="vote-prompt__card-header"><span class="vote-prompt__card-header-text">
						@if(empty(session('generic-modal-title')))
							Success
						@else
							{{ session('generic-modal-title') }}
						@endif
					</span></div>
				<div class="vote-prompt__card-body">
					<div class="vote-prompt__card-body-text-container">
						<div class="vote-prompt__card-body-text">
							@if(empty(session('generic-modal-body')))
								Success
							@else
								{{ session('generic-modal-body') }}
							@endif
						</div>
					</div>
					<div class="vote-prompt__footer">
						<div class="d-flex justify-content-center mt-3">
							<a onclick="hideModal()" class="btn btn-lg client-custom-button vote-prompt__button">ok</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
	<script>
		const modal = document.getElementById('js-vote-prompt');
		document.addEventListener("keydown", (e) => 
		{
			if(e.key === "Escape" && !modal.classList.contains('d-none')) 
			{
				modal.classList.add('d-none');
			}
		});
		function hideModal()
		{
			document.getElementById("js-vote-prompt").classList.add('d-none')
		}
	</script>
@endif

