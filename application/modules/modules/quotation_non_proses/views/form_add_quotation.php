<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css') ?>">
<?php

if (!empty($this->uri->segment(3))) {

	$getC             = $this->db->get_where('quotation_header', array('id_quotation' => $id))->row();
	$customer     	= $this->db->get_where('customer', array('id_customer' => $getC->id_customer))->row();
}

?>
<form id="form-quotation" class="form-active" method="post" enctype="multipart/form-data">
	<div class="box box-success">
		<div class="box-header">
			<table id="my-grid3" class="table-condensed" width="100%">
				<thead>
					<tr>
						<th class="text">CUSTOMER DATA INFORMATION</th>
					</tr>
				</thead>
			</table>
		</div>

		<input type="hidden" name="type" value="add">
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-1">
					<div class="form-group">
						<div><label>Quotation Number <span class='text-red'>*</span></label></div>
						<strong>
							<input type="text" class="form-control input input-sm required" name="id_quotation" id="id_quotation" value="<?= $getC->id_delivery;
																																			empty($getC->id_delivery) ? '' : $getC->id_delivery ?>" readonly>
							<label class="label label-danger id_quotation hideIt">Quotation Number Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>Customer <span class='text-red'>*</span></label></div>
						<strong>
							<select class="form-control input-sm required select2" name="id_cuctomer" id="id_cuctomer"></select>
							<label class="label label-danger id_cuctomer hideIt">Customer Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>PIC </label></div>
						<strong>
							<select name="id_pic" id="id_pic" class="form-control required input select2">
							</select>
							<label class="label label-danger id_pic hideIt">PIC Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>Address</label></div>
						<strong>
							<textarea type="text" class="form-control input " name="address" id="address" placeholder="Address" readonly></textarea>
							<label class="label label-danger address hideIt">Address Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>Category Customer</label></div>
						<strong>
							<input type="hidden" class="form-control input" placeholder="Category Customer" name="id_cust_cut" id="id_cust_cut" value="" readonly>
							<input type="text" class="form-control input" placeholder="Category Customer" name="nm_cust_cut" id="nm_cust_cut" value="" readonly>
							<label class="label label-danger id_cust_cut hideIt">Category Customer Can't be empty!</label></label>
						</strong>
					</div>
					<div class="form-group row">
						<div class="col-md-12"><label>Discount Category</label></div>
						<div class="col-xs-8 col-md-8">
							<strong>
								<select class="form-control required select2" name="id_disc_cat" id="id_disc_cat"></select>
								<label class="label label-danger id_disc_cat hideIt">Discount Category Can't be empty!</label>
							</strong>
						</div>
						<div class="col-xs-4 col-md-4 ">
							<strong>
								<input class="form-control text-center" readonly name="disc_cat" id="disc_cat" placeholder="0%">
							</strong>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-md-offset-2">
					<div class="form-group">
						<div><label>Date <span class='text-red'>*</span></label></div>
						<strong>
							<input type="date" class="form-control input required " placeholder="yyy-mm-dd" name="date" id="date" value="<?= date('Y-m-d') ?>" autocomplete="off">
							<label class="label label-danger date hideIt">Date Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>Category Sales <span class='text-red'>*</span></label></div>
						<strong>
							<select class="form-control required select2" name="cat" id="cat">
								<option value=""></option>
								<option value="project">Project</option>
								<option value="wholesale">Wholesale</option>
							</select>
							<label class="label label-danger cat hideIt">Category Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>Type Project <span class='text-red'>*</span></label></div>
						<strong>
							<select class="form-control required select2" name="type_project" id="type_project"></select>
							<label class="label label-danger type_project hideIt">Type Project Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>Marketing <span class='text-red'>*</span></label></div>
						<strong>
							<select class="form-control input-sm input required select2" name="id_karyawan" id="id_karyawan"></select>
							<label class="label label-danger id_karyawan hideIt">Marketing Can't be empty!</label></label>
						</strong>
					</div>
					<div class="form-group">
						<label style="width:70px">Net Price </label>
						<label style="margin-left:20px">
							<input type="radio" name="net" class="ppn" value="0" checked> No
						</label>
						<label style="margin-left:20px">
							<input type="radio" name="net" class="ppn" value="1"> Yes
						</label>
						<label class="label label-danger net hideIt">Category Can't be empty!</label>
					</div>
					<div class="form-group">
						<label style="width:70px">PPN <span class='text-red'>*</span></label>
						<label style="margin-left:20px">
							<input type="radio" name="ppn" class="ppn" value="0" checked> No
						</label>
						<label style="margin-left:20px">
							<input type="radio" name="ppn" class="ppn" value="1"> Yes
						</label>
						<label class="label label-danger ppn hideIt">PPN Can't be empty!</label>
					</div>
				</div>
			</div>
		</div>


		<hr>
		<div class="box-body">
			<table id="my-grid3" class="table-condensed" width="100%">
				<thead>
					<tr>
						<th class="text">DETAIL DATA ORDER</th>
					</tr>
				</thead>
			</table>
			<div class="box-body">
				<div class="" id="data-item">

				</div>
				<div class="pull-right">
					<button type="button" class="btn btn-sm btn-success" id="add_fabric"><i class="fa fa-plus"></i> Tambah Fabric</button>

				</div>
			</div>
		</div>
		<div class="box-footer">
			<?php
			echo form_button(array('type' => 'button', 'class' => 'btn btn-md btn-success label_input', 'style' => 'min-width:100px; float:right;', 'value' => 'save', 'content' => 'Save', 'id' => 'saveQuotation')) . ' ';
			?>
		</div>
	</div>
</form>

<div class="modal fade" id="ModalView">
	<div class="modal-dialog" style="width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="head_title">List Data</h4>
			</div>
			<div class="modal-body">
				<div class="box box-primary">
					<div class="box-header">
						<select id="cat_fabric" class="form-control select">
						</select>
					</div>
					<div class="box-body" id="view">

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove"></span> Close</button>
				<button type="button" class="btn btn-warning" onclick="tambah_data()" data-dismiss="modal">
					<span class="glyphicon glyphicon-save"></span> Add Data</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="ModalView2">
	<div class="modal-dialog" style="width:50%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="head_title">List Data</h4>
			</div>
			<div class="modal-body">
				<div class="box box-primary">
					<div class="box-body" id="view2">

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove"></span> Close</button>
				<button type="button" class="btn btn-warning" onclick="tambah_data2()" data-dismiss="modal">
					<span class="glyphicon glyphicon-save"></span> Add Data</button>
			</div>
		</div>
	</div>
</div>
<style>
	.inSp {
		text-align: center;
		display: inline-block;
		width: 100px;
	}

	.inSp2 {
		text-align: center;
		display: inline-block;
		width: 45%;
	}

	.inSpL {
		text-align: left;
	}

	.vMid {
		vertical-align: middle !important;
	}

	.w10 {
		display: inline-block;
		width: 10%;
	}

	.w15 {
		display: inline-block;
		width: 15%;
	}

	.w20 {
		display: inline-block;
		width: 20%;
	}

	.w30 {
		display: inline-block;
		width: 30%;
	}

	.w40 {
		display: inline-block;
		width: 40%;
	}

	.w50 {
		display: inline-block;
		width: 50%;
	}

	.w60 {
		display: inline-block;
		width: 60%;
	}

	.w70 {
		display: inline-block;
		width: 70%;
	}

	.w80 {
		display: inline-block;
		width: 80%;
	}

	.w90 {
		display: inline-block;
		width: 90%;
	}

	.hideIt {
		display: none;
	}

	.showIt {
		display: block;
	}




	.switch {
		position: relative;
		display: inline-block;
		width: 36px;
		height: 20px;
	}

	.switch input {
		opacity: 0;
		width: 0;
		height: 0;
	}

	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		-webkit-transition: .4s;
		transition: .4s;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 16px;
		width: 16px;
		left: 2px;
		bottom: 2px;
		background-color: white;
		-webkit-transition: .4s;
		transition: .4s;
	}

	input:checked+.slider {
		background-color: #2196F3;
	}

	input:focus+.slider {
		box-shadow: 0 0 1px #2196F3;
	}

	input:checked+.slider:before {
		-webkit-transform: translateX(16px);
		-ms-transform: translateX(16px);
		transform: translateX(16px);
	}

	/* Rounded sliders */
	.slider.round {
		border-radius: 20px;
	}

	.slider.round:before {
		border-radius: 50%;
	}
</style>
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>

<script type="text/javascript">
	function add_list() {
		tujuan = siteurl + 'quotation_non_proses/list_barang';
		$.post(tujuan, function(result) {
			$("#ModalView").modal();
			$("#view").html();
		});
	}
	$(document).on('click', '#add_fabric', function() {
		add_list();
	})

	$(document).on('change', '#cat_fabric', function() {
		var cat = $(this).val();
		$.ajax({
			type: 'POST',
			url: siteurl + 'quotation_non_proses/list_barang',
			data: {
				'id': cat
			},
			success: function(result) {
				$('#view').html(result);
				// console.log(result);
			},
			error: function() {
				alert('Ajax Error..!!!!!!');
			}
		})
	})

	$(document).on('change', '#id_cuctomer', function() {
		var cust = $(this).val();
		$.ajax({
			type: 'POST',
			url: siteurl + 'quotation_proses/dataCustomer',
			data: {
				'id_cust': cust
			},
			dataType: 'json',
			success: function(result) {
				// console.log(result['cat_cust']);
				getPic(result['customer'].id_customer);
				if (result['customer'] != null) {
					if (result['pic'] != null && result['cat_cust'] != null) {
						$('#id_pic').val(result['pic'].id_pic);
						$('#nm_pic').val(result['pic'].name_pic);
						$('#address').val(result['customer'].address_office);
						$('#id_cust_cut').val(result['customer'].id_category_customer);
						$('#nm_cust_cut').val(result['cat_cust'].name_category_customer);
					} else {
						alert('Ada data kosong!');
						$('#id_cuctomer').text();
						$('#id_cuctomer').val('');
						$('#id_pic').val('');
						$('#nm_pic').val('');
						$('#address').val('');
						$('#id_cust_cut').val('');
						$('#nm_cust_cut').val('');
					}

				} else {
					$('#id_pic').val('');
					$('#nm_pic').val('');
					$('#address').val('');
					$('#id_cust_cut').val('');
					$('#nm_cust_cut').val('');
				}

			},
			error: function() {
				alert('Ajax Error..!!!!!!');
			}

		})

	})

	$(document).on('change', '#id_disc_cat', function() {
		var disc_cat = $(this).val();
		$.ajax({
			type: 'POST',
			url: siteurl + 'quotation_proses/dataDiscCat',
			data: {
				'id_disc_cat': disc_cat
			},
			dataType: 'json',
			success: function(result) {
				// console.log(result['result']);
				if (result['result'] != null) {
					$('#disc_cat').val(result['result'].discount + '%');
				} else {
					$('#disc_cat').val('');
				}
			},
			error: function() {
				alert('Ajax Error..!!!!!!');
			}

		})

	})

	$('#dtDetail').DataTable({
		"paging": false,
		"searching": false,
		"lengthChange": false,
		"ordering": false

	});


	jQuery(document).on('keyup keypress blur', '.numberOnly', function() {
		if ((event.which < 48 || event.which > 57) && (event.which < 46 || event.which > 46) && event.which != 43) {
			event.preventDefault();
		}
	});

	jQuery(document).on('keyup change', '.nominal', function() {
		var val = this.value;
		val = val.replace(/[^0-9\.]/g, '');

		if (val != "") {
			valArr = val.split(',');
			valArr[0] = (parseInt(valArr[0], 10)).toLocaleString();
			val = valArr.join(',');
		}

		this.value = val;
	});



	function tambah_data() {
		var list_mentah = $('#input_edit').val();
		var list_arr = list_mentah.split(";");
		if (list_mentah != "") {
			$.ajax({
				type: "POST",
				url: siteurl + "quotation_open/get_item_barang",
				data: "idbarang=" + list_mentah,
				success: function(result) {
					var data = JSON.parse(result);
					var dt = $('#dtDetail').DataTable();
					dt.rows().remove();
					for (var i = 0; i < list_arr.length; i++) {
						// console.log(data[i].id_product);
						dt.row.add([
							'<a class="text-red hapus_item_js" href="javascript:void(0)" title="Hapus Item"><i class="fa fa-times"></i></a><span class="numbering">' + parseInt(i + 1) + '</span>',
							data[i].id_product,
							'<input type="text" style="width:100%" name="qty_[' + data[i].id_product + ']" data-id="' + data[i].id_product + '" id="qty_' + data[i].id_product + '" class="form-control input-sm numberOnly nominal required qty">',
							'<input type="text" style="width:100%" name="unit_[' + data[i].id_product + ']" data-id="' + data[i].id_product + '" id="unit_' + data[i].id_product + '" class="form-control input-sm numberOnly nominal required unit">',
							'<div class="text-right"><span name="tQty_unit_[' + data[i].id_product + ']" data-id="' + data[i].id_product + '" id="tQty_' + data[i].id_product + '" class="text-right nominal">0</span></div>',
							'<div class="text-right"><span name="price_[' + data[i].id_product + ']" data-id="' + data[i].id_product + '" id="price_' + data[i].id_product + '" class="text-right nominal">' + data[i].pricelist + '</span></div>',
							'<input type="text" style="width:100%" name="air_[' + data[i].id_product + ']" data-id="' + data[i].id_product + '" id="air_' + data[i].id_product + '"  class="form-control input-sm numberOnly nominal required air">',
							'<div class="text-right"><span name="tPrice_[' + data[i].id_product + ']" data-id="' + data[i].id_product + '" id="tPrice_' + data[i].id_product + '" class="text-right">0</span></div>',
							'<div class="text-right"><span name="tAir_[' + data[i].id_product + ']" data-id="' + data[i].id_product + '" id="tAir_' + data[i].id_product + '" class="text-right">0</span></div>',
							'<div class="text-right"><span name="stok_[' + data[i].id_product + ']" data-id="' + data[i].id_product + '" id="stok_' + data[i].id_product + '" class="text-right">0</span></div>',
							'<input type="text" style="width:100%" name="disk_[' + data[i].id_product + ']" data-id="' + data[i].id_product + '" id="disk_' + data[i].id_product + '" class="form-control input-sm numberOnly nominal required">',
							'<div class="text-right"><span name="netto_[' + data[i].id_product + ']" data-id="netto_' + data[i].id_product + '" id="netto_' + data[i].id_product + '" class="text-right">0</span></div>',
							'<div class="text-center"><span name="status_[' + data[i].id_product + ']" class="text-right">' + data[i].product_status + '</span></div>',
							'<div class="text-center"><span name="stok_ready[' + data[i].id_product + ']" class="text-right">0</span></div>',
							'<div class="text-center"><span name="note_[' + data[i].id_product + ']" class="text-right">Note</span></div>',
							'<div class="text-center"><span name="aksi_[' + data[i].id_product + ']" class="text-right">Aksi</span></div>'
						]).draw(false);

					}
				}
			});
		}
	}


	$(document).on('input keyup change paste', '#dtDetail input.qty ', function(e) {
		var qty = $(this).val();
		var id = $(this).data('id');
		var unit = $('#unit_' + id).val();
		var priceFabric = $('#price_' + id).val();
		var priceAir = $('#air_' + id).val();
		var totalFabric = $('#tPrice_' + id).val();
		var totalAir = $('#tAir_' + id).val();
		var netto = $('#netto_' + id).val();
		var tQty = parseInt(qty) * parseInt(unit);
		var tPrice = parseInt(tQty) * parseInt(priceFabric);

		if (tQty) {
			$('#tQty_' + id).text(tQty);
			$('#tPrice_' + id).text(tPrice);

		} else {
			$('#tQty_' + id).text('0');
			$('#tPrice_' + id).text('0');
			// alert(tPrice);
		}
	})

	$(document).on('input keyup change paste', '#dtDetail input.unit', function(e) {
		var unit = $(this).val();
		var id = $(this).data('id');
		var qty = $('#qty_' + id).val();
		var priceFabric = $('#price_' + id).text();
		var priceAir = $('#air_' + id).val();
		var totalFabric = $('#tPrice_' + id).text();
		var totalAir = $('#tAir_' + id).text();
		var netto = $('#netto_' + id).val();

		var tQty = parseInt(qty) * parseInt(unit);
		var tPrice = parseInt(tQty) * parseInt(priceFabric);

		if (tQty) {
			$('#tQty_' + id).text(tQty);
			$('#tPrice_' + id).text(tPrice);
		} else {
			$('#tQty_' + id).text('0');
			$('#tPrice_' + id).text('0');
		}
	})

	$(document).on('keyup change paste', '#dtDetail input.air', function(e) {
		var air = parseInt($(this).val());
		var id = $(this).data('id');
		var tQty = $('#tQty_' + id).text();
		var unit = $('#unit_' + id).val();
		var priceFabric = $('#price_' + id).text();
		var totalFabric = $('#tPrice_' + id).text();

		var totalAir = parseInt(tQty) * parseInt(air);
		if (totalAir) {
			$('#tAir_' + id).text(totalAir);
		} else {
			$('#tAir_' + id).text('0');
		}
	})


	$(document).ready(function() {
		var table = $('#dtDetail').DataTable();

		$('#dtDetail tbody').on('click', 'a.hapus_item_js', function() {

			table
				.row($(this).parents('tr'))
				.remove()
				.draw();

			if ($('#view tr .dataTables_empty')[0]) {
				var x = 1;
			} else {
				var x = $('#view tr').length + 1;
			}
			for (var i = 0; i < x; i++) {
				$('.numbering').eq(i - 1).text(i);
			}

		});

	});

	$(document).ready(function() {
		var table = $('#dtFee').DataTable();

		$('#dtFee tbody').on('click', 'a.hapus', function() {

			table
				.row($(this).parents('tr'))
				.remove()
				.draw();

			if ($('#view tr .dataTables_empty')[0]) {
				var x = 1;
			} else {
				var x = $('#view tr').length + 1;
			}
			// for (var i = 0; i < x; i++) {
			// $('.numbering').eq(i-1).text(i);
			// }

		});

	});

	jQuery(document).on('keyup keypress blur', '.numberOnly', function() {
		if ((event.which < 48 || event.which > 57) && (event.which < 46 || event.which > 46) && event.which != 43) {
			event.preventDefault();
		}
	});

	var id = $('#id_quotation').val();
	if (id == '') {
		$.ajax({
			url: siteurl + active_controller + "getID",
			dataType: "json",
			type: 'POST',
			data: {
				'id': id
			},
			success: function(result) {
				$('#id_quotation').val(result.id);
			},
			error: function(request, error) {
				console.log(arguments);
				alert(" Can't do because: " + error);
			}
		});
	}

	//========================================================================
	$(document).ready(function() {

		getCustomer();
		getTypeProject();
		getKar();
		getDiscCat()

		$(".datepicker").datepicker({
			format: "yyyy-mm-dd",
			showInputs: true,
			autoclose: true
		});

		$(".select2").select2({
			placeholder: "Choose An Option",
			allowClear: true,
			dropdownParent: $("#form-quotation")
		});

		$('.select2-search--inline').css('margin-right', '5%');
		$('.select2-search--inline').css('width', '100%');
		$('.select2-search__field').css('margin-right', '5%');
		$('.select2-search__field').css('width', '90% !important');
		$('.select2-search__field').css('padding-right', '5%');

		jQuery(document).on('keyup', '.bank_num', function() {
			var foo = $(this).val().split("-").join(""); // remove hyphens
			if (foo.length > 0) {
				foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
			}
			$(this).val(foo);
		});

		$(document).on('change', '#payment_option', function(e) {
			var val = $(this).val();
			if (val == 'credit') {
				$('#credit_term').css({
					"display": "block"
				}).fadeIn(1000);
			} else {
				$('#credit_term').fadeOut(1000).css({
					"display": "none"
				});
			}

		});

		$(document).on('click change keyup paste blur', '#form-quotation .form-control', function(e) {
			//console.log('AHAHAHAHA');
			var val = $(this).val();
			var id = $(this).attr('id');
			if (val == '') {
				//$('.'+id).addClass('hideIt');
				$('.' + id).css('display', 'inline-block');
			} else {
				$('.' + id).css('display', 'none');
			}
		});

		if ('<?= $this->uri->segment(4) ?>' == 'view') {
			$('.label_view').css("display", "block");
			$('.label_input').css("display", "none");
		} else {
			$('.label_view').css("display", "none");
			$('.label_input').css("display", "block");
		}
		console.log('<?= $this->uri->segment(4) ?>');
	});

	function getDiscCat() {
		// if ('<?= ($getC->id_customer) ?>' != null) {
		// var id_selected = '<?= $getC->id_customer ?>';
		// }else if ($('#id_customer').val() != null || $('#id_customer').val() != '') {
		// var id_selected = $('#id_customer').val();
		// }else {
		// var id_selected = '';
		// }
		//console.log(id_selected);
		var column = 'id_category';
		var column_fill = '';
		var column_name = 'name_cat';
		var table_name = 'discount_category';
		var key = 'id_category';
		var act = 'free';
		$.ajax({
			url: siteurl + active_controller + "getOpt",
			dataType: "json",
			type: 'POST',
			data: {
				// id_selected:id_selected,
				column: column,
				column_fill: column_fill,
				column_name: column_name,
				table_name: table_name,
				key: key,
				act: act
			},
			success: function(result) {
				$('#id_disc_cat').html(result.html);
			},
			error: function(request, error) {
				console.log(arguments);
				alert(" Can't do because: " + error);
			}
		});
		sel2();
	}



	function getCustomer() {
		if ('<?= ($getC->id_customer) ?>' != null) {
			var id_selected = '<?= $getC->id_customer ?>';
		} else if ($('#id_customer').val() != null || $('#id_customer').val() != '') {
			var id_selected = $('#id_customer').val();
		} else {
			var id_selected = '';
		}
		//console.log(id_selected);
		var column = 'id_customer';
		var column_fill = '';
		var column_name = 'name_customer';
		var table_name = 'master_customer';
		var key = 'id_customer';
		var act = 'free';
		$.ajax({
			url: siteurl + active_controller + "getOpt",
			dataType: "json",
			type: 'POST',
			data: {
				id_selected: id_selected,
				column: column,
				column_fill: column_fill,
				column_name: column_name,
				table_name: table_name,
				key: key,
				act: act
			},
			success: function(result) {
				$('#id_cuctomer').html(result.html);
			},
			error: function(request, error) {
				console.log(arguments);
				alert(" Can't do because: " + error);
			}
		});
		sel2();
	}

	function getPic(id_customer) {
		if ('<?= ($getC->id_pic) ?>' != null) {
			var id_selected = '<?= $getC->id_pic ?>';
		} else if ($('#id_pic').val() != null || $('#id_pic').val() != '') {
			var id_selected = $('#id_pic').val();
		} else {
			var id_selected = '';
		}
		//console.log(id_selected);
		var column = 'id_customer';
		var column_fill = id_customer;
		var column_name = 'name_pic';
		var table_name = 'child_customer_pic';
		var key = 'id_pic';
		var act = 'free';
		$.ajax({
			url: siteurl + active_controller + "getOpt",
			dataType: "json",
			type: 'POST',
			data: {
				id_selected: id_selected,
				column: column,
				column_fill: column_fill,
				column_name: column_name,
				table_name: table_name,
				key: key,
				act: act
			},
			success: function(result) {
				$('#id_pic').html(result.html);
			},
			error: function(request, error) {
				console.log(arguments);
				alert(" Can't do because: " + error);
			}
		});
		sel2();
	}

	function getTypeProject() {
		if ('<?= ($getC->type_project) ?>' != null) {
			var id_selected = '<?= $getC->type_project ?>';
		} else if ($('#type_project').val() != null || $('#type_project').val() != '') {
			var id_selected = $('#type_project').val();
		} else {
			var id_selected = '';
		}
		//console.log(id_selected);
		var column = 'id_type_project';
		var column_fill = '';
		var column_name = 'nm_type_project';
		var table_name = 'type_project';
		var key = 'id_type_project';
		var act = 'free';
		$.ajax({
			url: siteurl + active_controller + "getOpt",
			dataType: "json",
			type: 'POST',
			data: {
				id_selected: id_selected,
				column: column,
				column_fill: column_fill,
				column_name: column_name,
				table_name: table_name,
				key: key,
				act: act
			},
			success: function(result) {
				$('#type_project').html(result.html);
			},
			error: function(request, error) {
				console.log(arguments);
				alert(" Can't do because: " + error);
			}
		});
		sel2();
	}

	function getKar() {
		if ('<?= ($getC->id_karyawan) ?>' != null) {
			var id_selected = '<?= $getC->id_karyawan ?>';
		} else if ($('#id_karyawan').val() != null || $('#id_karyawan').val() != '') {
			var id_selected = $('#id_karyawan').val();
		} else {
			var id_selected = '';
		}
		//console.log(id_selected);
		var column = 'id_karyawan';
		var column_fill = '';
		var column_name = 'nama_karyawan';
		var table_name = 'karyawan';
		var key = 'id_karyawan';
		var act = 'free';
		$.ajax({
			url: siteurl + active_controller + "getOpt",
			dataType: "json",
			type: 'POST',
			data: {
				id_selected: id_selected,
				column: column,
				column_fill: column_fill,
				column_name: column_name,
				table_name: table_name,
				key: key,
				act: act
			},
			success: function(result) {
				$('#id_karyawan').html(result.html);
			},
			error: function(request, error) {
				console.log(arguments);
				alert(" Can't do because: " + error);
			}
		});
		sel2();
	}

	function sel2() {

	}

	jQuery(document).on('click', '#saveQuotation', function() {
		var valid = getValidation();
		if (valid) {
			// var formdata = $("#form-quotation").serialize();
			var formdata = new FormData($("#form-quotation")[0]);
			console.log(formdata);
			// exit();
			$.ajax({
				url: siteurl + active_controller + "saveQuotation",
				dataType: "json",
				type: 'POST',
				data: formdata,
				contentType: false,
				cache: false,
				processData: false,
				async: false,
				success: function(result) {
					if (result.status == '1') {
						swal({
							title: "Sukses!",
							text: result['pesan'],
							type: "success",
							timer: 1500,
							showConfirmButton: false
						});
						setTimeout(function() {
							open(siteurl + active_controller, '_self');
						}, 1600);
					} else {
						swal({
							title: "Gagal!",
							text: result['pesan'],
							type: "error",
							timer: 1500,
							showConfirmButton: false
						});
					};
				},
				error: function(request, error) {
					console.log(arguments);
					alert(" Can't do because: " + error);
				}
			});
		}
	});
</script>