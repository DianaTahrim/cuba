<?php 
ob_start();
session_start();
include('inc/header.php');
include 'Inventory.php';
$inventory = new Inventory();
$inventory->checkLogin();
?>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/brand.js"></script>
<script src="js/common.js"></script>
<?php include('inc/container.php');?>
<div class="container">		
		
	<?php include("menus.php"); ?> 	
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-default rounded-0 shadow">
                <div class="card-header">
                	<div class="row">
                		<div class="col-md-9">
                			<h3 class="card-title">Senarai Jenama</h3>
                		</div>
                		<div class="col-md-3 text-end">
                			<button type="button" name="add" id="addBrand" class="btn btn-primary bg-gradient btn-sm rounded-0"><i class="far fa-plus-square"></i> Tambah Jenama</button>
                		</div>
                	</div>
                </div>
                <div class="card-body">
                	<table id="brandList" class="table table-bordered table-striped">
                		<thead>
							<tr>
								<th>ID</th>
								<th>Jenama</th>
								<th>Kategori</th>
								<th>Status</th>
								<th>Tindakan</th>
							</tr>
						</thead>
                	</table>
                </div>
            </div>
        </div>
    </div>
    <div id="brandModal" class="modal fade">
    	<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
    				<div class="modal-header">
                                                <h2>Tambah Kategori</h2>
    					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    				</div>
    				<div class="modal-body">
    					<form method="post" id="brandForm">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="btn_action" id="btn_action" />
							<div class="mb-3">
								<select name="categoryid" id="categoryid" class="form-select rounde-0" required>
									<option value="">Pilih Kategori</option>
									<?php echo $inventory->categoryDropdownList(); ?>
								</select>
							</div>
							<div class="mb-3">
								<label>Masukkan Nama Jenama</label>
								<input type="text" name="bname" id="bname" class="form-control  rounde-0" required />
							</div>
    					</form>
    				</div>
    				<div class="modal-footer">
    					<button type="submit" name="action" id="action" class="btn btn-success btn-sm rounded-0" value="Add" form="brandForm"/>Tambah</button>
    					<button type="button" class="btn btn-default btn-sm rounded-0" data-bs-dismiss="modal">Tutup</button>
    				</div>
    			</div>
    	</div>
    </div>
</div>	
<?php include('inc/footer.php');?>