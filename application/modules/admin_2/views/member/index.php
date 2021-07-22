<?php 
$inculde['css'][] = 'assets/admin/plugins/custom/datatables/datatables.bundle.css';
$this->load->view('common/header',$inculde);
$operator_id = $this->session->userdata("operator_id");
?>

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
                                                     
                                            <a class="btn btn-brand btn-elevate btn-icon-sm" href="<?php echo base_url('admin/member/create');?>">Add New</a>
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

                            <table class="table table-striped table-bordered"  id="datatables">
                                <thead>
                                    <tr>
                                        <th>SNo</th>
                                        <th>Groups</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($results) {$s=1;
                                            foreach ($results as  $result) {
                                        ?>
                                      <tr>
                                        <td><?php echo $s++ ;?></td>
                                        <td><?php echo $result->group_name; ?></td>
                                        <td><?php echo @$result->firstname ;?> </td>
                                        <td><?php echo @$result->email ;?> </td>
                                        <td>
                                            <?php if($result->status ==0)
                                            { ?>
                                            <a href="<?php echo base_url();?>admin/member/status/<?php echo $result->id ; echo '/'; echo $result->status?>" class="btn btn-danger btn-sm" title="Edit tutors details">Deactive</a>
                                            <?php }
                                            else
                                            { ?>
                                            <a href="<?php echo base_url();?>admin/member/status/<?php echo $result->id ; echo '/'; echo $result->status?>" class="btn btn-success btn-sm" title="Edit tutors details">Active</a>
                                            <?php } ?>
                                        </td>
                               
                                        <td>
                                             
                                            <a href="<?php echo base_url();?>admin/member/edit/<?php echo $result->id ;?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                       
                                            <a href="<?php echo base_url();?>admin/member/delete/<?php echo $result->id ;?>" class="btn btn-danger btn-sm" onclick="return  confirm('are you sure?');" title="Delete"><i class="fa fa-trash"></i></a>
                                       
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
    $inculde['js'][] ='assets/admin/plugins/custom/datatables/datatables.bundle.js';
    $this->load->view('common/script',$inculde);    
    ?>
    <script type="text/javascript">

        $(document).ready(function() {
            var b_url = "<?php echo base_url();?>";
            var base_lang = $("body").attr("data-lang");
            $('#datatables').DataTable({
                //"language": {"url": b_url+"assets/js/"+base_lang +".json"}
            });
        });

         $('.status').change(function() {

            if($(this).is(":checked")) {
                var status = 2;
            }
            else{
                var status = 0;
            }
                alert(status);
                var id= $(this).attr("data-id")
                $.ajax({
                url: b_url + "admin/Member/status/" +id + "/" +status ,
                success: function(e) {
                }
                });
        });
             
    </script>
<?php $this->load->view('common/footer') ?>