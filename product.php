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
<script src="js/product.js"></script>
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
                            	<h3 class="card-title">Senarai Produk</h3>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                                <button type="button" name="add" id="addProduct" class="btn btn-success bg-gradient rounded-0 btn-sm"><i class="far fa-plus-square"></i> Tambah Produk</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <table id="productList" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th>ID</th>      
									<th>Kategori</th>	
									<th>Jenama</th>									
                                    <th>Nama Produk</th>
									<th>Model Produk</th>
                                    <th>Kuantiti</th>
                                    <th>Pembekal</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr></thead>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>

        <div id="productModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 ><i> Tambah Produk</i></h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="productForm">
                                <input type="hidden" name="pid" id="pid" />
                                <input type="hidden" name="btn_action" id="btn_action" />
                                <div class="form-group">
                                    <label>Pilih Kategori</label>
                                    <select name="categoryid" id="categoryid" class="form-select rounded-0" required>
                                        <option value="">Pilih Kategori</option>
                                        <?php echo $inventory->categoryDropdownList();?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Jenama</label>
                                    <select name="brandid" id="brandid" class="form-select rounded-0" required>
                                        <option value="">Pilih Jenama</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="pname" id="pname" class="form-control rounded-0" required />
                                </div>
                                <div class="form-group">
                                    <label>Model Produk</label>
                                    <input type="text" name="pmodel" id="pmodel" class="form-control rounded-0" required />
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Produk</label>
                                    <textarea name="description" id="description" class="form-control rounded-0" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kuantiti Produk</label>
                                    <div class="input-group">
                                        <input type="text" name="quantity" id="quantity" class="form-control rounded-0" required pattern="[+-]?([0-9]*[.])?[0-9]+" /> 
                                        <select name="unit" class="form-select rounded-0" id="unit" required>
                                            <option value="">Pilih Unit</option>
                                            <option value="Bags">beg</option>
                                            <option value="Bottles">Bekas</option>
                                            <option value="Box">Kotak</option>
                                            <option value="Dozens">Dozen</option>
                                            <option value="Feet">Kaki</option>
                                            <option value="Gallon">Gelen</option>
                                            <option value="Grams">Grams</option>
                                            <option value="Inch">Inch</option>
                                            <option value="Kg">Kg</option>
                                            <option value="Liters">Liter</option>
                                            <option value="Meter">Meter</option>
                                            <option value="Nos">Rim</option>
                                            <option value="Packet">Paket</option>
                                            <option value="Rolls">Gulung</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Product Base Price</label>
                                    <input type="text" name="base_price" id="base_price" class="form-control rounded-0" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                                </div>
                                <div class="form-group">
                                    <label>Product Tax (%)</label>
                                    <input type="text" name="tax" id="tax" class="form-control rounded-0" required pattern="[+-]?([0-9]*[.])?[0-9]+" />
                                </div>
                                <div class="form-group">
                                    <label>Pembekal</label>
                                    <select name="supplierid" id="supplierid" class="form-select rounded-0" required>
                                        <option value="">Pilih Pembekal</option>
                                        <?php echo $inventory->supplierDropdownList();?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="action" id="action" class="btn btn-primary rounded-0 btn-sm" value="Add" form="productForm">Tambah</button>
                            <button type="button" class="btn btn-default border rounded-0 btn-sm" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
            </div>
        </div>

        <div id="productViewModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <form method="post" id="product_form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="fa fa-th-list"></i>Detail Produk</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <Div id="productDetails"></Div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	
</div>	
<?php include('inc/footer.php');?>