<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
        <section class="content">
        <div class="container-fluid">
            <div class="row block-header" style="background: #fff;padding: 10px;">
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <h2 style="padding: 5px;font-weight: 600;font-size: 22px;">
                   Employee
                    
                </h2>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
				
					<ol class="breadcrumb" style="float: right;">
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="active">Employee</li>
                            </ol>
				</div>
				<div class="col-12 ">
						<a href="<?php echo base_url(); ?>employee/Add_employee" class="btn btn-primary waves-effect">
							<i class="material-icons">add</i>
							<span> Add Employee</span>
						</a>
						<a href="<?php echo base_url(); ?>employee/Disciplinary" class="btn btn-primary waves-effect">
							<i class="material-icons">list</i>
							<span> Disciplinary List</span>
						</a>
                        
                    </div>
            </div>
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Employee List
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                                <th>PIN</th>
                                                <th>Email </th>
                                                <th>Contact </th>
                                                <th>User Type</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Employee Name</th>
                                                <th>PIN</th>
                                                <th>Email </th>
                                                <th>Contact </th>
                                                <th>User Type</th>
                                                <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($employee as $value): ?>
                                            <tr>
                                                <td title="<?php echo $value->first_name .' '.$value->last_name; ?>"><?php echo $value->first_name .' '.$value->last_name; ?></td>
                                                                                <td><?php echo $value->em_code; ?></td>
                                                <td><?php echo $value->em_email; ?></td>
                                                <td><?php echo $value->em_phone; ?></td>
                                                <td><?php echo $value->em_role; ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($value->em_id); ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light"><i class="material-icons">mode_edit</i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
<?php $this->load->view('backend/footer'); ?>
<script>
    $('#employees123').DataTable({
        "aaSorting": [[1,'asc']],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>