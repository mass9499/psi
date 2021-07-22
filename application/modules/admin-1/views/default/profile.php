<?php 
$this->load->view('common/header');
$operator_id = $this->session->userdata("operator_id");
$user_id = $this->session->userdata("user_id");
?>

  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                                <!-- begin:: Subheader -->
                                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                                    <div class="kt-container  kt-container--fluid ">
                                        <div class="kt-subheader__main">
                                            <h3 class="kt-subheader__title">
                                                <?php echo $this->lang->line('home');?> </h3>
                                            <span class="kt-subheader__separator kt-hidden"></span>
                                            <div class="kt-subheader__breadcrumbs">
                                                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                                <span class="kt-subheader__breadcrumbs-separator"></span>
                                                <a href="" class="kt-subheader__breadcrumbs-link">
                                                    <?php echo $title;?> </a>
                                                

                                                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>

                             <?php if(validation_errors()){ ?>

                            <div class="m-alert m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                        <?php   echo validation_errors(); ?>
                                </div>
                                <?php                                      
                        }?>


                                <?php $success = $this->session->userdata('message');
                                                  $error =  $this->session->userdata('error');

                                    if($success !="" || $error !=""){
                                        if($error !="") { $message = $error ;$data_text = "danger";}
                                        else{
                                            $data_text ="success";
                                            $message = $success  ;
                                        }
                                        ?>
                                        <div class="row">
                                        <div class="col-lg-12">
                                    <div class="m-alert m-alert--outline alert alert-<?php echo $data_text ;?> " role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                                    <strong>
                                                        <?php echo $message;?>
                                                    </strong>
                                                
                                                </div>
                                            </div>
                                        </div>
                                            <?php }?>
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
                    <div class="row">
									
								<div class="col-xl-3 col-lg-4">
								<div class="m-portlet m-portlet--full-height  ">
									<div class="m-portlet__body">
										<div class="m-card-profile text-center">
											<div class="m-card-profile__title m--hide">
												<h3><?php echo $this->lang->line('user_your_profile'); ?></h3>
											</div>
											<div class="m-card-profile__pic text-center">
												<div class="m-card-profile__pic-wrapper">
													<?php 
													$profile_image = $this->session->userdata('user_info')->profile_image ;

													if($profile_image){
													?>

													<img src="<?php echo base_url('uploads/'.$this->session->userdata('user_info')->profile_image);?>" alt="" width="100" height="100" class="img-responsive" style="border-radius: 50%;">
												<?php }  else { ?>
													<img src="<?php echo base_url('assets/images/man.png');?>" alt="" width="100" height="100" class="img-responsive" style="border-radius: 50%;">
												<?php }?>
												</div>
											</div>
											<div class="m-card-profile__details">
												<span class="m-card-profile__name">
													<?php echo $user->first_name ;?> <?php echo $user->last_name ;?>
												</span><br>
												<a href="" class="m-card-profile__email m-link">
													<?php echo $user->email ;?>
												</a>
											</div>
										</div>
										
										
									</div>
								</div>
							</div>

								<div class="col-xl-9 col-lg-8">
								<!--begin::Portlet-->
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												
												<h3 class="m-portlet__head-text">
													<?php echo $this->lang->line('user_update_profile'); ?>
												</h3>
											</div>
										</div>
									</div>
                                      
                       <form method="post" enctype="multipart/form-data" class="m-form m-form--label-align-right">
										<div class="m-portlet__body">
											<div class="m-form__section m-form__section--first">
												
												<div class="form-group m-form__group row">
													<label class="col-lg-3 col-form-label">
														<?php echo $this->lang->line('user_full_name'); ?>
													</label>
													<div class="col-lg-6">
														<input type="text" class="form-control m-input" placeholder="Enter Frist Name" name="first_name" value="<?php echo $user->first_name ;?>">
														
													</div>
												</div>


												<div class="form-group m-form__group row">
													<label class="col-lg-3 col-form-label">
														<?php echo $this->lang->line('user_mobile_number'); ?>
													</label>
													<div class="col-lg-6">
														<input type="number" class="form-control m-input" placeholder="Enter Mobile Number" name="mobile_no" value="<?php echo $user->mobile_no ;?>">
														
													</div>
												</div>


											<div class="form-group m-form__group row">
													<label class="col-lg-3 col-form-label">
														<?php echo $this->lang->line('user_date_of_birth'); ?>
													</label>
													<div class="col-lg-6">
														<input type="date" class="form-control m-input" placeholder="Enter Date of Birth" name="dob" value="<?php echo $user->dob ;?>" >
														
													</div>
												</div>


												<div class="form-group m-form__group row">
													<label class="col-lg-3 col-form-label">
														<?php echo $this->lang->line('user_profile_image'); ?>
													</label>
													<div class="col-lg-6">
														<input type="file" class="form-control m-input" name="profile_image"  >
														
													</div>
												</div>


									<!--begin::Form-->
									<p class="" ><a href="javascript:void(0)" class="change_password_click"><?php echo $this->lang->line('user_change_password'); ?></a></p>
									<div class="change_password_task" style="display: none;">
										<div class="form-group m-form__group row">
													<label class="col-lg-3 col-form-label">
														<?php echo $this->lang->line('user_old_password'); ?>
													</label>
													<div class="col-lg-6">
														<input type="password" class="form-control m-input" placeholder="<?php echo $this->lang->line('user_enter_old_password'); ?>" name="password">
														
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-3 col-form-label">
														<?php echo $this->lang->line('user_new_password'); ?>
													</label>
													<div class="col-lg-6">
														<input type="password" class="form-control m-input" placeholder="<?php echo $this->lang->line('user_enter_new_password'); ?>" name="new_password" >
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-3 col-form-label">
														<?php echo $this->lang->line('user_confirm_password'); ?>
													</label>
													<div class="col-lg-6">
														<input type="password" class="form-control m-input" placeholder="<?php echo $this->lang->line('user_enter_confirm_password'); ?>" name="confirm_password" >
														
													</div>
												</div>

										
											</div>
												
											</div>
											
										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions">
												<div class="row">
													<div class="col-lg-3"></div>
													<div class="col-lg-6">
														<button type="submit" class="btn btn-primary">
															<?php echo $this->lang->line('user_submit'); ?>
														</button>
														<button type="reset" class="btn btn-secondary">
															<?php echo $this->lang->line('user_cancel'); ?>
														</button>
													</div>
												</div>
											</div>
										</div>
										</div>
									</form>
                                            
                                        </div>

                                    </div>
                                </div>

                                <!-- end:: Content -->
        </div>
    </div>
</div>
</div>

      

<?php 
	$inculde['js'][] ='';
	$this->load->view('common/script');
	?>
	<script type="text/javascript">
		$(".change_password_click").on("click",function(){
			$(".change_password_task").toggle();
		});
	</script>
<?php $this->load->view('common/footer') ?>