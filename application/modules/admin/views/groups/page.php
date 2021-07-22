<?php 
$inculde['css'][] = '';
$this->load->view('common/header');?>



	<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									<?php echo $title;?>
								</h3>
							</div>
							<div>
								
							</div>
						</div>
					</div>
					
				<div class="m-content">
						<div class="row">
							<div class="col-xl-12">
									<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											<?php echo $title;?>
										</h3>

									</div>

								</div>
								<div class="m-portlet__head-tools">
											
													<a class="btn btn-primary" href="<?php echo base_url('language/create');?>">
														Add New</a>
												
										</div>
							</div>
							<div class="m-portlet__body">
								<!--begin::Section-->
								<div class="m-section">
									<div class="m-section__content">

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
									<div class="m-alert m-alert--outline alert alert-<?php echo $data_text ;?>" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
													<strong>
														<?php echo $message;?>
													</strong>
												
												</div>
											</div>
										</div>
											<?php }?>


										<table class="table table-bordered m-table m-table--border-primary" id="datatables">
											<thead>
												<tr>
													<th>
														#
													</th>
					
													<th>
														 PAGE
													</th>
													<th>
														 English
													</th>
													<th>
														 Arabic
													</th>
												
													<th>
														Action
													</th>
												</tr>
											</thead>
											<tbody>
												<?php  if($results){
													$s=1;
													foreach ($results as  $result) {
												?>
												<tr>
													<th scope="row">
														<?php echo $s++;?>
													</th>
													<td>
														<?php echo $result->page;?>
													</td>
													<td>
														<?php echo $result->english;?>
													</td>
													<td>
														<?php echo $result->arabic;?>
													</td>
													
													
													<td>

													
														<a href="<?php echo base_url('language/edit/'.$result->id);?>" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only" data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="Edit" ><i class="flaticon-edit-1"></i></a>

													</td>
												</tr>
											<?php } } ?>
											</tbody>
										</table>
									</div>
								</div>
								<!--end::Section-->
				
							</div>
							<!--end::Form-->
						</div>
							</div>
						</div>
					</div>

				</div>

<?php 
	
	$this->load->view('common/script');	
	?>
	<script type="text/javascript">
		var b_url = "<?php echo base_url();?>";
		var BootstrapSwitch={init:function(){
			$("[data-switch=true]").bootstrapSwitch({
				onSwitchChange: function (e, state){

				
					var id= $(this).parents(".bootstrap-switch").find("input").attr("data-id")
					if(state == true){
						var status = 1;
					}else {
						var status = 2;
					}
					$.ajax({
				    url: b_url + "language/status/" +id + "/" +status ,
				    success: function(e) {

					}

		 		});
				
				}
			});
		}};

		jQuery(document).ready(function(){BootstrapSwitch.init()});
	</script>
<?php $this->load->view('common/footer') ?>