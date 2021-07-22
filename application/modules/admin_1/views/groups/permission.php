<?php 
$operator_id = $result->id;
$inculde['css'][] = '';;
$this->load->view('common/header');
?>
<style type="text/css">
	.checkbox_div{ padding:10px 0; }
	.form-group{ margin-bottom: 0px }
</style>

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


												 <!--begin::Portlet-->
        <div class="kt-portlet">
        
            <div class="kt-portlet__body">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#m_tabs_2_1">Doctor</a>
                    </li>
                 <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_2">Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_8">Question</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_category">Category</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_3">Level</a>
                    </li>

                     
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_6">Groups</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_7">Setting</a>
                    </li>
                    

                </ul>                    

                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
                  		<div class="form-group m-form__group row">

								<label class="col-lg-2 col-form-label">
									Doctor
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="doctor"  <?php echo get_ap_2('doctor',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>

							 <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Doctor Add
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="add_doctor"  <?php echo get_ap_2('add_doctor',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div> 
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Doctor Edit
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="doctor_edit"  <?php echo get_ap_2('doctor_edit',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Doctor Delete
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="doctor_delete"  <?php echo get_ap_2('doctor_delete',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
						</div>

                    <div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
                        	
                  		<div class="form-group m-form__group row">

								<label class="col-lg-2 col-form-label">
									Patient
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="patient"  <?php echo get_ap_2('patient',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>

							 <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Patient Add
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="add_patient"  <?php echo get_ap_2('add_patient',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div> 
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Patient Edit
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="patient_edit"  <?php echo get_ap_2('patient_edit',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Patient Delete
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="patient_delete"  <?php echo get_ap_2('patient_delete',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
                    </div>

                      <div class="tab-pane" id="m_tabs_category" role="tabpanel">
                        	
                  		<div class="form-group m-form__group row">

								<label class="col-lg-2 col-form-label">
									Category
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="category"  <?php echo get_ap_2('category',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>

							 <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Category Add
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="add_category"  <?php echo get_ap_2('add_category',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div> 
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Category Edit
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="category_edit"  <?php echo get_ap_2('category_edit',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Category Delete
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="category_delete"  <?php echo get_ap_2('category_delete',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
                    </div>

                    <div class="tab-pane" id="m_tabs_2_3" role="tabpanel">
                        	
                  		<div class="form-group m-form__group row">

								<label class="col-lg-2 col-form-label">
									level
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="level"  <?php echo get_ap_2('level',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>

							 <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Level Add
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="add_level"  <?php echo get_ap_2('add_level',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div> 
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									level Edit
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="level_edit"  <?php echo get_ap_2('level_edit',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									level Delete
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="level_delete"  <?php echo get_ap_2('level_delete',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
                    </div>
               
                    <div class="tab-pane" id="m_tabs_2_6" role="tabpanel">
                     	
                    	
                  		<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Group
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="groups"  <?php echo get_ap_2('groups',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Groups Add
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="groups_add"  <?php echo get_ap_2('groups_add',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Groups Edit
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="groups_edit"  <?php echo get_ap_2('groups_edit',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Group Delete
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="groups_delete"  <?php echo get_ap_2('groups_delete',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Group Permission
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="groups_permission"  <?php echo get_ap_2('groups_permission',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
                    </div>
                    <div class="tab-pane" id="m_tabs_2_7" role="tabpanel">
                     	
                  		<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Setting
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="setting"  <?php echo get_ap_2('setting',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Backup
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="Backup"  <?php echo get_ap_2('Backup',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
								</div>
							</div>
                    </div>
                     <div class="tab-pane" id="m_tabs_2_8" role="tabpanel">
                     	
                  		<div class="form-group m-form__group row">

								<label class="col-lg-2 col-form-label">
									Question
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="question"  <?php echo get_ap_2('question',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>

							 <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Question Add
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="add_question"  <?php echo get_ap_2('add_question',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div> 
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Question Edit
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="question_edit"  <?php echo get_ap_2('question_edit',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Question Delete
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="question_delete"  <?php echo get_ap_2('question_delete',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
						</div>

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
</div>
</form>
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