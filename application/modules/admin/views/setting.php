<?php 
$data['title'] = "Dashboard";
$this->load->view('common/header',$data);
?>
						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
							<!--Begin:: App Content-->
								<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
									<div class="row">
										<div class="col-xl-12">
											<div class="kt-portlet">
												<div class="kt-portlet__head">
													<div class="kt-portlet__head-label">
														<h3 class="kt-portlet__head-title">Account Information </h3>
													</div>
													
												</div>
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
									<form class="" action="" method="post" enctype='multipart/form-data' >
										<div class="m-portlet__body">
											<div class="m-form__section m-form__section--first">
												
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														<?php echo $this->lang->line('setting_site_name'); ?>
													</label>
													<div class="col-lg-6">
														<input type="text" class="form-control m-input" placeholder="Site Name" name="site_name" value="<?php echo set_value('site_name',$result->site_name);?>">
													
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														<?php echo $this->lang->line('setting_logo'); ?>
													</label>
													<div class="col-lg-6">
														
														<input type="file" class="form-control m-input" placeholder="" name="logo" value="">
														<img src="<?php echo base_url('assets/images/logos/'.$result->logo);?>" width="100" >
														
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														<?php echo $this->lang->line('setting_fav_icon_32_32'); ?>

													</label>
													<div class="col-lg-6">
														
														<input type="file" class="form-control m-input" placeholder="" name="fav" value="">
														<img src="<?php echo base_url('assets/images/logos/'.$result->fav);?>" width="50" >
														
													</div>
												</div>



												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														<?php echo $this->lang->line('setting_default_language'); ?>
													</label>
													<div class="col-lg-6">
														<select class="form-control m-input" name="default_language">
															<option value="english" <?php echo $result->default_language == 'english' ? "selected" :"";?> ><?php echo $this->lang->line('setting_english'); ?></option>
															<option value="arabic" <?php echo $result->default_language == 'arabic'  ? "selected" :"";?>  ><?php echo $this->lang->line('setting_arabic'); ?></option>
														</select>														
													</div>
												</div>

												
												
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														<?php echo $this->lang->line('default_time_zone'); ?>
													</label>
													<div class="col-lg-6">
														<select class="form-control m-input" name="default_timezone" id="default_timezone">
															<option value="<?php echo $result->default_timezone;?>"><?php echo $result->default_timezone;?></option>
															 <option value="Pacific/Midway"      >(GMT-11:00) Midway Island</option>
															<option value="US/Samoa"            >(GMT-11:00) Samoa</option>
															<option value="US/Hawaii"           >(GMT-10:00) Hawaii</option>
															<option value="US/Alaska"           >(GMT-09:00) Alaska</option>
															<option value="US/Pacific"          >(GMT-08:00) Pacific Time (US &amp; Canada)</option>
															<option value="America/Tijuana"     >(GMT-08:00) Tijuana</option>
															<option value="US/Arizona"          >(GMT-07:00) Arizona</option>
															<option value="US/Mountain"         >(GMT-07:00) Mountain Time (US &amp; Canada)</option>
															<option value="America/Chihuahua"   >(GMT-07:00) Chihuahua</option>
															<option value="America/Mazatlan"    >(GMT-07:00) Mazatlan</option>
															<option value="America/Mexico_City" >(GMT-06:00) Mexico City</option>
															<option value="America/Monterrey"   >(GMT-06:00) Monterrey</option>
															<option value="Canada/Saskatchewan" >(GMT-06:00) Saskatchewan</option>
															<option value="US/Central"          >(GMT-06:00) Central Time (US &amp; Canada)</option>
															<option value="US/Eastern"          >(GMT-05:00) Eastern Time (US &amp; Canada)</option>
															<option value="US/East-Indiana"     >(GMT-05:00) Indiana (East)</option>
															<option value="America/Bogota"      >(GMT-05:00) Bogota</option>
															<option value="America/Lima"        >(GMT-05:00) Lima</option>
															<option value="America/Caracas"     >(GMT-04:30) Caracas</option>
															<option value="Canada/Atlantic"     >(GMT-04:00) Atlantic Time (Canada)</option>
															<option value="America/La_Paz"      >(GMT-04:00) La Paz</option>
															<option value="America/Santiago"    >(GMT-04:00) Santiago</option>
															<option value="Canada/Newfoundland" >(GMT-03:30) Newfoundland</option>
															<option value="America/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
															<option value="Greenland"           >(GMT-03:00) Greenland</option>
															<option value="Atlantic/Stanley"    >(GMT-02:00) Stanley</option>
															<option value="Atlantic/Azores"     >(GMT-01:00) Azores</option>
															<option value="Atlantic/Cape_Verde" >(GMT-01:00) Cape Verde Is.</option>
															<option value="Africa/Casablanca"   >(GMT) Casablanca</option>
															<option value="Europe/Dublin"       >(GMT) Dublin</option>
															<option value="Europe/Lisbon"       >(GMT) Lisbon</option>
															<option value="Europe/London"       >(GMT) London</option>
															<option value="Africa/Monrovia"     >(GMT) Monrovia</option>
															<option value="Europe/Amsterdam"    >(GMT+01:00) Amsterdam</option>
															<option value="Europe/Belgrade"     >(GMT+01:00) Belgrade</option>
															<option value="Europe/Berlin"       >(GMT+01:00) Berlin</option>
															<option value="Europe/Bratislava"   >(GMT+01:00) Bratislava</option>
															<option value="Europe/Brussels"     >(GMT+01:00) Brussels</option>
															<option value="Europe/Budapest"     >(GMT+01:00) Budapest</option>
															<option value="Europe/Copenhagen"   >(GMT+01:00) Copenhagen</option>
															<option value="Europe/Ljubljana"    >(GMT+01:00) Ljubljana</option>
															<option value="Europe/Madrid"       >(GMT+01:00) Madrid</option>
															<option value="Europe/Paris"        >(GMT+01:00) Paris</option>
															<option value="Europe/Prague"       >(GMT+01:00) Prague</option>
															<option value="Europe/Rome"         >(GMT+01:00) Rome</option>
															<option value="Europe/Sarajevo"     >(GMT+01:00) Sarajevo</option>
															<option value="Europe/Skopje"       >(GMT+01:00) Skopje</option>
															<option value="Europe/Stockholm"    >(GMT+01:00) Stockholm</option>
															<option value="Europe/Vienna"       >(GMT+01:00) Vienna</option>
															<option value="Europe/Warsaw"       >(GMT+01:00) Warsaw</option>
															<option value="Europe/Zagreb"       >(GMT+01:00) Zagreb</option>
															<option value="Europe/Athens"       >(GMT+02:00) Athens</option>
															<option value="Europe/Bucharest"    >(GMT+02:00) Bucharest</option>
															<option value="Africa/Cairo"        >(GMT+02:00) Cairo</option>
															<option value="Africa/Harare"       >(GMT+02:00) Harare</option>
															<option value="Europe/Helsinki"     >(GMT+02:00) Helsinki</option>
															<option value="Europe/Istanbul"     >(GMT+02:00) Istanbul</option>
															<option value="Asia/Jerusalem"      >(GMT+02:00) Jerusalem</option>
															<option value="Europe/Kiev"         >(GMT+02:00) Kyiv</option>
															<option value="Europe/Minsk"        >(GMT+02:00) Minsk</option>
															<option value="Europe/Riga"         >(GMT+02:00) Riga</option>
															<option value="Europe/Sofia"        >(GMT+02:00) Sofia</option>
															<option value="Europe/Tallinn"      >(GMT+02:00) Tallinn</option>
															<option value="Europe/Vilnius"      >(GMT+02:00) Vilnius</option>
															<option value="Asia/Baghdad"        >(GMT+03:00) Baghdad</option>
															<option value="Asia/Kuwait"         >(GMT+03:00) Kuwait</option>
															<option value="Africa/Nairobi"      >(GMT+03:00) Nairobi</option>
															<option value="Asia/Riyadh"         >(GMT+03:00) Riyadh</option>
															<option value="Europe/Moscow"       >(GMT+03:00) Moscow</option>
															<option value="Asia/Tehran"         >(GMT+03:30) Tehran</option>
															<option value="Asia/Baku"           >(GMT+04:00) Baku</option>
															<option value="Europe/Volgograd"    >(GMT+04:00) Volgograd</option>
															<option value="Asia/Muscat"         >(GMT+04:00) Muscat</option>
															<option value="Asia/Tbilisi"        >(GMT+04:00) Tbilisi</option>
															<option value="Asia/Yerevan"        >(GMT+04:00) Yerevan</option>
															<option value="Asia/Kabul"          >(GMT+04:30) Kabul</option>
															<option value="Asia/Karachi"        >(GMT+05:00) Karachi</option>
															<option value="Asia/Tashkent"       >(GMT+05:00) Tashkent</option>
															<option value="Asia/Kolkata"        >(GMT+05:30) Kolkata</option>
															<option value="Asia/Kathmandu"      >(GMT+05:45) Kathmandu</option>
															<option value="Asia/Yekaterinburg"  >(GMT+06:00) Ekaterinburg</option>
															<option value="Asia/Almaty"         >(GMT+06:00) Almaty</option>
															<option value="Asia/Dhaka"          >(GMT+06:00) Dhaka</option>
															<option value="Asia/Novosibirsk"    >(GMT+07:00) Novosibirsk</option>
															<option value="Asia/Bangkok"        >(GMT+07:00) Bangkok</option>
															<option value="Asia/Jakarta"        >(GMT+07:00) Jakarta</option>
															<option value="Asia/Krasnoyarsk"    >(GMT+08:00) Krasnoyarsk</option>
															<option value="Asia/Chongqing"      >(GMT+08:00) Chongqing</option>
															<option value="Asia/Hong_Kong"      >(GMT+08:00) Hong Kong</option>
															<option value="Asia/Kuala_Lumpur"   >(GMT+08:00) Kuala Lumpur</option>
															<option value="Australia/Perth"     >(GMT+08:00) Perth</option>
															<option value="Asia/Singapore"      >(GMT+08:00) Singapore</option>
															<option value="Asia/Taipei"         >(GMT+08:00) Taipei</option>
															<option value="Asia/Ulaanbaatar"    >(GMT+08:00) Ulaan Bataar</option>
															<option value="Asia/Urumqi"         >(GMT+08:00) Urumqi</option>
															<option value="Asia/Irkutsk"        >(GMT+09:00) Irkutsk</option>
															<option value="Asia/Seoul"          >(GMT+09:00) Seoul</option>
															<option value="Asia/Tokyo"          >(GMT+09:00) Tokyo</option>
															<option value="Australia/Adelaide"  >(GMT+09:30) Adelaide</option>
															<option value="Australia/Darwin"    >(GMT+09:30) Darwin</option>
															<option value="Asia/Yakutsk"        >(GMT+10:00) Yakutsk</option>
															<option value="Australia/Brisbane"  >(GMT+10:00) Brisbane</option>
															<option value="Australia/Canberra"  >(GMT+10:00) Canberra</option>
															<option value="Pacific/Guam"        >(GMT+10:00) Guam</option>
															<option value="Australia/Hobart"    >(GMT+10:00) Hobart</option>
															<option value="Australia/Melbourne" >(GMT+10:00) Melbourne</option>
															<option value="Pacific/Port_Moresby">(GMT+10:00) Port Moresby</option>
															<option value="Australia/Sydney"    >(GMT+10:00) Sydney</option>
															<option value="Asia/Vladivostok"    >(GMT+11:00) Vladivostok</option>
															<option value="Asia/Magadan"        >(GMT+12:00) Magadan</option>
															<option value="Pacific/Auckland"    >(GMT+12:00) Auckland</option>
															<option value="Pacific/Fiji"        >(GMT+12:00) Fiji</option>
														</select>														
													</div>
												</div>

											
											
										</div>


										<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														Registration Enable
													</label>
													<div class="col-lg-6">
														<input type="checkbox" name="register_mode" value="1" <?php echo $result->register_mode ==1 ? "checked"  :"" ;?> > 											
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														Default Group
													</label>
													<div class="col-lg-6">
														<select class="form-control" name="default_group" required="">
															<option  value="">Default Group</option>
															<?php if($operators){
																foreach ($operators as $operator) {
																?>
															<option value="<?php echo $operator->id;?>" <?php echo $result->default_group == $operator->id ? "selected" :"";?> ><?php echo $operator->name;?></option>
															<?php } } ?>	
														</select>
														
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														Default Type
													</label>
													<div class="col-lg-6">
														<select class="form-control" name="default_type" required="">
															<option  value="">Default Type</option>
															<option  value="1" <?php echo $result->default_type ==1  ?"selected" :"";?>>Enable</option>
															<option  value="0" <?php echo $result->default_type ==0  ?"selected" :"";?> >Disabled</option>
														</select>
														
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
													Task Default Days
													</label>
													<div class="col-lg-6">
														<input type="number" name="default_days" value="<?php echo $result->default_days;?>" class="form-control" > 											
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
													Task Default Time
													</label>
													<div class="col-lg-6">
														<input type="number" name="default_time" value="<?php echo $result->default_time;?>" class="form-control" > 											
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
													Task Page Limit
													</label>
													<div class="col-lg-6">
														<input type="number" name="page_limit" value="<?php echo $result->page_limit;?>" class="form-control" > 											
													</div>
												</div>


												<?php $default_color = json_decode($result->default_color);?>
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
													COLOUR
													</label>
													
													<div class="col-lg-2">
														Pending<br>
														<input type="text" name="default_color[pending]" value="<?php echo $default_color->pending;?>" class="form-control demo" id="pending" data-control="hue" value="" >
													</div>


													<div class="col-lg-2">
														Completed<br>
														<input type="text" name="default_color[completed]" value="<?php echo $default_color->completed;?>" class="form-control demo" id="completed" data-control="hue" value="" >
													</div>
													<div class="col-lg-2">
														Approved<br>
														<input type="text" name="default_color[approved]" value="<?php echo $default_color->approved;?>" class="form-control demo" id="approved" data-control="hue" >
													</div>
													<div class="col-lg-2">
														Transfered<br>
														<input type="text" name="default_color[transfered]" value="<?php echo $default_color->transfered;?>" class="form-control demo" id="transfered" data-control="hue" >
													</div>
													<div class="col-lg-2">
														Canceled<br>
														<input type="text" name="default_color[canceled]" value="<?php echo $default_color->canceled;?>" class="form-control demo" id="canceled" data-control="hue" >
													</div>

													<div class="col-lg-2">
														Stopped<br>
														<input type="text" name="default_color[stopped]" value="<?php echo $default_color->stopped;?>" class="form-control demo" id="stopped" data-control="hue" >
													</div>

												</div>


										<div class="m-portlet__foot m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions">
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-6">
														<button type="submit" class="btn btn-primary">
															<?php echo $this->lang->line('setting_submit'); ?>
														</button>
														
													</div>
												</div>
											</div>
										</div>
									</form>
									<!--end::Form-->
											</div>
										</div>
									</div>
								</div>

								<!--End:: App Content-->
						</div>

						<!-- end:: Content -->
					</div>
<?php $this->load->view('common/script');?>
<?php $this->load->view('common/footer');?>