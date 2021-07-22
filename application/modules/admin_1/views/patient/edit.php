<?php $this->load->view('common/header');?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<style>
  .checkbox-right{
    float: right;
    margin-top: 12px;
  }
</style>                            
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
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                                <a class="btn btn-brand btn-elevate btn-icon-sm" href="<?php echo base_url();?>admin/patient">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                 <?php if($this->session->flashdata('message')){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong> <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php } ?>

                    <?php if(validation_errors()){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong> <?php echo validation_errors(); ?>
                    </div>
                    <?php } ?>
                    
           <form method="post" action="" enctype="multipart/form-data" > 
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">

                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               First Name
                            </label>
                            <div class="col-lg-6">
                            <input type="text" name="first_name" class="form-control" value="<?php echo $result->first_name;?>" required> 
                            </div>
                        </div>

                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Second Name
                            </label>
                            <div class="col-lg-6">
                             <input type="text" name="second_name" class="form-control" value="<?php echo $result->second_name;?>"  required>  
                            </div>
                        </div>

                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Last Name
                            </label>
                            <div class="col-lg-6">
                             <input type="text" name="last_name" class="form-control" value="<?php echo $result->last_name;?>" required>  
                            </div>
                        </div>

                    <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Nationality
                            </label>
                            <div class="col-lg-6">
                             <select class="form-control" id="country_id" name="country_id">
                                <option value="">Select Country</option>
                                <?php if($countries){
                                    foreach ($countries as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->id ;?>"  <?php echo $value->id == $result->country_id ? "selected" : "" ;?> ><?php echo $value->countries_name ;?></option>
                                        <?php
                                    }
                                }?>
                            </select>
                            </div>
                        </div>



                         <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Date of Birth
                            </label>
                            <div class="col-lg-6">
                               <input type="date" name="dob" class="form-control"  value="<?php echo $result->dob;?>" required>
                                
                            </div>
                        </div>
                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Gender
                            </label>
                            <div class="col-lg-6">
                              <select name="gender" class="form-control" required="">
                                   <option value="M"  <?php echo $result->gender == "M" ? "selected" : "" ;?> >Male</option>
                                <option value="F"  <?php echo $result->gender == "F" ? "selected" : "" ;?> >Female</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Phone
                            </label>
                            <div class="col-lg-6">
                               <input type="text" name="mobile_no" class="form-control" value="<?php echo $result->mobile_no;?>" required>
                                
                            </div>
                        </div>

                           <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Email
                            </label>
                            <div class="col-lg-6">
                             <input type="email" name="email" class="form-control" value="<?php echo $result->email;?>"  readonly >
                                
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <div class="col-lg-2">
                                
                            </div>
                             <div class="col-lg-5">
                             <label class="col-form-label">LEFT EAR</label>   
                            </div>
                             <div class="col-lg-5">
                             <label class="col-form-label">RIGHT EAR</label>   
                            </div>
                        </div>
                        <div class="row ">
                          <div class="col-lg-6">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_normal_hear" class="checkbox-right" <?php echo $result->l_normal_hear == '1' ? 'checked':'' ;?>>
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Normal Hearing</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_hear_loss" <?php echo $result->l_hear_loss == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Hearing Loss</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                 <div class="col-lg-12" >
                                 <label class="col-form-label">What do you wear on the LEFT side?</label>  
                                 <hr> 
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_no_device"  <?php echo $result->l_no_device == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">No Device</label>   
                                </div>
                            </div>
                            
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_hear_aid"  <?php echo $result->l_hear_aid == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">A Hearing Aid</label>   
                                </div>
                            </div>
                           <!--  <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_hear_imp_system" <?php echo $result->l_hear_imp_system == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-11">
                                 <label class="col-form-label">A Hearing implement system, to be specific a:</label>   
                                </div>
                            </div> -->
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_cochlear_implant" <?php echo $result->l_cochlear_implant == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Cochlear implant</label>   
                                </div>
                            </div>
                           <!--  <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_cochlear_implant_ear" <?php echo $result->l_cochlear_implant_ear == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-11">
                                 <label class="col-form-label">Cochlear implant + integrated hearing Aid (EAS) </label>   
                                </div>
                            </div> -->

                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_hybrid_system" <?php echo $result->l_hybrid_system == '1' ? 'checked':'' ;?>  class="checkbox-right">
                                </div>
                                 <div class="col-lg-11">
                                 <label class="col-form-label"> Hybrid system (Electroacoustic stimulation) </label>   
                                </div>
                            </div>
                          
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_middle_ear" <?php echo $result->l_middle_ear == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Middle ear implant</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_bone_implant" <?php echo $result->l_bone_implant == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Bone condition implant</label>   
                                </div>
                            </div>
                              <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_brain_implant" <?php echo $result->l_brain_implant == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Auditory Brainstem implant</label>   
                                </div>
                            </div>

                             <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="l_adhesive_bone" <?php echo $result->l_adhesive_bone == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Adhesive bone conduction hearing aid 
(ADHEAR)</label>   
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-10">
                                  <label class="col-form-label">When did you receive your hearing  device?</label>   
                                </div>
                                <div class="col-lg-2">
                                    <input type="date" name="l_implant_date" class="checkbox-right" value="<?php echo @$result->l_implant_date ?>">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_normal_hear" <?php echo $result->r_normal_hear == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Normal Hearing</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_hear_loss" <?php echo $result->r_hear_loss == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Hearing Loss</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                 <div class="col-lg-12" >
                                 <label class="col-form-label">What do you wear on the RIGHT side?</label>   
                                 <hr>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_no_device" <?php echo $result->r_no_device == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">No Device</label>   
                                </div>
                            </div>
                            
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_hear_aid" <?php echo @$result->r_hear_aid == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">A Hearing Aid</label>   
                                </div>
                            </div>
                           <!--  <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_hear_imp_system" <?php echo $result->r_hear_imp_system == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-11" >
                                 <label class="col-form-label">A Hearing implement system, to be specific a:</label>   
                                </div>
                            </div> -->
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_cochlear_implant" <?php echo $result->r_cochlear_implant == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Cochlear implant</label>   
                                </div>
                            </div>
                            
                           <!--  <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_cochlear_implant_ear" <?php echo $result->r_cochlear_implant_ear == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-11">
                                 <label class="col-form-label">Cochlear implant + integrated hearing Aid (EAS) </label>   
                                </div>
                            </div> -->
                           

                           <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_hybrid_system"  <?php echo $result->r_hybrid_system == '1' ? 'checked':'' ;?>  class="checkbox-right">
                                </div>
                                 <div class="col-lg-11">
                                 <label class="col-form-label"> Hybrid system (Electroacoustic stimulation) </label>   
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_middle_ear" <?php echo $result->r_middle_ear == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Middle ear implant</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_bone_implant" <?php echo $result->r_bone_implant == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Bone condition implant</label>   
                                </div>
                            </div>
                             <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_brain_implant" <?php echo $result->r_brain_implant == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Auditory Brainstem implant</label>   
                                </div>
                            </div>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="checkbox" value="1" name="r_adhesive_bone" <?php echo $result->r_adhesive_bone == '1' ? 'checked':'' ;?> class="checkbox-right">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Adhesive bone conduction hearing aid 
(ADHEAR)</label>   
                                </div>
                            </div>


                            <div class="form-group m-form__group row">
                                <div class="col-lg-10">
                                  <label class="col-form-label">When did you receive your hearing  device?</label>   
                                </div>
                                <div class="col-lg-2">
                                    <input type="date" name="r_implant_date" class="checkbox-right" value="<?php echo @$result->r_implant_date;?>">
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
                                
                                   <div class="offset-md-4">
                                       <button class="btn btn-success"><span>Update</span></button>
                                       <a href="<?php echo base_url('admin/patient');?>" class="btn btn-danger"><span>Cancel</span></a>

                               </div>    
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
<?php $this->load->view('common/script');?>
<?php $this->load->view('common/footer');?>