<?php

if (!empty($this->uri->segment(3))) {
	
  // $getC             = $this->db->get_where('master_supplier',array('id_supplier'=>$id))->row();
  $getC             = $this->db->get_where('quotation_header',array('id_quotation'=>$id))->row();
  $customer     	= $this->db->get_where('customer',array('id_customer'=>$getC->id_customer))->row();
  // $name_provinsi    = $this->db->get_where('provinsi',array('id_prov'=>$getC->id_provinsi))->row();
  // $name_brand       = $this->db->where_in('id_brand',explode(";",$getC->id_brand))->get('master_product_brand')->result();

}
if ($this->uri->segment(4) == 'view') {
  $view = 'style="display:block"';
}else {
  $mode = 'input';
}

?>
<form class="" id="form-quotation" action="" method="post" enctype="multipart/form-data">
  <div class="box box-success">
	<div class="box-body" style="">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <table id="my-grid3" class="table-condensed" width="100%">
          <tbody>
            <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
              <th class="text-center" colspan='5'>HEADER QUOTATION</th>
            </tr>
            <tr id="my-grid-tr-id_quotation">
              <td class="text-left vMid">Code <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->id_quotation:'-'?>
                </label>
                <label class="label_input">
                  <input type="hidden" name="type" value="<?=empty($getC->id_quotation)?'add':'edit'?>">
                  <input type="text" class="form-control input input-sm required w50" name="id_quotation" id="id_quotation" value="<?= $getC->id_delivery; empty($getC->id_delivery)?'':$getC->id_delivery?>" readonly>
                  <label class="label label-danger id_quotation hideIt">Code Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid">Date <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->date_quotation:'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input input-sm required datepicker w50" name="date" id="date" value="<?= empty($getC->date_quotation)? date('Y-m-d'):$getC->date_quotation?>">
                  <label class="label label-danger date hideIt">Date Can't be empty!</label>
                </label>
              </td>
			  
            </tr>
			
            <tr id="my-grid-tr-id_cuctomer">
              <td class="text-left vMid">Customer <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$customer->nm_customer:'-'?>
                </label>
                <label class="label_input">
                  <select class="form-control input-sm required select2 w70" name="id_cuctomer" id="id_cuctomer"></select>
                  <label class="label label-danger id_cuctomer hideIt">Customer Can't be empty!</label>

                </label>
              </td>
			  
			  <td class="text-left vMid">Total DPP <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->total_dpp:'-'?>
                </label>
                <label class="label_input">
					<div class="w70">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Rp</span>
						<input type="text" class="form-control input input-sm required" readonly name="total_dpp" id="total_dpp" value="<?= empty($getC->total_dpp)? '':$getC->total_dpp?>">
						<span class="input-group-addon" id="basic-addon2">.00</span>
					</div>
					</div>
				  <label class="label label-danger total_dpp hideIt">Code Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-nm_pic">
              <td class="text-left vMid">PIC <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$pic->name_pic:'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input input-sm required w70" name="nm_pic" id="nm_pic" placeholder="Name PIC" value="<?= $getC->name_pic; empty($getC->name_pic)?'':$getC->name_pic?>">
				  <input type="hidden" class="form-control input input-sm required w70" name="id_pic" id="id_pic" value="<?= $getC->id_pic; empty($getC->id_pic)?'':$getC->id_pic?>">
                  <label class="label label-danger nm_pic hideIt">PIC Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid">PPN <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->ppn:'-'?>
                </label>
                <label class="label_input">
					<div class="w70">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Rp</span>
						<input type="text" class="form-control input input-sm required" readonly name="ppn" id="ppn" value="<?= empty($getC->ppn)? '':$getC->ppn?>">
						<span class="input-group-addon" id="basic-addon2">.00</span>
					</div>
					</div>
                  <label class="label label-danger ppn hideIt">Code Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-address">
              <td class="text-left vMid">Address <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->address:'-'?>
                </label>
                <label class="label_input">
                  <textarea type="text" class="form-control input input-sm required w70" name="address" id="address" placeholder="address" value="<?= $getC->address; empty($getC->address)?'':$getC->address?>"></textarea>
                  <label class="label label-danger address hideIt">Address Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid">Grand Total <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->grand_total:'-'?>
                </label>
                <label class="label_input">
					<div class="w70">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">Rp</span>
						<input type="text" class="form-control input input-sm numberOnly  nominal required" readonly name="grand_total" id="grand_total" value="<?= empty($getC->grand_total)? '':$getC->grand_total?>">
						<span class="input-group-addon" id="basic-addon2">.00</span>
					</div>
					</div>
				  <label class="label label-danger grand_total hideIt">Grand Total Can't be empty!</label>
                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-type">
              <td class="text-left vMid">Type <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->type:'-'?>
                </label>
                <label class="label_input">
                  <select class="form-control required select2" name="type" id="type">
                    <option value="process">Process</option>
                    <option value="non process">Non Process</option>
                  </select>
                  <label class="label label-danger type hideIt">Type Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid">Success Fee <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->ppn:'-'?>
                </label>
                <label class="label_input">
					<button type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Fee</button>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-category">
              <td class="text-left vMid">Category <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->category:'-'?>
                </label>
                <label class="label_input">
                  <select class="form-control required select2" name="category" id="category">
                    <option value="project">Project</option>
                    <option value="wholesale">Wholesale</option>
                  </select>
                  <label class="label label-danger category hideIt">Category Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid"></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->ppn:'-'?>
                </label>
                <label class="label_input" id="fee_data">
					<table class="table-condensed table-striped table-bordered" width="90%">
						<thead>
							<tr>
								<td>PIC</td>
								<td width="10%" class="text-center">%</td>
								<td class="text-right">Value</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>PIC</td>
								<td class="text-center">%</td>
								<td class="text-right">Value</td>
							</tr>
						</tbody>
					</table>
                </label>
              </td>
            </tr>
		  </tbody>
		</table>
	  <hr>
	  </div>
	  <div class="col-sm-12 col-md-12 col-lg-12">
	  <table class="table table-condensed table-bordered">
		<thead>
			<tr>
				<td class="text-center">
					DETAIL QUOTATION ITEM
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
				<div style="overflow-y:auto">
					<table id="dtDetail" class="table-condensed table-striped table-bordered" width="130%">
						<thead class="bg-yellow">
							<tr>
								<th rowspan="2">#</th>
								<th rowspan="2" class="text-center">Item Code</th>
								<th colspan="3" class="text-center">Total</th>
								<th colspan="2" class="text-center">Price</th>
								<th colspan="2" class="text-center">Total Price</th>
								<th rowspan="2" class="text-center" >Stok</th>
								<th rowspan="2" class="text-center" width="7%">Diskon(%)</th>
								<th rowspan="2" class="text-center">Netto</th>
								<th rowspan="2" class="text-center">Status</th>
								<th rowspan="2" class="text-center">Stok Dijual</th>
								<th rowspan="2" class="text-center">Keterangan</th>
								<th rowspan="2" class="text-center" width="50%">Aksi</th>
							</tr>
							<tr>
								<th class="text-center" style="width:70%">Qty</th>
								<th class="text-center" style="width:70%">Unit</th> 
								<th class="text-center" style="width:70%">Total QTY</th>
								<th class="text-center">Fabric</th>
								<th class="text-center ">Air Freight</th>
								<th class="text-center">Fabric</th>
								<th class="text-center ">Air Freight</th>
							</tr>
						</thead>
						<tbody id="dt_detail">
							
						</tbody>
					</table>
					</div>
					<br>
					<button type="button" onclick="add_list()" class="btn btn-info btn-sm" id="addList"><i class="fa fa-plus"></i> Add List</button>
				</td>
			</tr>
		</tbody>
	  </table>
	  </div>
    </div>

	<?php
		echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success label_input','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'saveQuotation')).' ';
	?>
	</div>
</div>
</form>

<style>
	.inSp{
		text-align: center;
		display: inline-block;
		width: 100px;
	}
	.inSp2{
		text-align: center;
		display: inline-block;
		width: 45%;
	}
	.inSpL{
		text-align: left;
	}
	.vMid{
		vertical-align: middle !important;
	}
  .w10{
		display: inline-block;
		width: 10%;
	}
  .w15{
		display: inline-block;
		width: 15%;
	}
  .w20{
		display: inline-block;
		width: 20%;
	}
  .w30{
		display: inline-block;
		width: 30%;
	}
  .w40{
		display: inline-block;
		width: 40%;
	}
  .w50{
		display: inline-block;
		width: 50%;
	}
  .w60{
		display: inline-block;
		width: 60%;
	}
  .w70{
		display: inline-block;
		width: 70%;
	}
  .w80{
		display: inline-block;
		width: 80%;
	}
  .w90{
		display: inline-block;
		width: 90%;
	}
  .hideIt{
    display: none;
  }
  .showIt{
    display: block;
  }

</style>

<script type="text/javascript">
	$('#dtDetail').DataTable({
		"paging": false,
		"searching": false,
		"lengthChange": false,
		"ordering": false
		
	});
	function add_list(){
		var table_dtl = $('#dtDetail').DataTable();
		 var arr_brg_json = <?php echo json_encode($data); ?>;
      var arr_brg_string = JSON.stringify(arr_brg_json);
      var arr_brg = JSON.parse(arr_brg_string);
		if ($('#dt_detail tr .dataTables_empty')[0]) {
			var i=1;
		  } else {
			var i = $('#dt_detail tr').length+1;
		  }
		  
		table_dtl.row.add([
        '<a class="text-red hapus_item_js" href="javascript:void(0)" title="Hapus Item"><i class="fa fa-times"></i></a><span class="numbering">'+i+'</span>',
        '<select onkeyup="setitembarang(this.value,this.id)" id="item_brg_so'+i+'" name="item_brg_so" class="form-control input-xs form_item_so select2" style="width: 100%;" tabindex="-1">'+
        '<option value=""></option>'+
		'<?php
        foreach(@$data as $k=>$v){
		  ?>'+
          '<option value='+'<?php echo $v->id_product; ?>'+'>'+
          '<?php echo $v->id_product ?>'+' , '+'<?php echo $v->name_product?>'+' , '+'<?php echo $v->kdcab ?>'+
          '</option>'+'<?php } ?>'+
          '</select>',
          '<span id="item_brg_so'+i+'_satuan"></span>',
          '<span id="item_brg_so'+i+'_stok"></span>',
          '<span id="item_brg_so'+i+'_qty"></span>',
          '<span id="item_brg_so'+i+'_harga"></span>',
          '<span id="item_brg_so'+i+'_diskon"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',
          '<span id="item_brg_so'+i+'_total" class="subtotal_view"></span>',


			]).draw();
			$(".form_item_so").select2({
			  placeholder: "Pilih",
			  allowClear: true
			});
			
		}
		
	$('#dtDetail tbody').on( 'change', 'select.form_item_so', function () {
        var tabb = $('#dtDetail').DataTable();
        var a = $(this).val();
        var satuan = 0;
        var stok = 0;
        var xxc = tabb.row( $(this).parents('tr') );

        if(a != ""){
          console.log('1');
          $.ajax({
            type:"GET",
            url:siteurl+"quotation_open/get_item_barang",
            data:"idbarang="+a,
            success:function(result){
              var data = JSON.parse(result);
              console.log(data);
              var idbar = "'"+data.id_barang+"'";
              var qty = '<input type="text" class="form-control input-sm qty_order number" id="qty_order_'+data.id_barang+'" name="qty_order[]" style="width:100% !important;">';
			  var unit = '<input type="text" class="form-control input-sm unit number" id="unit'+data.id_barang+'" name="unit[]" style="width:100% !important;">';
              var tot_qty = '<span id="unit'+data.id_barang+'" ></span>';
              tabb.cell(xxc, 2).data(qty).draw();
              tabb.cell(xxc, 3).data(unit).draw();
              tabb.cell(xxc, 4).data(tot_qty).draw();
              // tabb.cell(xxc, 5).data(harga).draw();
              // tabb.cell(xxc, 6).data(diskon).draw();
              // tabb.cell(xxc, 7).data(diskon).draw();
              // tabb.cell(xxc, 8).data(diskon).draw();
              // tabb.cell(xxc, 9).data(diskon).draw();
              // tabb.cell(xxc, 10).data(diskon).draw();
              // tabb.cell(xxc, 11).data(diskon).draw();
              // tabb.cell(xxc, 12).data(diskon).draw();
              // tabb.cell(xxc, 13).data(diskon).draw();
              // tabb.cell(xxc, 14).data(diskon).draw();
              // console.log(data.satuan);
              }
            });
          }

      } );
	
	var id = $('#id_delivery').val();
      if (id == '') {
        $.ajax({
          url: siteurl+active_controller+"getID",
          dataType : "json",
          type: 'POST',
          data: {id:'DL'},
          success: function(result){
            $('#id_delivery').val(result.id);
          },
          error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      }

	$(document).ready(function(){
	getCustomer();
    $(".datepicker").datepicker({
        format : "yyyy-mm-dd",
        showInputs: true,
        autoclose:true
    });
    $(".select2").select2({
      placeholder: "Choose An Option",
      allowClear: true,
      width: '70%',
      dropdownParent: $("#form-quotation")
    });
    $('.select2-search--inline').css('margin-right','5%');
    $('.select2-search--inline').css('width','100%');
    $('.select2-search__field').css('margin-right','5%');
    $('.select2-search__field').css('width','90% !important');
    $('.select2-search__field').css('padding-right','5%');

    jQuery(document).on('keyup', '.bank_num', function(){
      var foo = $(this).val().split("-").join(""); // remove hyphens
      if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
      }
      $(this).val(foo);
    });
	
    $(document).on('change', '#payment_option', function(e){
      var val = $(this).val();
      if (val == 'credit') {
        $('#credit_term').css({"display": "block"}).fadeIn(1000);
      }else {
        $('#credit_term').fadeOut(1000).css({"display": "none"});
      }

    });
    $(document).on('change', '#id_type', function(e){
      // getBusCat();
    });
    $(document).on('change', '#id_business', function(e){
      // getSupCap();
    });
    $(document).on('change', '#id_capacity', function(e){
      //  console.log($(this).val());
    });
    $(document).on('change', '#id_provinsi', function(e){
      getKab($(this).val());
	  
    });
    $(document).on('click change keyup paste blur', '#form-quotation .form-control', function(e){
      //console.log('AHAHAHAHA');
      var val = $(this).val();
      var id = $(this).attr('id');
      if (val == '') {
        //$('.'+id).addClass('hideIt');
        $('.'+id).css('display','inline-block');
      }else {
        $('.'+id).css('display','none');
      }
    });
    if ('<?php $getC->id_cuctomer ?>' != null) {
		id_prov = '<?php $getC->id_cuctomer ?>';
      getKab(id_prov);
      // getBusCat();
      // getSupCap();
    }
    if ('<?= $this->uri->segment(4) ?>' == 'view') {
      $('.label_view').css("display","block");
      $('.label_input').css("display","none");
    }else {
      $('.label_view').css("display","none");
      $('.label_input').css("display","block");
    }
    console.log('<?= $this->uri->segment(4) ?>');
	});

	function getCustomer() {
    if ('<?=($getC->id_customer)?>' != null) {
      var id_selected = '<?=$getC->id_customer?>';
    }else if ($('#id_customer').val() != null || $('#id_customer').val() != '') {
      var id_selected = $('#id_customer').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = 'id_customer';
    var column_fill = '';
    var column_name = 'nm_customer';
    var table_name = 'customer';
    var key = 'id_customer';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_cuctomer').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  
  function getKab(idProv) {
    if ('<?=($getC->id_kabupaten)?>' != null) {
      var id_selected = '<?=$getC->id_kabupaten?>';
    }else if ($('#id_kota').val() != null || $('#id_kota').val() != '') {
      var id_selected = $('#id_kota').val();
    }else {
      var id_selected = '';
    }
	// var id_prov = $('#id_provinsi').val();
    // console.log(idProv);
    var column = 'id_prov';
    var column_fill = idProv;
    var column_name = 'nama';
    var table_name = 'kabupaten';
    var key = 'id_kab';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_kota').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  
  
  function getCodeCategory() {

    var id_selected = $('#id_category').val();
    //console.log(id_selected);
    var column = 'id_categori';
    var column_fill = '';
    var column_name = 'nm_categori';
    var table_name = 'category';
    var key = 'id_categori';
    var act = 'free';
    $.ajax({
      url: siteurl+active_controller+"getVal",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        // $('.telephone_code').val(result.html);
		// alert('data masuk');
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  
  
  function getSupplierType() {
    if ('<?=($getC->id_type)?>' != null) {
      var id_selected = '<?=$getC->id_type?>';
    }else if ($('#id_type').val() != null || $('#id_type').val() != '') {
      var id_selected = $('#id_type').val();
    }else {
      var id_selected = '';
    }
    var column = '';
    var column_fill = '';
    var column_name = 'name_type';
    var table_name = 'child_supplier_type';
    var key = 'id_type';
    var act = '';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_type').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  
  function getToq() {
    if ('<?=($getC->id_toq)?>' != null) {
      var id_selected = '<?=$getC->id_toq?>';
    }else if ($('#id_toq').val() != null || $('#id_toq').val() != '') {
      var id_selected = $('#id_toq').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_toq';
    var table_name = 'child_supplier_toq';
    var key = 'id_toq';
    var act = '';
    $.ajax({
      url: siteurl+active_controller+"getOpt",
      dataType : "json",
      type: 'POST',
      data: {
        id_selected:id_selected,
        column:column,
        column_fill:column_fill,
        column_name:column_name,
        table_name:table_name,
        key:key,
        act:act
      },
      success: function(result){
        $('#id_toq').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  function sel2() {

  }
  function getValidation() {
    var count = 0;
    var success = true;
    $(".required").each(function() {
      var node = $(this).prop('nodeName');
      var type = $(this).attr('type');
      //console.log(type);
      var success = true;
      if (node == 'INPUT' && type == 'radio') {
        //$("input[name='"+$(this).attr('id')+"']:checked").val();
        var c = 0;
        //console.log($(this).attr('name'));
        //console.log($("."+$(this).attr('name')).parents('td').html());
        $("input[name='"+$(this).attr('name')+"']").each(function(){
            if ($(this).prop('checked')==true){
                c++;
            }
        });
        if (c == 0) {
          //console.log('berhasil');

          var name = $(this).attr('name');
          $('.'+name).removeClass('hideIt');
          $('.'+name).css('display','inline-block');
          $('html, body, .modal').animate({
              scrollTop: $("#form-quotation").offset().top
          }, 2000);
          count = count+1;
        }

      }
      else if ((node == 'INPUT' && type == 'text') || (node == 'SELECT')) {
        if ($(this).val() == null || $(this).val() == '') {
          var name = $(this).attr('id');

          name.replace('[]','');
          $('.'+name).removeClass('hideIt');
          $('.'+name).css('display','inline-block');
          $('html, body, .modal').animate({
              scrollTop: $("#form-quotation").offset().top
          }, 2000);
          //console.log(name);
          count = count+1;
        }
      }

    });
    console.log(count);
    if (count == 0) {
      //console.log(success);
      return success;
    }else {
      return false;
    }
  }
  /*
  function getBrandX() {
    var id_supplier = '<?=$id?>';
    var id_brand    = <?php echo json_encode(explode(";",$getC->id_brand) );?>;
    $.ajax({
      url: siteurl+active_controller+"getBrandOpt",
      dataType : "json",
      type: 'POST',
      data: {id_supplier:id_supplier},
      success: function(result){
        $('#id_brand').html(result.html);
        $('#id_brand').val(id_brand);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
  }
  */
</script>
