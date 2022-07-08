<!--begin::Header-->
<div id="kt_header" class="header align-items-stretch">
	<!--begin::Container-->
	<div class="container-fluid d-flex align-items-stretch justify-content-between">
		<!--begin::Aside mobile toggle-->
		<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
			<div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
				<i class="bi bi-list fs-1"></i>
			</div>
		</div>
		<!--end::Aside mobile toggle-->
		<!--begin::Mobile logo-->
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
			<a href="?page=index" class="d-lg-none">
				<img alt="Logo" src="assets/media/logos/demo13-small.svg" class="h-25px" />
			</a>
		</div>
		<!--end::Mobile logo-->
		<!--begin::Wrapper-->
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
		<!--begin::Navbar-->
		<div class="d-flex align-items-stretch" id="kt_header_nav">
		<?php include 'menuheader.php'; ?></div>
		<!--end::Navbar-->
		<?php include 'topbar.php'; ?></div>
		<!--end::Wrapper-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->