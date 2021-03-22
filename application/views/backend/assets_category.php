<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

 <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
            <div class="message"></div>
            <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4>Assets</h4>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="<?php echo base_url(); ?>"> <i class="feather icon-home"></i> </a>
                                                        </li>
                                                        
                                                        <li class="breadcrumb-item"><a href="#!">Assets Category</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-12">
                                           <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#assetsmodel" data-whatever="@getbootstrap" class="text-white TypeModal"><i class="" aria-hidden="true"></i> Add Category </a></button>
                  
                    </div>
                                    </div>
           
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">


               
                <div class="page-body">

            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                          
                            <div class="card-header">
                                <h4>  Assets Category List   </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    
                                        <thead>
                                            <tr>
                                                <th>ID </th>
                                                <th>Type</th>
                                                <th>Name </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID </th>
                                                <th>Type</th>
                                                <th>Name </th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach($catvalue as $value): ?>
                                            <tr>
                                                <td><?php echo $value->cat_id; ?></td>
                                                <td><?php echo $value->cat_status ?></td>
                                                <td><?php echo $value->cat_name; ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="" title="Edit" class="btn btn-sm btn-info waves-effect waves-light AssetsModal" data-id="<?php echo $value->cat_id; ?>"><i class="fa fa-pencil-square-o"></i></a>
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
            </div>
               <div class="modal fade" id="assetsmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Assets Category</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Assets_Category" id="assetsform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                        <div class="form-group">
                                       <label>Category Type </label>
                                        <select name="cattype" class="form-control custom-select" required>
                                            <option>Select Category</option>
                                            <option value="ASSETS">Assets</option>
                                            <option value="LOGISTIC">Logistice</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Category Name </label>
                                        <input type="text" name="catname" class="form-control" value="" placeholder="Category name..." minlength="2" required>
                                        </div>                                          
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="catid" value="" class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".AssetsModal").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#assetsform').trigger("reset");
                                                $('#assetsmodel').modal('show');
                                                $.ajax({
                                                    url: 'AssetscatByID?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
                                                    $('#assetsform').find('[name="catid"]').val(response.assetscatval.cat_id).end();
                                                    $('#assetsform').find('[name="catname"]').val(response.assetscatval.cat_name).end();
                                                    $('#assetsform').find('[name="cattype"]').val(response.assetscatval.cat_status).end();
/*                                                     if (response.assetsByid.Assets_type == 'Logistic')
                                                   $('#btnSubmit').find(':checkbox[name=type][value="Logistic"]').prop('checked', true);*/
                                                   
                                                });
                                            });
                                        });
</script>                             
<?php $this->load->view('backend/footer'); ?>
 