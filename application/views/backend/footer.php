<!-- Required Jquery -->
    <!-- <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\bower_components\modernizr\js\modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\bower_components\chart.js\js\Chart.js"></script>
    <!-- amchart js -->
    <script src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\widget\amchart\amcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\widget\amchart\serial.js"></script>
    <script src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\widget\amchart\light.js"></script>
    <script src="<?php echo base_url(); ?>assets\adminty\files\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\assets\js\SmoothScroll.js"></script>
    <script src="<?php echo base_url(); ?>assets\adminty\files\assets\js\pcoded.min.js"></script>
	
	<!-- data-table js -->
<script src="<?php echo base_url(); ?>assets\adminty\files\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets\adminty\files\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\data-table\js\jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\data-table\js\pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\data-table\js\vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets\adminty\files\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets\adminty\files\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets\adminty\files\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets\adminty\files\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets\adminty\files\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
	
    <!-- custom js -->
	<script src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\data-table\js\data-table-custom.js"></script>
    <script src="<?php echo base_url(); ?>assets\adminty\files\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\assets\js\script.min.js"></script>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\bower_components\switchery\js\switchery.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets\adminty\files\assets\pages\advance-elements\swithces.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script>
function clearname(){
	$('#chatuser').append();
} 

function abc(name, id){
	document.getElementById("to").value = id;
	$('#chatuser').append(name);
	$.ajax({
			type: 'POST',
			url: '<?php echo base_url('/Chat/personalunreadmsg') ?>',
			data: {id: id},
			//dataType: "json",
			
			success: function (data) {
				
				document.getElementById("messagebody").innerHTML = data;
				//$(".displayChatbox").load(" .displayChatbox");
				//debugger;
				//document.getElementById('scrollerdiv').scrollTop  = 0-$('#messagebody').position().top;
				document.getElementById('scrollerdiv').scrollTop = 3870;
			},
			error: function () {
				
			}

	});
	
}

function sentmessage(){
	var message = document.getElementById("message").value;
	var to = document.getElementById("to").value;

	$.ajax({
		type: 'POST',
		url: '<?php echo base_url('/Chat/send') ?>',
		data: {message: message, to: to},
		//dataType: "json",
		
		success: function (data) {
			var id = document.getElementById("to").value;
			
			
			$.ajax({
					type: 'POST',
					url: '<?php echo base_url('/Chat/personalunreadmsg') ?>',
					data: {id: id},
					//dataType: "json",
					
					success: function (data) {
						
						document.getElementById("messagebody").innerHTML = data;
						//$("#messagebody").load(" #messagebody");
						document.getElementById("message").value = "";
						//$(".displayChatbox").load(" .displayChatbox");
						document.getElementById('scrollerdiv').scrollTop = 3870;
						
					},
					error: function () {
						
					}

			});
			
		},
		error: function () {
			
		}

	});
}

	function allunreadmsg(){
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url('/Chat/allunreadmsg') ?>',
			//data: {message: message, to: to},
			//dataType: "json",
			
			success: function (data) {
				$(".displayChatbox").load(" .displayChatbox");
				
			},
			error: function () {
				
			}

		});
	}
	
	
	setInterval(function(){
		$(".displayChatbox").load(" .displayChatbox"); // this will run after every 5 seconds
		var id = document.getElementById("to").value;
		
		$.ajax({
					type: 'POST',
					url: '<?php echo base_url('/Chat/personalunreadmsg') ?>',
					data: {id: id},
					//dataType: "json",
					
					success: function (data) {
						
						document.getElementById("messagebody").innerHTML = data;
						//$("#messagebody").load(" #messagebody");
						//document.getElementById("message").value = "";
						//$(".displayChatbox").load(" .displayChatbox");
						//document.getElementById('scrollerdiv').scrollTop  = 3870;
						
					},
					error: function () {
						
					}

			});
		
	}, 5000);

</script>
</body>

</html>



<?php /*
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/chartjs/Chart.bundle.js"></script>

    
    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-sparkline/jquery.sparkline.js"></script>

	<!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/newtheme/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/newtheme/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/js/admin.js"></script>
     <script src="<?php echo base_url(); ?>assets/newtheme/js/pages/index.js"></script>
	<script src="<?php echo base_url(); ?>assets/newtheme/js/pages/forms/form-validation.js"></script>
	<script src="<?php echo base_url(); ?>assets/newtheme/js/pages/tables/jquery-datatable.js"></script>
	  <script src="<?php echo base_url(); ?>assets/newtheme/plugins/momentjs/moment.js"></script>
	  <script src="<?php echo base_url(); ?>assets/newtheme/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
 <script src="<?php echo base_url(); ?>assets/newtheme/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/newtheme/js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url(); ?>assets/newtheme/js/demo.js"></script>
	<script type="text/javascript">
        $(function () {
            $('.mydatetimepicker').datepicker({
            format: "mm-yyyy",
            viewMode: "years", 
            minViewMode: "months"   
            });
        });
        $(function () {
            $('.mydatetimepickerFull').datepicker({
            format: "yyyy-mm-dd"   
            });
        });
    </script>      
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
  
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });        
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    
    
    
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });



    
    

    </script>
<script type="text/javascript">
$('form').each(function() {
    $(this).validate({
    submitHandler: function(form) {
        var formval = form;
        var url = $(form).attr('action');

        // Create an FormData object
        var data = new FormData(formval);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            // url: "crud/Add_userInfo",
            url: url,
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (response) {
                console.log(response);            
                $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                $('form').trigger("reset");
                window.setTimeout(function(){location.reload()},3000);
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
});
});

    </script> 
	
   

</body>

</html> 

*/?>