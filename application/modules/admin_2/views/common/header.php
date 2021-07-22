<?php $setting =  setting();
$lang  = $this->session->userdata('language');
$operator_id = $this->session->userdata("operator_id");
$language_css = "";
if($lang =="arabic") $language_css  = ".rtl";
?>
<!DOCTYPE html>
<html lang="en" <?php echo $lang =="arabic" ? "dir='rtl'" :"" ;?>>

	<!-- begin::Head -->
	<head>
		<base href="<?php echo base_url();?>">
		<meta charset="utf-8" />
		 <title><?php echo $title ;?> | <?php echo $setting->company_name; ?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
		<!--end::Fonts -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="<?php echo base_url();?>assets/admin/plugins/global/plugins.bundle<?php echo $language_css;?>.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/admin/css/style.bundle<?php echo $language_css;?>.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/admin/css/skins/aside/dark<?php echo $language_css;?>.css" rel="stylesheet" type="text/css" />
		 <?php
	       if(isset($css) && $css) {
	         foreach($css as $stylesheet) {
	         	if($language_css) $stylesheet =  str_replace(".css", ".rtl.css", $stylesheet);
	          echo '<link rel="stylesheet" type="text/css" type="text/css" href="'.base_url($stylesheet).'" media="screen" />'."\n";
	         } 
	       } 
	       ?>
		<!--end::Layout Skins -->
		 <link rel="shortcut icon" href="<?php echo base_url();?><?php echo $setting->company_fav;?>" />
		
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="<?php echo base_url();?>">
					 <img src="<?php echo base_url();?><?php echo $setting->image_name;?>" alt="<?php echo $setting->company_name ;?>"  style="width: 48px"   />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">


				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside -->
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="<?php echo base_url();?>admin">
								 <img src="<?php echo base_url();?><?php echo $setting->image_name;?>" alt="<?php echo $setting->company_name ;?>"  style="width: 48px"  /> 
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
										</g>
									</svg></span>
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24" />
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
										</g>
									</svg></span>
							</button>

						</div>
					</div>

					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
							<ul class="kt-menu__nav ">

								 <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-home"></i><span class="kt-menu__link-text">Dashboard</span></a></li>

								 <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/doctor" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">Doctors</span></a></li>

								 <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/patient" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-user"></i><span class="kt-menu__link-text">Patient</span></a></li>

								 <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/category" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-up-arrow"></i><span class="kt-menu__link-text">Category</span></a></li>

								 <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/level" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-up-arrow"></i><span class="kt-menu__link-text">Level</span></a></li>

								  <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/question" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-questions-circular-button"></i><span class="kt-menu__link-text">Question</span></a></li>

								  <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/results" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-percentage"></i><span class="kt-menu__link-text">Results</span></a></li>

								   <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/countries" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-placeholder-1"></i><span class="kt-menu__link-text">Country</span></a></li>

								    <li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/cities" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-placeholder-1"></i><span class="kt-menu__link-text">City</span></a></li>


								<li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/member" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">Members</span></a></li>
								<li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/groups" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-lock"></i><span class="kt-menu__link-text">Groups</span></a></li>
								<li class="kt-menu__item " aria-haspopup="true"><a href="<?php echo base_url();?>admin/setting" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-settings"></i><span class="kt-menu__link-text">Setting</span></a></li>
							</ul>
						</div>
					</div>

					<!-- end:: Aside Menu -->
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin:: Header Menu -->

						<!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
								
							</div>
						</div>

						<!-- end:: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

							<!--end: Language bar -->

							<!--begin: User Bar -->
							<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
									<div class="kt-header__topbar-user">
										

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">A</span>
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

									<!--begin: Head -->
									<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(assets/admin/media/misc/bg-1.jpg)">
										<div class="kt-user-card__avatar">
											<img class="kt-hidden" alt="Pic" src="<?php echo base_url();?>assets/admin/media/users/300_25.jpg" />

											<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
											<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">A</span>
										</div>
										<div class="kt-user-card__name">
											Admin
										</div>
										
									</div>

									<!--end: Head -->

									<!--begin: Navigation -->
									<div class="kt-notification">
										<a href="<?php echo base_url();?>admin/setting" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-calendar-3 kt-font-success"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Setting
												</div>
												<div class="kt-notification__item-time">
													Setting our Website 
												</div>
											</div>
										</a>
										<a href="<?php echo base_url();?>admin/Change_password" class="kt-notification__item">
											<div class="kt-notification__item-icon">
												<i class="flaticon2-lock kt-font-warning"></i>
											</div>
											<div class="kt-notification__item-details">
												<div class="kt-notification__item-title kt-font-bold">
													Change Password
												</div>
												<div class="kt-notification__item-time">
													Update your password
												</div>
											</div>
										</a>
										
										<div class="kt-notification__custom kt-space-between">
											<a href="<?php echo base_url();?>admin/logout" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
											
										</div>
									</div>

									<!--end: Navigation -->
								</div>
							</div>

							<!--end: User Bar -->
						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<h3 class="kt-subheader__title">
										<?php echo $title;?> </h3>
									<span class="kt-subheader__separator kt-hidden"></span>
									<div class="kt-subheader__breadcrumbs">
										<a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="" class="kt-subheader__breadcrumbs-link">
											Home </a>
										<span class="kt-subheader__breadcrumbs-separator"></span>
										<a href="" class="kt-subheader__breadcrumbs-link">
											<?php echo $title;?> </a>

										<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
									</div>
								</div>
								
							</div>
						</div>

						<!-- end:: Subheader -->