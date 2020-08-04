<?php

if (!empty($this->uri->segment(3))) {

	$getData        = $this->db->get_where('quotation_header', array('id_quotation' => $id))->row();
	$customer     	= $this->db->get_where('master_customer', array('id_customer' => $getData->id_customer))->row();
	$cat_cust     	= $this->db->get_where('child_customer_category', array('id_category_customer' => $getData->id_cust_cut))->row();
	$pic_cust     	= $this->db->get_where('child_customer_pic', array('id_customer' => $getData->id_customer))->row();
	$ruang     		= $this->db->get_where('quotation_room', array('id_quotation' => $getData->id_quotation))->result();
}
// foreach ($ruang as $ruangan) {
// 	echo "<pre>";
// 	print_r($ruangan);
// 	echo "</pre>";
// 	# code...
// }

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

		<input type="hidden" name="type" value="<?= !empty($getData) ? 'edit' : 'add' ?>">
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-1">
					<div class="form-group">
						<div><label>Quotation Number <span class='text-red'>*</span></label></div>
						<strong>
							<input type="text" class="form-control input input-sm required" name="id_quotation" id="id_quotation" value="<?= $getData->id_quotation;
																																			empty($getData->id_quotation) ? '' : $getData->id_quotation ?>" readonly>
							<label class="label label-danger id_quotation hideIt">Quotation Number Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>Customer <span class='text-red'>*</span></label></div>
						<strong>
							<select class="form-control input-sm required select2" name="id_cuctomer" id="id_cuctomer"></select>
							<label class="label label-danger id_cuctomer hideIt">Customer Can't be empty!</label>
							<input type="hidden" id="id_cust" value="<?= $customer ? $customer->id_customer : '' ?>">
						</strong>
					</div>
					<div class="form-group">
						<div><label>PIC </label></div>
						<strong>
							<input type="hidden" class="form-control input input-sm required w50" name="id_pic" id="id_pic">
							<input type="text" class="form-control input" name="nm_pic" id="nm_pic" placeholder="Name PIC" value="<?= $pic_cust ? $pic_cust->name_pic : '' ?>" readonly>
							<label class="label label-danger nm_pic hideIt">PIC Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>Address</label></div>
						<strong>
							<textarea type="text" class="form-control input " name="address" id="address" placeholder="Address" readonly><?= $customer ? $customer->address_office : '' ?></textarea>
							<label class="label label-danger address hideIt">Address Can't be empty!</label>
						</strong>
					</div>
					<div class="form-group">
						<div><label>Category Customer</label></div>
						<strong>
							<input type="hidden" class="form-control input" placeholder="Category Customer" name="id_cust_cut" id="id_cust_cut" value="<?= $cat_cust ? $cat_cust->id_category_customer : '' ?>" readonly>
							<input type="text" class="form-control input" placeholder="Category Customer" name="nm_cust_cut" id="nm_cust_cut" value="<?= $cat_cust ? $cat_cust->name_category_customer : '' ?>" readonly>
							<label class="label label-danger id_cust_cut hideIt">Category Customer Can't be empty!</label></label>
						</strong>
					</div>
					<div class="form-group row">
						<div class="col-md-12"><label>Discount Category <span class='text-red'>*</span></label></div>
						<div class="col-xs-8 col-md-8">
							<strong>
								<select class="form-control required select2" name="id_disc_cat" id="id_disc_cat"></select>
								<label class="label label-danger id_disc_cat hideIt">Discount Category Can't be empty!</label>
							</strong>
						</div>
						<div class="col-xs-4 col-md-4 ">
							<strong>
								<input class="form-control text-center" readonly value="<?= $getData->val_disc_cat != '' ? $getData->val_disc_cat . '%' : '' ?>" name="disc_cat" id="disc_cat" placeholder="0%">
								<input type="hidden" class="form-control text-center" readonly name="act_disk" id="act_disk" value="<?= $getData->val_disc_cat != '' ? $getData->val_disc_cat : '0' ?>">
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
								<option value="project" <?= $getData->sales_category == 'project' ? 'selected' : '' ?>>Project</option>
								<option value="wholesale" <?= $getData->sales_category == 'wholesale' ? 'selected' : '' ?>>Wholesale</option>
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
							<input type="radio" name="net" class="net" value="0" <?= !empty($getData->net) && $getData->net == '0' ? '' : 'checked' ?>> No
						</label>
						<label style="margin-left:20px">
							<input type="radio" name="net" class="net" value="1" <?= $getData->net == '1' ? 'checked' : '' ?>> Yes
						</label>
						<label class="label label-danger net hideIt">Category Can't be empty!</label>
					</div>
					<div class="form-group">
						<?php
						if ($getData->ppn == '0') {
							$No = 'checked';
							$Yes = '';
							$default = '';
						} else if ($getData->ppn == '1') {
							$Yes = 'checked';
							$No = '';
							$default = '';
						} else {
							$Yes = '';
							$No = '';
							$default = 'checked';
						}
						?>
						<label style="width:70px">PPN <span class='text-red'>*</span></label>
						<label style="margin-left:20px">
							<input type="radio" name="ppn" class="ppn" value="0" <?= $No ?>> No
						</label>
						<label style="margin-left:20px">
							<input type="radio" name="ppn" class="ppn" value="1" <?= $Yes . $default ?>> Yes </label>
						<label class="label label-danger ppn hideIt">PPN Can't be empty!</label>
					</div>
					<div class="form-group">
						<div><label>Project Name <span class='text-red'>*</span></label></div>
						<strong>
							<input type="text" class="form-control input required" placeholder="Project Name" name="pr_name" id="pr_name" value="<?= empty($getData->project_name) ? '' : $getData->project_name ?>">
							<label class="label label-danger pr_name hideIt">Date Can't be empty!</label>
						</strong>
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
					<div class="box box-primary curtain-box<?= $no ?> collapsed-box">
						<div class="box-header with-border">
							<div class="material-switch curtain-switch<?= $no ?>">
								<input class="switch-curtain" <?= !empty($fabrics_curtain) ? 'checked' : ''  ?> data-id="<?= $no ?>" id="switch-curtain<?= $no ?>" name="switch-curtain" type="checkbox" />
								<label for="switch-curtain<?= $no ?>" data-id="<?= $no ?>" class="label-primary"></label>
								<h3 class="box-title">Curtain</h3>
							</div>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="box-curtain<?= $no ?>">
							</div>
						</div>
					</div>

					<div class="box box-info lining-box<?= $no ?> collapsed-box">
						<div class="box-header with-border">
							<div class="material-switch lining-switch<?= $no ?>">
								<input class="switch-lining" <?= !empty($fabrics_lining) ? 'checked' : ''  ?> data-id="<?= $no ?>" id="switch-lining<?= $no ?>" name="switch-lining" type="checkbox" />
								<label for="switch-lining<?= $no ?>" data-id="<?= $no ?>" class="label-info"></label>
								<h3 class="box-title">Lining</h3>
							</div>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
							</div>
						</div>

						<div class="box-body">
							<div class="box-lining<?= $no ?>">
							</div>
						</div>
					</div>

					<div class="box box-warning vitrage-box<?= $no ?> collapsed-box">
						<div class="box-header with-border">
							<div class="material-switch vitrage-switch<?= $no ?>">
								<input class="switch-vitrage" <?= !empty($fabrics_vitrage) ? 'checked' : ''  ?> data-id="<?= $no ?>" id="switch-vitrage<?= $no ?>" name="switch-vitrage" type="checkbox" />
								<label for="switch-vitrage<?= $no ?>" data-id="<?= $no ?>" class="label-warning"></label>
								<h3 class="box-title">Vitrage</h3>
							</div>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
							</div>
						</div>

						<div class="box-body">
							<div class="box-vitrage<?= $no ?>">

							</div>
						</div>

					</div>

					<div class="box box-danger accessories-box<?= $no ?> collapsed-box">
						<div class="box-header with-border">
							<div class="material-switch accessories-switch<?= $no ?>">
								<input class="switch-accessories" <?= !empty($accessories) ? 'checked' : ''  ?> data-id="<?= $no ?>" id="switch-accessories<?= $no ?>" name="switch-accessories" type="checkbox" />
								<label for="switch-accessories<?= $no ?>" data-id="<?= $no ?>" class="label-danger"></label>
								<h3 class="box-title">Accessories</h3>
							</div>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
							</div>
						</div>

						<div class="box-body">
							<div class="box-accessories<?= $no ?>">

							</div>
						</div>

					</div>
				</div>
				<!-- <div class="pull-right">
					<button type="button" class="btn btn-sm btn-success" id="tambah-ruang"><i class="fa fa-plus"></i> Tambah Jendela</button>

				</div> -->
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
					<div class="box-body" id="view">

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove"></span> Close</button>
				<button type="button" class="btn btn-warning" onclick="AddData()" data-dismiss="modal">
					<span class="glyphicon glyphicon-save"></span> Add Data</button>
			</div>
		</div>
	</div>
</div>

<style>
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
	$(document).on('change', '#id_cuctomer', function() {
		var cust = $(this).val();
		$.ajax({
			type: 'POST',
			url: siteurl + 'quotation_non_proses/dataCustomer',
			data: {
				'id_cust': cust
			},
			dataType: 'json',
			success: function(result) {
				// console.log(result['cat_cust']);
				if (result['customer'] != null) {
					if (result['pic'] != null && result['cat_cust'] != null) {
						$('#id_pic').val(result['pic'].id_pic);
						$('#nm_pic').val(result['pic'].name_pic);
						$('#address').val(result['customer'].address_office);
						$('#id_cust_cut').val(result['customer'].id_category_customer);
						$('#nm_cust_cut').val(result['cat_cust'].name_category_customer);
						$('#id_cust').val(result['customer'].id_customer);
					} else {
						alert('Ada data kosong!');
						$('#id_cuctomer').text();
						$('#id_cuctomer').val('');
						$('#id_pic').val('');
						$('#nm_pic').val('');
						$('#address').val('');
						$('#id_cust_cut').val('');
						$('#nm_cust_cut').val('');
						$('#id_cust').val('');
					}

				} else {
					$('#id_cust').val('');
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
			url: siteurl + 'quotation_non_proses/dataDiscCat',
			data: {
				'id_disc_cat': disc_cat
			},
			dataType: 'json',
			success: function(result) {
				// console.log(result['result']);
				if (result['result'] != null) {
					$('#disc_cat').val(result['result'].discount + '%');
					$('.pilihMainten').prop('disabled', false);
					$('.pilihMainten-lining').prop('disabled', false);
					$('.pilihMainten-vitrage').prop('disabled', false);
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

	//========================================================================
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
			width: '100%',
			dropdownParent: $("#form-quotation")
		});

		$('.select2-search--inline').css('margin-right', '5%');
		$('.select2-search--inline').css('width', '100%');
		$('.select2-search__field').css('margin-right', '5%');
		$('.select2-search__field').css('width', '90% !important');
		$('.select2-search__field').css('padding-right', '5%');

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
		if ('<?= ($getData->id_disc_cat) ?>' != null) {
			var id_selected = '<?= $getData->id_disc_cat ?>';
		} else if ($('#id_disc_cat').val() != null || $('#id_disc_cat').val() != '') {
			var id_selected = $('#id_disc_cat').val();
		} else {
			var id_selected = '';
		}
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
				id_selected: id_selected,
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
	}

	function getCustomer() {
		if ('<?= ($getData->id_customer) ?>' != null) {
			var id_selected = '<?= $getData->id_customer ?>';
		} else if ($('#id_customer').val() != null || $('#id_customer').val() != '') {
			var id_selected = $('#id_customer').val();
		} else {
			var id_selected = '';
		}
		//console.log(id_selected);
		var column = 'activation';
		var column_fill = 'active';
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
	}

	function getTypeProject() {
		if ('<?= ($getData->id_type_project) ?>' != null) {
			var id_selected = '<?= $getData->id_type_project ?>';
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
	}

	function getKar() {
		if ('<?= ($getData->id_karyawan) ?>' != null) {
			var id_selected = '<?= $getData->id_karyawan ?>';
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
	}


	// =========================================================================

	$(document).on('change', '.switch-curtain', function() {

		if ($('.curtain-switch input[type="checkbox"]').is(":checked")) {
			setTimeout(function() {
				$.ajax({
					type: 'POST',
					url: siteurl + active_controller + 'addCurtain',
					data: {},
					success: function(result) {
						$(".box-curtain").html(result);
						$(".select2").select2({
							placeholder: "Choose An Option",
							allowClear: true,
							width: '100%',
							dropdownParent: $("#form-quotation")
						});
						getProduk();
						$('.curtain-box').removeClass('collapsed-box');
					}
				})
			}, 200);
		} else {
			$(".box-curtain").html('');
			$('.curtain-box').addClass('collapsed-box');
		}
	});

	function getProduk() {

		if ('<?= $fabrics_curtain->id_product ?>' != '') {
			var id_selected = '<?= $fabrics_curtain->id_product ?>';
		} else {
			var id_selected = '';
		}
		// alert(no)
		// console.log(id_selected);
		var column = 'activation';
		var column_fill = 'aktif';
		var filter_column = 'status';
		var filter_val = '1';
		var search_column = 'usages';
		var search_value = 'curtain';
		var column_name = 'name_product';
		var table_name = 'pricelist_fabric_view';
		var key = 'id_product';
		var act = 'free';
		$.ajax({
			url: siteurl + active_controller + "getOpt",
			dataType: "json",
			type: 'POST',
			data: {
				id_selected: id_selected,
				column: column,
				column_fill: column_fill,
				filter_column: filter_column,
				filter_val: filter_val,
				search_column: search_column,
				search_value: search_value,
				column_name: column_name,
				table_name: table_name,
				key: key,
				act: act
			},
			success: function(result) {
				$('#product_curtain').html(result.html);
			},
			error: function(request, error) {
				console.log(arguments);
				alert(" Can't do because: " + error);
			}
		});
	}


	$(document).on('change', '.product_curtain', function() {
		var product = $(this).val();
		changeCurtain(product);

	})

	function changeCurtain(product) {
		$.ajax({
			type: 'POST',
			url: siteurl + 'quotation_proses/dataProduct',
			data: {
				'product': product
			},
			dataType: 'json',
			success: function(result) {
				if (result['product'] == '' || result['product'] == null) {
					$('#lebar_kain').val('');
					$('#harga_kain').val('');
					$('#t_harga_kain').val('');
					$('#t_disc_fab').val('');
					$('#cust_curtain_name').val('');
					let harga_kain = 0;
				} else {

					total_hrg_kain = parseInt(result['product'].price);
					$('#lebar_kain').val(result['product'].width);
					$('#harga_kain').val(result['product'].price);
					$('#t_harga_kain').val(("" + total_hrg_kain).replace(/\B(?=(?:\d{3})+(?!\d))/g, ","));
					$('#cust_curtain_name').val(result['product'].name_product);
					let harga_kain = total_hrg_kain;
					let disc_fab = $('#disc_fab').val() || 0;
					let val = countDisc();
					if (val == false) {
						$('#t_disc_fab').val('0');
					} else {
						t_disk = (parseInt(harga_kain) * (parseInt(disc_fab))) / 100;
						$('#t_disc_fab').val(('' + t_disk).replace(/\B(?=(?:\d{3})+(?!\d))/g, ','));
					}
					lebarKain = $('#lebar_kain').val() || 0;
					dataType = 'panel-curtain';
					// changedt_panel(, lebarKain);
					// rumus_panel();



				}
			},
			error: function() {
				alert('Ajax Error..!!!!!!');
			}
		})
	}

	// HASIL DISKON
	// =======================//
	function countDisc() {
		let disk = $('#disc_cat').val();
		let disk2 = disk.replace(/%/g, '');
		let disc_fab = $('#disc_fab').val() || 0;
		let disMnt = $('#disc_mnt').val() || 0;
		let fee_pic = $('#fee_pic').val() || 0;

		sumDisk = parseInt(disc_fab) + parseInt(disMnt) + parseInt(fee_pic);
		// $('#act_disk').val(sumDisk);
		$('#curtain_disk').val(sumDisk);
		if ($('#product_curtain').val() == '' || $('#product_curtain').val() == null) {
			alert('Pilih bahan curtain terlebih dahulu!');
			return false;
		} else if (disk2 == 0 || disk2 == '') {
			alert('Discount Category tidak boleh 0.');
			return false;
		} else if (parseInt(sumDisk) > parseInt(disk2)) {
			alert('Diskon melebihi batas.');
			return false;
		} else {
			return true;
		}
	}
</script>