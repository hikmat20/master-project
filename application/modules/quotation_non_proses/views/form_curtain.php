<!-- <div class="panel panel-solid detailCurtain"> -->
<!-- <div class="panel-body"> -->
<!-- <div class="box box-default"> -->
<div class="box-body">
	<div class="row">
		<!-- =================== SIDE LEFT ============================= -->
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label col-sm-3" for="product_curtain">Curtain Material <span class='text-red'>*</span></label>
				<div class="col-md-7">
					<strong>
						<select class="form-control required select2 product_curtain" data-id="" name="product_curtain[][id_product]" id="product_curtain">
							<option value=""></option>
							<?php
							$products = $this->db->get_where('pricelist_fabric_view', ['activation' => 'aktif'])->result();
							foreach ($products as $product) { ?>
								<option value="<?= $product->id_product ?>" <?= $product->id_product == $curtain[0]->id_product ? 'selected' : '' ?>><?= $product->name_product ?></option>
							<?php }
							?>
						</select>

						<label class="label label-danger product_curtain hideIt">Product Curtain Can't be empty!</label>
					</strong>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="product_curtain">Customer Product Name <span class='text-red'>*</span></label>
				<div class="col-md-7">
					<strong>
						<input type="text" class="form-control cust_curtain_name" data-id="" value="<?= $curtain[0]->cust_product_name ?>" name="product_curtain[][cust_curtain_name]" id="cust_curtain_name">
						<label class="label label-danger cust_curtain_name hideIt">Product Name Can't be empty!</label>
					</strong>
				</div>
			</div>

		</div>

		<!-- =================== SIDE RIGHT ============================= -->

		<div class="col-md-6">

			<div class="form-group">
				<label class="control-label col-sm-3" for="lebar_kain">Lebar Kain <span class='text-red'>*</span></label>
				<div class="col-md-7">
					<strong>
						<input type="text" value="<?= $curtain[0]->lebar_kain ?>" readonly class="form-control lebar_kain" placeholder="0" data-id="" name="product_curtain[][lebar_kain]" id="lebar_kain">
						<label class="label label-danger lebar_kain hideIt">Lebar Kain Can't be empty!</label>
					</strong>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="harga_kain">Harga Kain <span class='text-red'>*</span></label>
				<div class="col-md-7">
					<strong>
						<div class="input-group">
							<span class="input-group-addon">Rp.</span>
							<input type="hidden" value="<?= $curtain[0]->harga_kain ?>" class=" form-control text-right harga_kain" data-id="" readonly placeholder="0" min="0" name="product_curtain[][harga_kain]" id="harga_kain">
							<input type="text" value="<?= number_format($curtain[0]->t_harga_kain) ?>" class=" form-control text-right t_harga_kain" data-id="" readonly placeholder="0" min="0" name="product_curtain[][t_harga_kain]" id="t_harga_kain">
							<span class="input-group-addon">/m</span>
						</div>
						<label class="label label-danger harga_kain hideIt">Harga Kain Can't be empty!</label>
					</strong>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-3" for="harga_kain">Total Harga Kain <span class='text-red'>*</span></label>
				<div class="col-md-7">
					<strong>
						<div class="input-group">
							<span class="input-group-addon">Rp.</span>
							<input type="text" value="<?= number_format($curtain[0]->t_harga_kain * $curtain[0]->t_kain)  ?>" class=" form-control text-right total_harga_kain" data-id="" readonly placeholder="0" min="0" name="product_curtain[][total_harga_kain]" id="total_harga_kain">
						</div>
						<label class="label label-danger harga_kain hideIt">Total Harga Kain Can't be empty!</label>
					</strong>
				</div>
			</div>

		</div>
	</div>

	<div class="data-detail-curtain row">
	</div>
</div>
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->