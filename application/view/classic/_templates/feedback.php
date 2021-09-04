<?php

// get the feedback (they are arrays, to make multiple positive/negative messages possible)
$feedback_positive = Session::get( 'feedback_positive' );
$feedback_negative = Session::get( 'feedback_negative' );

// echo out positive messages
if ( isset( $feedback_positive ) ) {
	foreach ( $feedback_positive as $feedback ) {
		?>
		<div aria-live="polite" aria-atomic="true">
			<div style="position: absolute; top: 75px; right:20px;">
				<!-- Toast -->
				<div class="toast" id = "toastBasic" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header text-white bg-success">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle mr-2 text-white-50"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
						<strong class="me-auto">Success!</strong>
						<small class="text-white">just now</small>
						<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
					</div>
					<div class="toast-body">
						<?= $feedback; ?>
					</div>
				</div>
			</div>
		</div>
		<script>
		var myAlert =document.getElementById('toastBasic');//select id of toast
		var bsAlert = new bootstrap.Toast(myAlert);//inizialize it
		bsAlert.show();//show it
		</script>

		<?php
	}
}

// echo out negative messages
if ( isset( $feedback_negative ) ) {
	foreach ( $feedback_negative as $feedback ) {
		?>
		<div aria-live="polite" aria-atomic="true">
			<div style="position: absolute; top: 75px; right:20px;">
				<!-- Toast -->
				<div class="toast" id = "toastBasic" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header text-white bg-danger">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon mr-2 text-white-50"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
							<line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
							<strong class="me-auto">Error!</strong>
							<small class="text-white">just now</small>
							<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
						</div>
						<div class="toast-body">
							<?= $feedback; ?>
						</div>
					</div>
				</div>
			</div>
			<script>
			var myAlert =document.getElementById('toastBasic');//select id of toast
			var bsAlert = new bootstrap.Toast(myAlert);//inizialize it
			bsAlert.show();//show it
			</script>
			<?php
		}
	}
