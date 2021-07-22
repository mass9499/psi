<?php 
$inculde['title'] = $title = "Setting";
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
							 <form class="m-form" action="" method="post"  enctype="multipart/form-data">
                    <div class="m-portlet__body">
                        <div class="m-form__section m-form__section--first">

                            <div class="form-group m-form__group row">
                                <label class="col-lg-3 col-form-label">
                                   Company Logo 1

                               </label>
                               <div class="col-lg-6">
                             
                                 <img src="<?php echo base_url($result->image_name);?>" width="200">
                                
                                <input type="file" class="form-control m-input" placeholder="" name="company_logo"  >
                                <input type="hidden" name="company_logo_old" value="<?php echo $result->image_name ;?>">
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                               Company Logo 2
                           </label>
                           <div class="col-lg-6">
                                <img src="<?php echo base_url($result->image_name2);?>" width="200">
                                <input type="file" class="form-control m-input" placeholder="" name="company_logo2"  >
                                <input type="hidden" name="company_logo2_old" value="<?php echo  $result->image_name2 ;?>">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                               Company Fav Icon
                           </label>
                           <div class="col-lg-6">
                                <img src="<?php echo base_url($result->company_fav);?>" width="64">
                                <input type="file" class="form-control m-input" placeholder="" name="company_fav"  >
                                <input type="hidden" name="company_fav_old" value="<?php echo  $result->company_fav ;?>">
                            </div>
                        </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                       Company Name
                   </label>
                   <div class="col-lg-6">
                    <input type="text" class="form-control m-input" placeholder="" name="company_name" value="<?php echo $result->company_name;?>" >

                </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                      Company Address
                  </label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control m-input" placeholder="" name="company_address" value="<?php echo $result->company_address;?>" >

                </div>
            </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                              Company Email
                          </label>
                          <div class="col-lg-6">
                            <input type="text" class="form-control m-input" placeholder="" name="company_email"   value="<?php echo  $result->company_email ;?>" >

                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-3 col-form-label">
                          Company Mobile
                      </label>
                      <div class="col-lg-6">
                        <input type="text" class="form-control m-input" placeholder="" name="company_mobile"   value="<?php echo  $result->company_mobile ;?>" >

                    </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                       Currency
                   </label>
                   <div class="col-lg-6">
                    <input type="text" class="form-control m-input" placeholder="" name="currency" value="<?php echo  $result->currency ;?>" >

                </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                     Facbook
                 </label>
                 <div class="col-lg-6">
                    <input type="text" class="form-control m-input" placeholder="" name="facbook"   value="<?php echo  $result->facbook ;?>"  >

                </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                      Twitter
                  </label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control m-input" placeholder="" name="twitter"  value="<?php echo $result->twitter;?>"  >

                </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                      Google Plus
                  </label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control m-input" placeholder="" name="google_plus" value="<?php echo $result->google_plus ;?>"  >

                </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                      Instrgram
                  </label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control m-input" placeholder="" name="instrgram"  value="<?php echo  $result->instrgram ;?>"  >

                </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                      Meta Title
                  </label>
                  <div class="col-lg-6">
                    <textarea class="form-control m-input" placeholder="Enter Meta Title" name="meta_title"  ><?php echo  $result->meta_title ;?> </textarea>


                </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                      Meta Keyword
                  </label>
                  <div class="col-lg-6">
                    <textarea class="form-control m-input" placeholder="Enter Meta Title" name="meta_keyword"  ><?php echo  $result->meta_keyword ;?> </textarea>


                </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                      Meta Description
                  </label>
                  <div class="col-lg-6">
                    <textarea class="form-control m-input" placeholder="Enter Meta Description" name="meta_description"  ><?php echo  $result->meta_description ;?> </textarea>
                </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                      Header script
                  </label>
                  <div class="col-lg-6">
                    <textarea class="form-control m-input" placeholder="Enter Header script" name="header_script"  ><?php echo  $result->header_script ;?></textarea>
                </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-lg-3 col-form-label">
                      Footer script
                  </label>
                  <div class="col-lg-6">
                    <textarea class="form-control m-input" placeholder="Enter Footer script" name="footer_script"  ><?php echo  $result->footer_script ;?></textarea>
                </div>
                </div>
                <div class="offset-md-4">

                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>

                </div>  

             </div>
        </div>
    </form>
									</div>
								</div>
								<!--end::Section-->
				
							</div>
							<!--end::Form-->
					
<?php $this->load->view('common/script');?>
<script type="text/javascript">
	var KTFormControls={init:function(){$("#kt_form_1").validate(); } }

	jQuery(document).ready(function(){KTFormControls.init()});
	$(document).on("input",".inputs",function() {

		var purchase = $(".purchase").val();
		var commission = $(".commission").val();
		console.log( purchase +'----'+ commission );
		if(purchase && commission ){
			var total = calculate(purchase,commission);
			$(".total").val(total.toFixed(2));
			$(".total_html").html(total.toFixed(2));
		}
	});

	function calculate(amount,perntage){
    	 return parseFloat(amount)  + parseFloat( (perntage / 100) * amount);
    }


</script>
<?php $this->load->view('common/footer');?>