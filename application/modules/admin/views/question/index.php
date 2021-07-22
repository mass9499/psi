<?php 
$inculde['css'][] = 'assets/plugins/custom/datatables/datatables.bundle.css';
$this->load->view('common/header',$inculde);
$this->operator_id = $this->session->userdata("operator_id");?>

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
                                    <?php if(get_ap('add_question',$this->operator_id)==1){ ?>
                                      
                                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="<?php echo base_url('admin/question/create');?>">Add New</a>

                                         <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">

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

                            <table class=" table table-striped table-bordered" id="dataTables">
                       <thead>
                        <tr>
                            <th>SNo</th>
                             <th>Level</th>
                            <th>Question Titel</th>
                            <th>Timing(Sec)</th>
                            <th>Order Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($results) {$s=1;
                            foreach ($results as  $result)
                            {
                                ?>
                                <tr>
                                    <td><?php echo $s++ ;?></td>
                                    <td><?php echo $result->level;?></td>
                                    <td><?php echo $result->name;?></td>
                                    <td><?php echo $result->timing;?></td>
                                     <td><?php echo $result->order_no;?></td>
                                   <td>
                                         <label class="switch">
                                              <input type="checkbox"  data-status="<?php echo $result->status;?>" data-id="<?php echo $result->id;?>"  class="switch-input update_status" <?php echo $result->status ==1 ? "checked" : "" ; ?> >
                                              <span class="slider-switch round"></span>
                                            </label>
                                    </td>

                                        <td>
                                             <a href="<?php echo base_url();?>admin/question/view/<?php echo $result->id ;?>" class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"><i class="fa fa-eye"></i></a>

                                            <?php if(get_ap('question_edit',$this->operator_id)==1){ ?>
                                                <a href="<?php echo base_url();?>admin/question/edit/<?php echo $result->id ;?>" class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"><i class="fa fa-edit"></i></a>

                                            <?php }?>
                                                <?php if(get_ap('question_delete',$this->operator_id)==1){ ?>
                                        <a href="<?php echo base_url();?>admin/question/delete/<?php echo $result->id ;?>" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only" onclick="return  confirm('are you sure?');"><i class="fa fa-trash"></i></a>
                                    <?php }?>
                                        </td>
                                  
                               </tr>
                           <?php }  }?>
                       </tbody>
                   </table>
                        </div>
                    </div>
                </div>

                <!-- end:: Content -->
            </div>

      <?php 
$inculde['js'][] ='assets/plugins/custom/datatables/datatables.bundle.js';
$this->load->view('common/script',$inculde); ?>
<script type="text/javascript">
    $("#dataTables").DataTable();
</script>

 <script type="text/javascript">
        $("#dataTables").DataTable();
         var b_url = "<?php echo base_url();?>"
     $('.update_status').change(function() {

        if($(this).is(":checked")) { var status = 1;}
        else{   var status = 2;  }
      
            var id= $(this).attr("data-id")
            //alert(id);
            $.ajax({
            url: b_url + "admin/question/status/" +id + "/" +status ,
            success: function(e) {
            }
            });
    });
  </script>
   <?php $this->load->view('common/footer');?>