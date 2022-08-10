    <div class="breadcrumb-section breadcrumb-bg">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-8 offset-lg-2 text-center">
	                <div class="breadcrumb-text">
	                    <p>See more Details</p>
	                    <h1>List Product</h1>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
    <!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
            <div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3>List <span class="orange-text">Produk</span></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <div class="card">
                            <div class="card-body">
                                <form id="form-filter">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="cari"></label>
                                            <input type="text" name="cari" class="form-control form-control-lg" placeholder="Cari Produk" id="cari">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="umkm"></label>
                                            <select id="umkm" name="umkm" class="form-control form-control-lg">
                                                <option value="">- Pilih UMKM -</option>
                                                <?php foreach($umkm as $u){ ?>
                                                    <option value="<?= $u->id?>"><?= $u->nama?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="kategori"></label>
                                            <select id="kategori" class="form-control form-control-lg">
                                                <option value="">- Pilih Kategori -</option>
                                                <?php foreach($kategori_produk as $kp){ ?>
                                                    <option value="<?= $kp->id?>"><?= $kp->nama?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="jenis"></label>
                                            <select id="jenis" class="form-control form-control-lg">
                                                <option value="TERLARIS">Terlaris</option>
                                                <option value="TERBARU">Terbaru</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="list-produk"></div>			
		</div>
	</div>