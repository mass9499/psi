<?php 
$data['title'] = "Dashboard";
$this->load->view('common/header',$data);
?>


<style type="text/css">
	.kt-widget17 .kt-widget17__stats{ margin: 0; }
</style>
			<!-- begin:: Content -->
			<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
					<!--Begin::Row-->
							<div class="row">
								<div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">

									<!--begin:: Widgets/Activity-->
									<div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
										<div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
													Activity
												</h3>
											</div>
											
										</div>
										<div class="kt-portlet__body kt-portlet__body--fit">
											<div class="kt-widget17">
												
												<div class="kt-widget17__stats">
													<div class="kt-widget17__items">
														<div class="kt-widget17__item">
															<span class="kt-widget17__subtitle">
																  <canvas id="gender"></canvas>
															</span>
														
														</div>
														
													</div>
												</div>
											</div>
										</div>
									</div>

									<!--end:: Widgets/Activity-->
								</div>

                                <div class="col-lg-6 col-xl-6 order-lg-1 order-xl-1">

                                    <!--begin:: Widgets/Activity-->
                                    <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                                        <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                                            <div class="kt-portlet__head-label">
                                                <h3 class="kt-portlet__head-title">
                                                    Activity
                                                </h3>
                                            </div>
                                            
                                        </div>
                                        <div class="kt-portlet__body kt-portlet__body--fit">
                                            <div class="kt-widget17">
                                                
                                                <div class="kt-widget17__stats">
                                                    <div class="kt-widget17__items">
                                                        <div class="kt-widget17__item">
                                                            <span class="kt-widget17__subtitle">
                                                                  <canvas id="gender1"></canvas>
                                                            </span>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end:: Widgets/Activity-->
                                </div>


			</div>


      
<?php 
   // pr($results);
    $inculde['js'][] ='assets/plugins/Chart.min.js';
    $this->load->view('common/script',$inculde);    
    ?>
<?php $this->load->view('common/script');?>

    <script>
        var ctx = document.getElementById('gender').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Male", "Female"],
        datasets: [{
            label: "Gender",
          backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
           borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            data: [<?php echo $patient_m;?>, <?php echo $patient_f;?>],
        }]
    },

    options: {}
});

//
       var ctx = document.getElementById("gender1").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["0-20%", "20-40%", "40-60%", "60-80%", "80-100%"],
        datasets: [{
            label: '# of Patient',
            data: [<?php echo $results['first'] ;?>, <?php echo $results['second'] ;?>, <?php echo $results['third'] ;?>, <?php echo $results['four'] ;?>, <?php echo $results['five'] ;?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    userCallback: function(label, index, labels) {
                     // when the floored value is the same as the value we have a whole number
                     if (Math.floor(label) === label) {
                         return label;
                     }

                 },
                }
            }]
        }
    }
});
        </script>

<?php $this->load->view('common/footer');?>