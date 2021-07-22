<?php 
$inculde['css'][] = 'assets/plugins/custom/datatables/datatables.bundle.css';
$this->load->view('common/header',$inculde);
$operator_id = $this->session->userdata("operator_id");
?>
<style media="print">
 @page  {
  size: auto;
  margin: 0;
       }
</style>

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
                                    
                                             <p><button onclick="printDiv('printdiv')" class="btn btn-brand btn-elevate btn-icon-sm" id="printpagebutton">Print</button></p>

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
                        <th>Patient :</th>
                        <td><?php echo $results->f_n;?> <?php echo $results->s_n;?> <?php echo $results->l_n;?></td>
                    </tr>
                    <tr> 
                        <th>Doctor :</th>
                        <td><?php echo $results->d_f_n;?> <?php echo $results->d_s_n;?> <?php echo $results->d_l_n;?></td>
                    </tr>
                    <tr>
                        <th>Date :</th>
                        <td><?php echo $results->date;?></td>
                    </tr>
                     <tr>
                        <th>Level :</th> 
                        <td><?php echo $results->level;?></td>
                    </tr>
                    <tr>
                        <th>Score :</th> 
                        <td> <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $results->score;?>%"><?php echo $results->score;?>%</div></td>

                    </tr>
                    </thead>
                   </table>

                   <h3>A&Q</h3>
                    <?php if($questions) {
                          // pr($questions);die;
                        $s=1;
                            foreach ($questions as  $question)
                            {
                                ?>
                                 <div>
                                   <br>Question <?php echo$s++ ;?> : <?php echo $question->name;?>
                                    <span>
                                           <?php if($question->answer_status!=0) {  ?>
                                            <span class="badge badge-success"> <i class="flaticon2-checkmark"></i></span>
                                           <?php } else{ ?>
                                              <span class="badge badge-danger"> <i class="flaticon2-delete"></i></span>
                                           <?php  }?>
                                     </span>
                                    </div>
                                 
                                  <?php }  }?>
                  

                        </div>
                    </div>
                </div>

                <!-- end:: Content -->
            </div>
      

<?php 
    $inculde['js'][] ='assets/plugins/custom/datatables/datatables.bundle.js';
    $this->load->view('common/script',$inculde);    
    ?>

    <script type="text/javascript">
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
</script>



<?php $this->load->view('common/footer') ?>