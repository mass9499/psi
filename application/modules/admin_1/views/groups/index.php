<?php 
$inculde['css'][] = 'assets/plugins/custom/datatables/datatables.bundle.css';
$inculde['title'] = $title = "User";
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
					<?php if(get_ap('add_groups',$this->operator_id)==1){ ?>

					 <a class="btn btn-brand btn-elevate btn-icon-sm" href="<?php echo base_url('groups/create');?>"><i class="la la-plus"></i> Permission Add New</a>
				
                    <?php }?>
					
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
		<div class="m-alert m-alert--outline alert alert-<?php echo $data_text ;?>" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
						<strong>
							<?php echo $message;?>
						</strong>
					
					</div>
				</div>
			</div>
				<?php }?>


			<table class="table table-bordered m-table m-table--border-primary" id="datatables">
				<thead>
					<tr>
						<th>
							#
						</th>

						<th>
							Permission User Type
						</th>
					
						<th>
							Permission Action
						</th>
					</tr>
				</thead>
				<tbody>
					<?php  if($results){
						$s=1;
						foreach ($results as  $result) {
					?>
					<tr>
						<th scope="row">
							<?php echo $s++;?>
						</th>
						<td>
							<?php echo $result->group_name;?>
						</td>
						<td>
							
							<a href="<?php echo base_url('admin/groups/permission/'.$result->id);?>" class="btn btn-primary btn-sm " data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="<?php echo $this->lang->line('permission_permission'); ?>" ><i class="fa fa-lock"></i></a>
							
							<?php if(get_ap('add_groups',$this->operator_id)==1){ ?>
							
							<a href="<?php echo base_url('admin/groups/edit/'.$result->id);?>" class="btn btn-primary  btn-sm" data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="<?php echo $this->lang->line('permission_edit'); ?>" ><i class="fa fa-edit"></i></a>
							<?php }  ?>
							<?php if(get_ap('add_groups',$this->operator_id)==1){ ?>
							<a href="<?php echo base_url('admin/groups/delete/'.$result->id);?>" class="btn btn-danger  btn-sm" data-skin="dark" data-toggle="m-tooltip" data-placement="top" title="<?php echo $this->lang->line('permission_delete'); ?>" ><i class="fa fa-trash"></i></a>
						<?php }  ?>

						</td>
					</tr>
				<?php } } ?>
				</tbody>
			</table>
		</div>
	</div>
	<!--end::Section-->

</div>
							<!--end::Form-->
					
<?php 
	$inculde['js'][] ='assets/plugins/custom/datatables/datatables.bundle.js';
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
	</script>
<?php $this->load->view('common/footer') ?>