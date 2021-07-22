<?php 
$inculde['css'][] = 'assets/plugins/custom/datatables/datatables.bundle.css';
$this->load->view('common/header',$inculde);?>

<style type="text/css">
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider-switch {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider-switch:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider-switch {
  background-color: #2196F3;
}

input:focus + .slider-switch {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider-switch:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider-switch.round {
  border-radius: 34px;
}

.slider-switch.round:before {
  border-radius: 50%;
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
                                                
                            <a class="btn btn-success pull-right" href="<?php echo base_url('admin/cities/create');?>"><span>Create City  </span></a>

                            </div>
                        </div>
                    </div>
                </div>
            <div class="kt-portlet__body">
                
                   <?php if($this->session->userdata('message')){ ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <?php echo $this->session->userdata('message');?>
                                        </div>
                            <?php } ?>

                   <table class="table table-striped table-bordered" id="dataTables">
                 
                                <thead>
                                    <tr>
                                        <th>SNo</th>
                                       
                                        <th>Cities Name</th>
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
                                         <td><?php echo $result->city_name ;?></td>
                                        <td>
                                       <label class="switch">
                                          <input type="checkbox" <?php echo $result->status == 1 ? 'checked' : "";?>  data-status="<?php echo $result->status;?>" data-id="<?php echo $result->id;?>"  class="switch-input" >
                                          <span class="slider-switch round"></span>
                                      </label>
                                        </td>
                                        <td>
                                           
                                            <a href="<?php echo base_url();?>admin/cities/edit/<?php echo $result->id ;?>" class="btn btn-success m-btn m-btn--icon btn-sm m-btn--icon-only"><i class="fa fa-edit"></i></a>
                                          
                                            <a href="<?php echo base_url();?>admin/cities/delete/<?php echo $result->id ;?>" class="btn btn-danger m-btn m-btn--icon btn-sm m-btn--icon-only" onclick="return  confirm('are you sure?');"><i class="fa fa-trash"></i></a>
                                        
                                        </td>
                                      </tr>
                                    <?php }  }?>
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
      
<?php 
    $inculde['js'][] ='assets/plugins/custom/datatables/datatables.bundle.js';
    $this->load->view('common/script',$inculde);    
    ?>

    <script type="text/javascript">
    $("#dataTables").DataTable();
 

    var b_url = "<?php echo base_url();?>";
    $('.switch-input').change(function() {

        if($(this).is(":checked")) {
            var status = 1;
        }
        else{
            var status = 0;
        }
      
            var id= $(this).attr("data-id")
             // alert(b_url+ "admin/cities/status/" +id + "/" +status );
            $.ajax({
            url: b_url + "admin/cities/status/" +id + "/" +status ,
            success: function(e) {
            }

    });
});
</script>


<?php $this->load->view('common/footer');?>