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
                               level
                            </label>
                            <div class="col-lg-6">
                              <select class="form-control" name="level_id" id="level_id">
                                <option value="">Select Level</option>
                                <?php if($level){
                                    foreach ($level as $key => $value) {
                                        ?>
                                       <option value="<?php echo $value->id ;?>"  <?php echo $value->id == $result->level_id ? "selected" : "" ;?> ><?php echo $value->name ;?></option>
                                         
                                        <?php
                                    }
                                }?>

                                 
                            </select>
                            </div>
                        </div>


                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Question title
                            </label>
                            <div class="col-lg-6">
                            <input type="text" name="name" class="form-control" value="<?php echo $result->name;?>" required> 
                            </div>
                        </div>

                         <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Audio
                            </label>
                            <div class="col-lg-6">
                               <audio controls> <source src="<?php echo base_url('assets/images/question/'.$result->audio) ;?>" type="audio/mp3"> </audio>
                            <input type="file" name="audio" class="form-control" > 
                            <input type="hidden" name="audio" class="form-control" value="<?php echo $result->audio;?>" > 
                            </div>
                        </div>

  <?php if($answer){ $s=1;
    // pr($answer);die;
    ?>
     <?php foreach ($answer as $key => $value) { ?>
       <input type="hidden" name="answer_id" class="form-control" value="<?php echo $value->id;?>" required>
                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Image
                            </label>
                            <div class="col-lg-6 row">
                            <div class="col-lg-6">
                              <img src="<?php echo base_url(); ?>assets/images/question/<?php echo $value->answer; ?>" width="75" >
                            <input type="file" name="answer[]" class="form-control"> 
                             <input type="hidden" name="old_answer[]" class="form-control" value="<?php echo $result->answer;?>" required>
                           </div>
                              <div class="col-lg-2">
                                Answer
                              </div>
                            <div class="col-lg-2">
                                 <input type="radio" name="correct[<?php echo $key;?>]"  <?php echo $value->correct_answer ==1 ? "checked" : "" ; ?> >
                            </div>
                             </div>
                          
                        </div>
                            
   <?php } } ?>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               Max Time(sec)
                            </label>
                           
                            <div class="col-lg-6">
                            <input type="number" name="timing" class="form-control" value="<?php echo $result->timing;?>" required> 
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
                                       <a href="<?php echo base_url('admin/question');?>" class="btn btn-danger"><span>Cancel</span></a>

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