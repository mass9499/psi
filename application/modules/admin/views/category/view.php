<?php 
$inculde['css'][] = 'assets/plugins/custom/datatables/datatables.bundle.css';
$this->load->view('common/header',$inculde);
$operator_id = $this->session->userdata("operator_id");
?>
<!-- <style media="print">
 @page  {
  size: auto;
  margin: 0;
       }
</style> -->

           <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg" id="headerdiv">
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
                                    <!-- 
                                             <p><button onclick="printDiv('printdiv')" class="btn btn-brand btn-elevate btn-icon-sm" id="printpagebutton">Print</button></p> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body" id="printdiv">

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
                                        <div class="alert alert-<?php echo $data_text ;?>" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                            <strong>
                                                <?php echo $message;?>
                                            </strong>
                                        
                                        </div>
                                    </div>
                                </div>
                        <?php }?>

            <table class="table table-bordered">
                <thead>
                    
                     <tr>
                        <th>Level </th> 
                        <td><?php echo $results->name;?></td>
                    </tr>
                      <tr>
                        <th>Description </th> 
                        <td><?php echo $results->description;?></td>
                    </tr>
                    <tr>
                        <th>Ordering </th> 
                        <td><?php echo $results->ordering;?></td>
                    </tr>
                    <tr>
                        <th>Status</th> 
                        <td>
                          <?php if($results->status==1) {  ?>
                              <span class="badge badge-success">Active</span>
                             <?php } else{ ?>
                                <span class="badge badge-danger">Deactivate</span>
                             <?php  }?>
                         </td>
                    </tr>
                  </thead>
              </table>
                
                        <?php if($questions){  $s=1; ?>
                           <h3>A&Q</h3>

                        <?php  foreach ($questions as $key => $value) {
                       $answer = $value->answer ? explode(",", $value->answer) : array();
                        $correct_answer = explode(",", $value->correct_answer);
                       ?>
                    
                                 <div>
                                   <h6>Question <?php echo$s++ ;?> : <?php echo $value->name;?></h6>
                                    <div>

                                           <?php foreach ($answer as $key2 => $value2) {
                         ?>
                      <img src="<?php echo base_url('assets/images/question/'.$value2) ;?>" class="full-width-home" height="100px" width="100px">
                        <?php if($correct_answer[$key2]!=0) {  ?>
                                            <span class="badge badge-success"> <i class="flaticon2-checkmark"></i></span>
                                           <?php } else{ ?>
                                              <span class="badge badge-danger"> <i class="flaticon2-delete"></i></span>
                                           <?php  }?>
                        <?php } ?>

                        
                                     </div>
                                    </div>
                                 
                                  <?php }  } else{ ?>

                                    <?php  }?>
                  

                        </div>
                    </div>
                </div>

                <!-- end:: Content -->
            </div>
      

<?php 
    $inculde['js'][] ='assets/plugins/custom/datatables/datatables.bundle.js';
    $this->load->view('common/script',$inculde);    
    ?>

   <!--  <script type="text/javascript">
   function printDiv(divName) {
  //  alert('GI');
     var printContents = document.getElementById(divName);
        printContents.style.visibility = 'hidden';
        headerdiv.style.visibility = 'hidden';
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents.innerHTML;
        window.print();
        document.body.innerHTML = originalContents;
        printContents.style.visibility = 'visible';


     

}
</script> -->



<?php $this->load->view('common/footer') ?>