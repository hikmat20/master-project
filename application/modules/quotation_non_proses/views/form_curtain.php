<table class="table-condensed table-striped list-curtain" width="100%">
	<thead>
		<tr class="bg-primary">
			<th>No.</th>
			<th>Curtain Material</th>
			<th>Customer Product Name</th>
			<th>Spesifikasi</th>
			<th>Qty</th>
			<th class="text-right">Subtotal</th>
			<th class="text-right">Diskon</th>
			<th class="text-right">Total</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<!-- <tr>
			<td>1</td>
			<td>
				<select name="product_curtain[][nama]" id="product_curtain" class="select2 form-control">
					<option value=""></option>
					<?php foreach ($product as $pr) : ?>
						<option value="<?= $pr->id_product ?>"><?= $pr->name_product ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>
				<input type="text" class="form-control cust_curtain_name" data-id="" value="" placeholder="Customer Product Name" name="product_curtain[][cust_curtain_name]" id="cust_curtain_name">
			</td>
			<td width="100px">
				Width: <br>
				Stock: <br>
				<strong> Rp.</strong>

				<input type="hidden" class="form-control width" data-id="" value="" name="product_curtain[][width]" id="width">
				<input type="hidden" class="form-control price" data-id="" value="" name="product_curtain[][price]" id="price">
			</td>
			<td width="80px">
				<input type="number" min="0" class="form-control qty" data-id="1" value="" placeholder="0" name="product_curtain[][qty]" id="qty">
			</td>
			<td width="150px">
				<input type="text" class="form-control subtotal text-right" readonly data-id="" value="" placeholder="0" name="product_curtain[][subtotal]" id="subtotal">
			</td>
			<td width="150px">
				<input type="text" class="form-control diskon text-right nominal numberOnly" data-id="" value="" placeholder="0" name="product_curtain[][diskon]" id="diskon">
			</td>
			<td>
				<input type="text" class="form-control total text-right" readonly data-id="" value="" placeholder="0" name="product_curtain[][total]" id="total">
			</td>
			<td>
				<button type="button" class="btn btn-sm btn-danger hapus_curtain">x</button>
			</td>
		</tr> -->
	</tbody>
</table>
<button type="button" class="btn btn-sm btn-success addCurtain" style="margin-top: 10px;"><i class="fa fa-plus"></i> Add Curtain</button>