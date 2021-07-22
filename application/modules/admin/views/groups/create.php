<?php 
$inculde['css'][] = '';
$this->load->view('common/header');
$operator_id = $this->session->userdata("operator_id");
?>

			<div class="content-box">
            	<div class="form_components">
            		<h3 class="hr"><?php echo $title;?>	</h3>
				
            		<div class="form_detail">

									<?php $message = validation_errors();

									if($message){?>
										<div class="col-lg-12">
									<div class="m-alert m-alert--outline alert alert-danger" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
													<strong>
														<?php echo $message;?>
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
														Permission Group Name 
													</label>
													<div class="col-lg-6">
														<input type="text" name="name" class="form-control">
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
			
<?php 
	$inculde['js'][] ='';
	$this->load->view('common/script');
	?>
	<script type="text/javascript">

		$('.check_all').click(function () {    
    $(this).parents(".checkbox_div").find('.input-check').prop('checked', this.checked);    
 });

		
	</script>
<?php $this->load->view('common/footer') ?>