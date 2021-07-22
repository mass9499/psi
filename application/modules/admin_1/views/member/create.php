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
                                <a class="btn btn-brand btn-elevate btn-icon-sm" href="<?php echo base_url();?>admin/member">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

            <?php if(validation_errors()){ ?>
                <div class="m-alert m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <?php echo validation_errors(); ?>
                </div>
                <?php                                      
            }?>
                   <form method="post" action="" enctype="multipart/form-data" > 
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">


                                  <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">
                                       First Name
                                    </label>
                                    <div class="col-lg-6">
                                          <input type="text" class="form-control" name="firstname"required>
                                    </div>
                                </div>


                                  <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">
                                       Last Name
                                    </label>
                                    <div class="col-lg-6">
                                          <input type="text" class="form-control" name="lastname"required>
                                    </div>
                                </div>


                                  <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">
                                       Contact Number
                                    </label>
                                    <div class="col-lg-6">
                                           <input type="number" class="form-control" name="contact_no" required>
                                    </div>
                                </div>

                                  <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">
                                       Email
                                    </label>
                                    <div class="col-lg-6">
                                          <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">
                                       Password
                                    </label>
                                    <div class="col-lg-6">
                                         <input type="password" class="form-control" name="passwords" required>
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <label class="col-lg-2 col-form-label">
                                      User Type
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="operator_id" required>
                                           <option value="">-- Select User Type --</option>
                                             <?php foreach ($group as $row) { ?>
                                           <option value="<?php echo $row->id; ?>"><?php echo $row->group_name; ?></option>
                                                <?php } ?>
                                       </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions">
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-6">
                                        
                        <button class="btn btn-success"><span>Create</span></button>
                    <a href="<?php echo base_url('admin/member/index');?>" class="btn btn-danger"><span>Cancel</span></a>
                                    
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php $this->load->view('common/script');?>
<?php $this->load->view('common/footer');?>
