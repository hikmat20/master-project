<?php

?>

<style>
.left {
	width:100%;
	border:1px solid #eee;
	min-height:200px;
	margin:10px;
}

.left img {
	padding:0px;
	border-radius:0px;
}

.left .img-thumbnail {
	border:none;
}


.right {
	padding:5px;
}

.right h3 {
	margin:3px 0px;
	
}

.right h2.price {
	font-size:40px;
}

.right hr {
	margin:8px 0px; 
}

.right table {
	margin-top:13px;
}

.box-price {
	padding-top:8px;
}

</style>


<div class="row">
	<div class="col-md-5">
		<div class="left">
			<div class="text-center">
			  <img class="img-thumbnail" src="<?= base_url('assets/img/master_fabric/').$result->photo_product?>" alt="<?= $result->photo_product?>">
			</div>
		</div>
	</div>
	<div class="col-md-7">
		<div class="right"> 
			<h3><strong><?= $result->name_product?></strong></h3>
			<hr>
			<span>Id Product : <b><?= $result->id_product?></b></span>
			<span class="pull-right">Country : <b><?= $result->id_country?></b></span>
			<div class="box-price">
			<span><b>Buy Price :</b></span>
			<span class="pull-right">Status : <b><?= $result->product_status?></b></span>
				<h2 class="text-blue price"><strong>Rp. <?= ($result->buy_price) != ''? number_format($result->buy_price):'-' ;?></strong></h2>
			</div>
			<hr>
			<table class="table-condensed table-bordered">
				<tbody>
					<tr>
						<td>Shipment</td>
						<td>: <?= $result->shipment?></td>
					</tr>
					<tr>
						<td>Supplier</td>
						<td>: <?= $result->nm_supplier?></td>
					</tr>
					<tr>
						<td>Usage</td>
						<td>: <?= $result->usage?></td>
					</tr>
					<tr>
						<td>Furniture Application</td>
						<td>: <?= $result->furniture_application?></td>
					</tr>
					<tr>
						<td>Curtain Application</td>
						<td>: <?= $result->curtain_application?></td>
					</tr>
					<tr>
						<td>Pattern Type</td>
						<td>: <?= $result->name_pattern_type?></td>
					</tr>
					<tr>
						<td>Pattern Name</td>
						<td>: <?= $result->id_pattern_name?></td>
					</tr>
					<tr>
						<td>Colour</td>
						<td>: <?= $result->name_colour?></td>
					</tr>
					<tr>
						<td>Characteristic</td>
						<td>: <?= $result->name_characteristic?></td>
					</tr>
					<tr>
						<td>Brand</td>
						<td>: <?= $result->name_brand?></td>
					</tr>
					<tr>
						<td>Collection</td>
						<td>: <?= $result->name_collection?></td>
					</tr>
					<tr>
						<td>Class</td>
						<td>: <?= $result->name_class?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>