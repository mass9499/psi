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
                        <a class="nav-link active" data-toggle="tab" href="#m_tabs_2_1">Price</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_2">Add Price </a>
                    </li>

                 
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_3">Transition</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_4">Products</a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#m_tabs_2_3">Shop</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_4">User</a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_4">Users</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_5">Groups</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_6"><?php echo $this->lang->line('setting'); ?> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_7"><?php echo $this->lang->line('reports'); ?> </a>
                    </li>
                    
                </ul>                    

                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
   						<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Price
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="price"  <?php echo get_ap_2('users',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>

							
						</div>

                     <div class="tab-pane" id="m_tabs_project" role="tabpanel">
                       	

                       	  <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Add Price
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="add_price"  value="1" class="input-check"  <?php echo get_ap_2('add_price',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="add_price"  value="0" class="input-check"  <?php echo get_ap_2('add_price',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
									
								</div>
							</div>


							<div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">
										Show the Project 
									</label>
									<div class="col-lg-10 checkbox_div">
										
										<label class="radio-inline"><input type="radio" name="project_show"  value="0" class="input-check"  <?php echo get_ap_2('project_show',$operator_id) == 0 ? "checked" :"" ;?>  > His Task</label>
										<label class="radio-inline"><input type="radio" name="project_show"  value="1" class="input-check"  <?php echo get_ap_2('project_show',$operator_id) == 1 ? "checked" :"" ;?> > All Task</label>
										<label class="radio-inline"><input type="radio" name="project_show"  value="2" class="input-check" <?php echo get_ap_2('project_show',$operator_id) == 2 ? "checked" :"" ;?>  > Department </label>
									
									</div>
								</div>


							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Archived List
								</label>
								<div class="col-lg-10 checkbox_div">							
									<label class="radio-inline"><input type="radio" name="archived_list"  value="1" class="input-check"  <?php echo get_ap_2('archived_list',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="archived_list"  value="0" class="input-check"  <?php echo get_ap_2('archived_list',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>			
								</div>
							</div>

							 <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Template
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="template"  value="1" class="input-check"  <?php echo get_ap_2('template',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="template"  value="0" class="input-check"  <?php echo get_ap_2('template',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
								</div>
							</div>


							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Delete List
								</label>
								<div class="col-lg-10 checkbox_div">							
									<label class="radio-inline"><input type="radio" name="delete_list"  value="1" class="input-check"  <?php echo get_ap_2('delete_list',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="delete_list"  value="0" class="input-check"  <?php echo get_ap_2('delete_list',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>			
								</div>
							</div>



							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Create Project
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="create_project"  value="1" class="input-check"  <?php echo get_ap_2('create_project',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="create_project"  value="0" class="input-check"  <?php echo get_ap_2('create_project',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
									
								</div>
							</div>


							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Archived Project
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="archived_project"  value="1" class="input-check"  <?php echo get_ap_2('archived_project',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="archived_project"  value="0" class="input-check"  <?php echo get_ap_2('archived_project',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
									
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Edit Project
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="edit_project"  value="1" class="input-check"  <?php echo get_ap_2('edit_project',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="edit_project"  value="0" class="input-check"  <?php echo get_ap_2('edit_project',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
									
								</div>
							</div>


							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Delete Project
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="delete_project"  value="1" class="input-check"  <?php echo get_ap_2('delete_project',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="delete_project"  value="0" class="input-check"  <?php echo get_ap_2('delete_project',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
								</div>
							</div>



							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Add Board
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="add_list"  value="1" class="input-check"  <?php echo get_ap_2('add_list',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="add_list"  value="0" class="input-check"  <?php echo get_ap_2('add_list',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
								</div>
							</div>


							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Delete Board
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="delete_board"  value="1" class="input-check"  <?php echo get_ap_2('delete_board',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="delete_board"  value="0" class="input-check"  <?php echo get_ap_2('delete_board',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
								</div>
							</div>

                    </div>

                  	<div class="tab-pane" id="m_tabs_2_2" role="tabpanel"> 	 
                  		<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Add price
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="add_price"  <?php echo get_ap_2('add_price',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>

							<!-- <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									User Add
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="users_add"  <?php echo get_ap_2('users_add',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div> -->
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Price Edit
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="price_edit"  <?php echo get_ap_2('price_edit',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Price Delete
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="price_delete"  <?php echo get_ap_2('price_delete',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
					</div>

                    <div class="tab-pane" id="m_tabs_2_3" role="tabpanel">
                       	
                       	  <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Transition
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="Transition"  value="1" class="input-check"  <?php echo get_ap_2('Transition',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="Transition"  value="0" class="input-check"  <?php echo get_ap_2('Transition',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
									
								</div>
							</div>

<!-- 

							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Show Member
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="show_members"  value="1" class="input-check"  <?php echo get_ap_2('show_members',$operator_id) == 1 ? "checked" :"" ;?> > All</label>

									<label class="radio-inline"><input type="radio" name="show_members"  value="2" class="input-check"  <?php echo get_ap_2('show_members',$operator_id) == 2  ? "checked" :"" ;?> > My Deparment</label>

									<label class="radio-inline"><input type="radio" name="show_members"  value="0" class="input-check"  <?php echo get_ap_2('show_members',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
																	
								</div>
							</div> -->

							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Add Transition
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="add_transition"  value="1" class="input-check"  <?php echo get_ap_2('add_transition',$operator_id) == 1 ? "checked" :"" ;?> > All</label>

									<label class="radio-inline"><input type="radio" name="add_transition"  value="2" class="input-check"  <?php echo get_ap_2('add_transition',$operator_id) == 2  ? "checked" :"" ;?> > My Deparment</label>

									<label class="radio-inline"><input type="radio" name="add_transition"  value="0" class="input-check"  <?php echo get_ap_2('add_transition',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
																	
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Edit Transition
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="edit_members"  value="1" class="input-check"  <?php echo get_ap_2('edit_members',$operator_id) == 1 ? "checked" :"" ;?> > All</label>

									<label class="radio-inline"><input type="radio" name="edit_Transition"  value="2" class="input-check"  <?php echo get_ap_2('edit_Transition',$operator_id) == 2  ? "checked" :"" ;?> > My Deparment</label>

									<label class="radio-inline"><input type="radio" name="edit_Transition"  value="0" class="input-check"  <?php echo get_ap_2('edit_Transition',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
																	
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Change Password
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="change_pass_member"  value="1" class="input-check"  <?php echo get_ap_2('change_pass_member',$operator_id) == 1 ? "checked" :"" ;?> > All</label>

									<label class="radio-inline"><input type="radio" name="change_pass_member"  value="2" class="input-check"  <?php echo get_ap_2('change_pass_member',$operator_id) == 2  ? "checked" :"" ;?> >Enable</label>

									<label class="radio-inline"><input type="radio" name="change_pass_member"  value="0" class="input-check"  <?php echo get_ap_2('change_pass_member',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
																	
								</div>
							</div>


							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Change Group
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="change_group_member"  value="1" class="input-check"  <?php echo get_ap_2('change_group_member',$operator_id) == 1 ? "checked" :"" ;?> > All</label>

									<label class="radio-inline"><input type="radio" name="change_group_member"  value="2" class="input-check"  <?php echo get_ap_2('change_group_member',$operator_id) == 2  ? "checked" :"" ;?> > My Deparment</label>

									<label class="radio-inline"><input type="radio" name="change_group_member"  value="0" class="input-check"  <?php echo get_ap_2('change_group_member',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
																	
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Show Activity 
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="show_activity_member"  value="1" class="input-check"  <?php echo get_ap_2('show_activity_member',$operator_id) == 1 ? "checked" :"" ;?> > All</label>

									<label class="radio-inline"><input type="radio" name="show_activity_member"  value="2" class="input-check"  <?php echo get_ap_2('show_activity_member',$operator_id) == 2  ? "checked" :"" ;?> > My Deparment</label>

									<label class="radio-inline"><input type="radio" name="show_activity_member"  value="0" class="input-check"  <?php echo get_ap_2('show_activity_member',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
																	
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Delete Transition 
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="delete_transition"  value="1" class="input-check"  <?php echo get_ap_2('delete_transition',$operator_id) == 1 ? "checked" :"" ;?> > All</label>

									<label class="radio-inline"><input type="radio" name="delete_transition"  value="2" class="input-check"  <?php echo get_ap_2('delete_transition',$operator_id) == 2  ? "checked" :"" ;?> > My Deparment</label>

									<label class="radio-inline"><input type="radio" name="delete_transition"  value="0" class="input-check"  <?php echo get_ap_2('delete_transition',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
																	
								</div>
							</div>

							<!-- <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Change Mail
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="change_mail_member"  value="1" class="input-check"  <?php echo get_ap_2('change_mail_member',$operator_id) == 1 ? "checked" :"" ;?> > All</label>

									<label class="radio-inline"><input type="radio" name="change_mail_member"  value="2" class="input-check"  <?php echo get_ap_2('change_mail_member',$operator_id) == 2  ? "checked" :"" ;?> > My Deparment</label>

									<label class="radio-inline"><input type="radio" name="change_mail_member"  value="0" class="input-check"  <?php echo get_ap_2('change_mail_member',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
						
								</div>
							</div> -->



                    </div>
                    <!-- <div class="tab-pane" id="m_tabs_2_3" role="tabpanel">

                    	<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									GROUPS
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="groups"  value="1" class="input-check"  <?php echo get_ap_2('groups',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="groups"  value="0" class="input-check"  <?php echo get_ap_2('groups',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
									
								</div>
							</div>
                       
                    </div> -->
                    <div class="tab-pane" id="m_tabs_2_4" role="tabpanel">
                        	
                        	<!-- <div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									LANGAUGES
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="language"  value="1" class="input-check"  <?php echo get_ap_2('language',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="language"  value="0" class="input-check"  <?php echo get_ap_2('language',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
									
								</div>
							</div> -->
                    </div>



                    <div class="tab-pane" id="m_tabs_2_5" role="tabpanel">
                        	
                        <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
   						<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									User
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="users"  <?php echo get_ap_2('users',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>

							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									User Add
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="users_add"  <?php echo get_ap_2('users_add',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1"   >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									User Edit
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="users_edit"  <?php echo get_ap_2('users_edit',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									User Delete
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<span class="kt-switch kt-switch--info">
										<label>
											<input type="checkbox" name="users_delete"  <?php echo get_ap_2('users_delete',$operator_id) ==1  ? "checked" :"" ;?>  class="switch-input"  value="1" >
											<span></span>
										</label>
									</span>
		
								</div>
							</div>
						</div>
                    </div>


                    <div class="tab-pane" id="m_tabs_2_6" role="tabpanel">
                        	
                        	<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									SETTING 
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="setting"  value="1" class="input-check"  <?php echo get_ap_2('setting',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="setting"  value="0" class="input-check"  <?php echo get_ap_2('setting',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
									
								</div>
							</div>


							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Plugin 
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="plugin"  value="1" class="input-check"  <?php echo get_ap_2('plugin',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="plugin"  value="0" class="input-check"  <?php echo get_ap_2('plugin',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
		
								</div>
							</div>

														<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Export SQL
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="export_sql"  value="1" class="input-check"  <?php echo get_ap_2('export_sql',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="export_sql"  value="0" class="input-check"  <?php echo get_ap_2('export_sql',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
		
								</div>
							</div>


							<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									Update Database 
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="update_database"  value="1" class="input-check"  <?php echo get_ap_2('update_database',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="update_database"  value="0" class="input-check"  <?php echo get_ap_2('update_database',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
		
								</div>
							</div>


                    </div>

                     <div class="tab-pane" id="m_tabs_2_7" role="tabpanel">
                        	
                        	<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									REPORT 
								</label>
								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="reports"  value="1" class="input-check"  <?php echo get_ap_2('reports',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="reports"  value="0" class="input-check"  <?php echo get_ap_2('reports',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
								</div>
							</div>


                        	<div class="form-group m-form__group row">
								<label class="col-lg-2 col-form-label">
									REPORT  BUILDER
								</label>

								<div class="col-lg-10 checkbox_div">
									
									<label class="radio-inline"><input type="radio" name="reports_builder"  value="1" class="input-check"  <?php echo get_ap_2('reports_builder',$operator_id) ==1  ? "checked" :"" ;?> > Enable</label>

									<label class="radio-inline"><input type="radio" name="reports_builder"  value="0" class="input-check"  <?php echo get_ap_2('reports_builder',$operator_id) == 0 ? "checked" :"" ;?> > Disabled</label>	
								
								</div>

								
							</div>

							<div class="form-group m-form__group row">
									<label class="col-lg-2 col-form-label">
										Reports 
									</label>
									<div class="col-lg-10 checkbox_div">
									
										<label class="radio-inline"><input type="radio" name="reports_by"  value="1" class="input-check"  <?php echo get_ap_2('reports_by',$operator_id) == 1 ? "checked" :"" ;?>  > His Task</label>
										<label class="radio-inline"><input type="radio" name="reports_by"  value="2" class="input-check"  <?php echo get_ap_2('reports_by',$operator_id) == 2 ? "checked" :"" ;?> > All Task</label>
										<label class="radio-inline"><input type="radio" name="reports_by"  value="3" class="input-check" <?php echo get_ap_2('reports_by',$operator_id) == 3 ? "checked" :"" ;?>  > Department </label>
										<!-- <label class="radio-inline"><input type="radio" name="show_task"  value="4" class="input-check"  > Custom Members</label> -->
									
										
									</div>
								</div>


							

                    </div>

                </div>      
            </div>
        </div>
        <!--end::Portlet-->

										
												
											
											
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
</div>                                             </div>
</div>                                     </form>
<!--end::Form-->                                 </div>


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