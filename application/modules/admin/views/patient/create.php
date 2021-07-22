<?php $this->load->view('common/header');?>
<style>
  .checkbox-right{
    float: right;
    margin-top: 12px;
  }
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
                    
           <form method="post" action="" enctype="multipart/form-data" id="user"> 
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Medical Record Number (MRN)
                            </label>
                            <div class="col-lg-6">
                               <input type="text" name="mrn" class="form-control"  required>
                                
                            </div>
                        </div>

                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               First Name
                            </label>
                            <div class="col-lg-6">
                            <input type="text" name="first_name" class="form-control" required> 
                            </div>
                        </div>
                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Second Name
                            </label>
                            <div class="col-lg-6">
                             <input type="text" name="second_name" class="form-control" required>  
                            </div>
                        </div>

                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Last Name
                            </label>
                            <div class="col-lg-6">
                             <input type="text" name="last_name" class="form-control" required>  
                            </div>
                        </div>


                         <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Nationality
                            </label>
                            <div class="col-lg-6">
                              <select class="form-control" name="country_id" id="country_id">
                                <option value="">Select Country</option>
                                <?php if($countries){
                                    foreach ($countries as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->id ;?>"><?php echo $value->countries_name ;?></option>
                                        <?php
                                    }
                                }?>
                            </select>
                            </div>
                        </div>

                         <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               City
                            </label>
                            <div class="col-lg-6">
                              <select class="form-control" name="city_id" id="city_id">
                                <option value="">Select City</option>
                                <?php if($cities){
                                    foreach ($cities as $key => $city) { ?>
                                    <option value="<?php echo $value->id ;?>" > <?php echo $city->city_name ;?></option>
                                <?php   } } ?>
                            </select>
                            </div>
                        </div>

                         <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Date of Birth
                            </label>
                            <div class="col-lg-6">
                               <input type="date" name="dob" class="form-control"  required>
                                
                            </div>
                        </div>
                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Gender
                            </label>
                            <div class="col-lg-6">
                              <select name="gender" class="form-control" required>
                                  <option value="">Select Gender</option>
                                  <option value="M">Male</option>
                                  <option value="F">Female</option>
                              </select>
                            </div>
                        </div>

                        
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Phone
                            </label>
                            <div class="col-lg-6">
                               <input type="text" name="mobile_no" class="form-control"  required>
                                
                            </div>
                        </div>

                        
                           <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Email
                            </label>
                            <div class="col-lg-6">
                             <input type="email" name="email" class="form-control"  required>
                                
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                             <div class="col-lg-6" style="background-color: #0057D9; color: white; text-align: center;">
                             <label class="col-form-label">LEFT EAR</label>   
                            </div>
                             <div class="col-lg-6" style="background-color: #FF0000; color: white; text-align: center;">
                             <label class="col-form-label">RIGHT EAR</label>   
                            </div>
                        </div>

                        <div class="row ">
                          <div class="col-lg-6" style="background-color: #0057D9; color: white">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="radio" value="1" name="left_normal_hear"  class="checkbox-right left l_normal_hear">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Normal Hearing</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="radio" value="2" name="left_normal_hear"  class="checkbox-right left l_normal_hear">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Hearing Loss</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                 <div class="col-lg-12" style="text-align: center;">
                                 <label class="col-form-label">What do you wear on the LEFT side?</label>   
                                 <hr>
                                </div>
                            </div>
                            <select class="form-control" name="left_hearing_device" id="left_hearing_device" disabled>
                                 <option value="">Select Hearing Device</option>
                                <option value="1">No Device</option>
                                <option value="2">A Hearing Aid </option>
                                <option value="3">Cochlear implant </option>
                                <option value="4">Hybrid system (Electroacoustic stimulation)</option>
                                <option value="5">Middle ear implant</option>
                                <option value="6">Bone condition implant </option>
                                <option value="7">Auditory Brainstem implant </option>
                                <option value="8">Adhesive bone conduction hearing aid (ADHEAR) </option>
                               
                            </select><br>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-10">
                                  <label class="col-form-label">When did you receive your hearing device?</label>   
                                </div>
                                <div class="col-lg-12">
                                    
                                    <input type="text" name="left_implant_date" id="left_implant_date" class="checkbox-right left form-control">
                                </div>
                            </div>
                          </div>


                          <div class="col-lg-6" style="background-color: #FF0000; color: white">
                            
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="radio" value="1" name="right_normal_hear"  class="checkbox-right right r_normal_hear">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Normal Hearing</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-1">
                                    <input type="radio" value="2" name="right_normal_hear"  class="checkbox-right right r_normal_hear">
                                </div>
                                 <div class="col-lg-5">
                                 <label class="col-form-label">Hearing Loss</label>   
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                 <div class="col-lg-12" style="text-align: center;">
                                 <label class="col-form-label">What do you wear on the RIGHT side?</label>   
                                 <hr>
                                </div>
                            </div>

                            <select class="form-control" id="right_hearing_device" name="right_hearing_device" disabled>
                                 <option value="">Select Hearing Device</option>
                                <option value="1">No Device</option>
                                <option value="2">A Hearing Aid </option>
                                <option value="3">Cochlear implant </option>
                                <option value="4">Hybrid system (Electroacoustic stimulation)</option>
                                <option value="5">Middle ear implant</option>
                                <option value="6">Bone condition implant </option>
                                <option value="7">Auditory Brainstem implant </option>
                                <option value="8">Adhesive bone conduction hearing aid (ADHEAR) </option>
                            </select><br>

                            <div class="form-group m-form__group row">
                                <div class="col-lg-10">
                                  <label class="col-form-label">When did you receive your hearing device?</label>   
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="right_implant_date"  id="right_implant_date" class="checkbox-right right form-control">
                                </div>
                            </div>
                          </div>
                        </div>
                        
                                    </div><br>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                
                                   <div class="offset-md-4">
                                       <button class="btn btn-success"><span>Create</span></button>
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
<script type="text/javascript">
     $("#user").validate();
</script>

<script type="text/javascript">
   

    
       $(".l_normal_hear").click(function(event){
        //alert($(this).val());
        if($(this).val()  == 1){
            $('#left_hearing_device').removeAttr("disabled");
        }
        else{
            
            $('#left_hearing_device').attr("disabled","disabled")
        }
    });
   
   
   $(".r_normal_hear").click(function(event){
      
        if($(this).val()  == 1){
            $('#right_hearing_device').removeAttr("disabled");
        }
        else{
            
            $('#right_hearing_device').attr("disabled","disabled")
        }
    });
    
    //  $("#r_hear_loss").click(function(event){

    //     $('#right_hearing_device').attr("disabled","disabled")
    // });
   $("#left_implant_date").datepicker({ "format" : "yyyy-mm-dd"})
   $("#right_implant_date").datepicker({ "format" : "yyyy-mm-dd"});
   

</script>
<?php $this->load->view('common/footer');?>