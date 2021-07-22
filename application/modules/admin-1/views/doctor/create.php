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
                                <a class="btn btn-brand btn-elevate btn-icon-sm" href="<?php echo base_url();?>admin/doctor">Back</a>
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
                               Email
                            </label>
                            <div class="col-lg-6">
                             <input type="email" name="email1" class="form-control"  required>
                                
                            </div>
                        </div>

                           <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Password
                            </label>
                            <div class="col-lg-6">
                               <input type="password" name="password" class="form-control"  required>
                                
                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                              Confirm
                            </label>
                            <div class="col-lg-6">
                                <input type="password" name="confirm_password" class="form-control"  required>
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

                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6">
                                
                                   <div class="offset-md-4">
                                       <button class="btn btn-success"><span>Create</span></button>
                                       <a href="<?php echo base_url('admin/doctor');?>" class="btn btn-danger"><span>Cancel</span></a>

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
<?php $this->load->view('common/footer');?>