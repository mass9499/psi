<?php $this->load->view('common/header');?>
<style type="text/css">
 
  .checkmark-center {
    margin: 3px 55px;
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
                                <a class="btn btn-brand btn-elevate btn-icon-sm" href="<?php echo base_url();?>admin/question">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
         <form method="post" action="" enctype="multipart/form-data" id="user"> 
                <div class="m-portlet__body">
                    <div class="m-form__section m-form__section--first">

                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                              <b> Level</b>
                            </label>
                            <div class="col-lg-6">
                              <?php echo $result->level;?>
                            
                            </div>
                        </div>


                          <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                               <b> Question title</b>
                            </label>
                            <div class="col-lg-6">
                            <?php echo $result->name;?>
                            </div>
                        </div>

                         <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">
                                <b>Audio</b>
                            </label>
                            <div class="col-lg-6">
                           <audio controls> <source src="<?php echo base_url('assets/images/question/'.$result->audio) ;?>" type="audio/mp3"> </audio>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-3 col-form-label">
                               
                            </label>
                           
                           <h3>Answer</h3>
                            </div>
                        </div>

                  <?php if($answer){ $s=1;
                    // pr($answer);die;
                    ?>
    
                          <div class="our-services">
                            <div class="container">
                              <div class="vertical-space-30"></div>
                              <div class="row">
                                 <?php foreach ($answer as $key => $value) { ?>
                                <div class="col-md-2 col-xs-4 pd-0-5">
                                  <div class="our-services-box">
                                    <div class="img-box">
                                      <?php echo $s++ ;?>) 
                                       <img src="<?php echo base_url('assets/images/question/'.$value->answer) ;?>" class="full-width-home" height="100px" width="100px">
                                        <?php if($value->correct_answer ==1){?>
                                              <div class="badge badge-success checkmark-center"> <i class="flaticon2-checkmark"></i></div>
                                         <?php }; ?>
                                    </div>
                                  
                                  </div>
                                </div>
                                 <?php } ?>
                              </div>
                            </div>
                          </div>
                      
                      <?php } ?>


                            <div class="form-group m-form__group row">
                                <label class="col-lg-2 col-form-label">
                                   Max Time(sec)
                                </label>
                               
                                <div class="col-lg-6">
                                <?php echo $result->timing; ?>
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