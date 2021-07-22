<?php 
$inculde['title'] = $title = "Change Password";
$this->load->view('common/header',$inculde);
$operator_id = $this->session->userdata("operator_id");
?>


<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
							
							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											<?php echo $title;?>
										</h3>
									</div>
									
								</div>
								<div class="kt-portlet__body">
            	
									<?php $message = $this->session->userdata('message');

									if($message){?>
										<div class="col-lg-12">
									<div class="m-alert m-alert--outline alert alert-success" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
													<strong>
														<?php echo $message;?>
													</strong>
												
												</div>
											</div>
											<?php }?>

											<?php $message2 = validation_errors();

									if($message2){?>
										<div class="col-lg-12">
									<div class="m-alert m-alert--outline alert alert-danger" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
													<strong>
														<?php echo $message2;?>
													</strong>
												
												</div>
											</div>
											<?php }?>

									<!--begin::Form-->
									<form class="m-form m-form--label-align-right" action="" method="post">
										<div class="m-portlet__body">
											<div class="m-form__section m-form__section--first">
												
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														Old Password
													</label>
													<div class="col-lg-6">
														<input type="password" class="form-control m-input" placeholder="<?php echo $this->lang->line('user_enter_old_password'); ?>" name="old_password">
														
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														New Password
													</label>
													<div class="col-lg-6">
														<input type="password" class="form-control m-input" placeholder="<?php echo $this->lang->line('user_enter_new_password'); ?>" name="password" >
														
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														Confirm Password
													</label>
													<div class="col-lg-6">
														<input type="password" class="form-control m-input" placeholder="<?php echo $this->lang->line('user_enter_confirm_password'); ?>" name="password2" >
														
													</div>
												</div>


												
											</div>
											
											
										</div>
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions">
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-6">
														<button type="submit" class="btn btn-primary">
															Submit
														</button>
														
													</div>
												</div>
											</div>
										</div>
									</form>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->
							</div>
						</div>
					</div>
				</div>



<?php 
	$inculde['js'][] ='';
	$this->load->view('common/script');
	?>
<?php $this->load->view('common/footer') ?>