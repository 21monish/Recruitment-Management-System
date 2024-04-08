<header class="masthead" style="min-height: 9vh; height:  auto;">
	<div class="container-fluid">
		<div class="row align-items-center justify-content-center text-center">


		</div>
	</div>
</header>
<section id="">
	<?php include 'admin/db_connect.php' ?>

	<?php
	$qry = $conn->query("SELECT * FROM vacancy where id=" . $_GET['id'])->fetch_array();
	foreach ($qry as $k => $v) {
		$$k = $v;
	}
	?>
	<!-- <div class="container mb-2 pt-4 ">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<h4 class="job-title"><b>
								<?php echo $position ?>
							</b></h4>
						<hr class="divider" style="max-width: calc(10%)">
						<p class="text-center">
							<small>
								<i><b>Needed: <larger>
											<?php echo $availability ?>
										</larger></b></i>
							</small>
							<?php if ($status == 1): ?>
								<span class="badge badge-success pt-2">Hiring</span>
							<?php else: ?>
								<span class="badge badge-danger pt-2">Closed</span>
							<?php endif; ?>
						</p>
					</div>
				</div>
				<hr class="divider" style="max-width: calc(100%)">
				<div class="row">
					<div class="col-lg-12">
						<?php echo html_entity_decode($description) ?>
					</div>
				</div>
				<hr class="divider" style="max-width: calc(100%)">
				<div class="row">
					<div class="col-lg-12">
						<?php if ($status == 1): ?>
							<button class="btn btn-block col-md-4 btn-primary btn-sm float-right" type="button"
								id="apply_now">Apply Now</button>

						<?php else: ?>
							<button class="btn btn-block col-md-4 btn-primary btn-sm float-right" type="button" disabled=""
								id="">Application Closed</button>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div> -->
	<div class="apply-data">

		<div class="container mb-4 pt-4">
			<div class="row">
				<div class="col-lg-12">
					<div class="job-title-detail">
						<h1><i class="fa-light fa-dash"></i>
							<?php echo $position ?><i class="fa-light fa-dash"></i>
						</h1>
						<hr>
						<h5><i class="fa-light fa-dash"></i><b>Needed</b>:
							<?php echo $availability ?><i class="fa-light fa-dash"></i>
							<?php if ($status == 1): ?>
								<span class="badge badge-success pt-2">Hiring</span>
							<?php else: ?>
								<span class="badge badge-danger pt-2">Closed</span>
							<?php endif; ?>
						</h5>
						<hr>
						<div class="col-lg-12">
							<?php echo html_entity_decode($description) ?>
						</div>
						<hr>
						<br>
					</div>
				</div>
				<!-- <div class="col-lg-3"></div>
			<div class="col-lg-3"></div>
			<div class="col-lg-3"></div> -->
				<!-- <div class="col-lg-3">
				<div class="apply-btn">
					<a class="apply-btn-data" href="#">Apply</a>
				</div>
			</div> -->
				<div class="col-lg-12">
					<?php if ($status == 1): ?>
						<button class="apply-btn apply-btn-data" type="button" id="apply_now">Apply Now</button>

					<?php else: ?>
						<button class="apply-btn" type="button" disabled="" id="">Application Closed</button>
					<?php endif; ?>

				</div>
			</div>
		</div>

	</div>
</section>
<script>
	$('html, body').animate({
		scrollTop: ($('section').offset().top - 72)
	}, 1000);
	$('#apply_now').click(function () {
		uni_modal('Application from', 'submit_application.php?id=<?php echo $_GET['id'] ?>', 'large')
	})
</script>