<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
	<!--begin::Page-->
	<div class="page d-flex flex-row flex-column-fluid">

		<?php include 'lateral.php'; ?>

		<!--begin::Wrapper-->
		<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
			<?php include 'cabecera.php'; ?>
			<!--begin::Content-->
			<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
				<!--begin::Post-->
				<div class="post d-flex flex-column-fluid" id="kt_post">


					<?php

					if (isset($_GET['p'])) {
						if (
							$_GET['p'] == 'inicio' ||
							$_GET['p'] == 'menu' ||
							$_GET['p'] == 'proveedores'
						) {
							include 'pages/' . $_GET['p'] . '.php';
						} else {
							include 'pages/404.php';
						}
					} else {
						include 'pages/inicio.php';
					}  ?>

				</div>
				<!--end::Post-->
			</div>
			<!--end::Content-->

			<?php include 'pie.php'; ?>

		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Page-->
</div>
<!--end::Root-->