<?php $this->load->view('common/header');?>
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
                                <a class="btn btn-brand btn-elevate btn-icon-sm" href="<?php echo base_url();?>admin/results">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

             <?php if(validation_errors()){ ?>

                <div class="m-alert m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <?php   echo validation_errors(); ?>
                </div>
                <?php                                      
            }?>
                    
          <form method="post" action="" enctype="multipart/form-data" id="user"> 
              
                <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Doctor
                            </label>
                            <div class="col-lg-6">
                              <select class="form-control" name="doctor_id" id="doctor_id">
                                <option value="">Select Doctor</option>
                                <?php if($doctor){

                                    foreach ($doctor as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->id ;?>" ><?php echo $value->first_name ;?>
                                            <?php echo $value->second_name ;?>
                                            <?php echo $value->last_name ;?>
                                        </option>
                                         
                                        <?php
                                    }
                                }?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Patient
                            </label>
                            <div class="col-lg-6">
                              <select class="form-control" name="patient_id" id="patient_id">
                                <option value="">Select Patient</option>
                                <?php if($patient){

                                    foreach ($patient as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->id ;?>" ><?php echo $value->first_name ;?>
                                            <?php echo $value->second_name ;?>
                                            <?php echo $value->last_name ;?>
                                        </option>
                                         
                                        <?php
                                    }
                                }?>
                            </select>
                            </div>
                        </div>
                <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">date
                        </label>
                        <div class="col-lg-6">
                             <input type="date" name="test_date" class="form-control" multiple="" required>
                        </div>
                </div>
                  <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               level
                            </label>
                            <div class="col-lg-6">
                              <select class="form-control" name="level" id="level">
                                <option value="">Select Level</option>
                                <?php if($level){
                                    foreach ($level as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value->id ;?>" ><?php echo $value->name ;?></option>
                                         
                                        <?php
                                    }
                                }?>
                            </select>
                            </div>
                        </div>
            
                <div class="offset-md-4">
                    <button class="btn btn-success"><span>Create</span></button>
                    <a href="<?php echo base_url('admin/results');?>" class="btn btn-danger"><span>Cancel</span></a>


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
<?php $this->load->view('common/footer');?>