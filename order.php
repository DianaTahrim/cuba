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
<script src="js/order.js"></script>
<script src="js/common.js"></script>
<?php include('inc/container.php');?>
<div class="container">		
		
	<?php include("menus.php"); ?> 	
	
	<div class="row">
			<div class="col-lg-12">
				<div class="card card-default rounded-0 shadow">
                    <div class="card-header">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="card-title">Urus Pesanan</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                                <button type="button" name="add" id="addOrder" class="btn btn-success btn-sm rounded-0"><i class="far fa-plus-square"></i> Pesanan Baharu</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="orderList" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th>ID</th>      
									<th>Produk</th>	
									<th>Jumlah Barang</th> 
									<th>Staf</th> 									
                                    <th>Tindakan</th>
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="orderModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2><i> Tambah Pesanan</i></h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="orderForm">
                            <input type="hidden" name="order_id" id="order_id" />
                            <input type="hidden" name="btn_action" id="btn_action" />
                                <div class="mb-3">
                                    <label>Nama Produk</label>
                                    <select name="product" id="product" class="form-select rounded-0" required>
                                        <option value="">Pilih Produk</option>
                                        <?php echo $inventory->productDropdownList();?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Jumlah Barang</label>
                                    <div class="input-group">
                                        <input type="text" name="shipped" id="shipped" class="form-control rounded-0" required />        
                                    </div>
                                </div> 
                                <div class="mb-3">
                                    <label>Nama Staf</label>
                                    <select name="customer" id="customer" class="form-select rounded-0" required>
                                        <option value="">Pilih Staf</option>
                                        <?php echo $inventory->customerDropdownList();?>
                                    </select>
                                </div>	
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="action" id="action" class="btn btn-success rounded-0" value="Add" form="orderForm"/>Tambah</button>
                            <button type="button" class="btn btn-default border rounded-0" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
            </div>
        </div>
</div>	
<?php include('inc/footer.php');?>