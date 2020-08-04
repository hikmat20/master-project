<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>">
<?php

if (!empty($this->uri->segment(3))) {
	
  $getC             = $this->db->get_where('quotation_header',array('id_quotation'=>$id))->row();
  $customer     	= $this->db->get_where('customer',array('id_customer'=>$getC->id_customer))->row();
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
              <td class="text-left vMid" width="15%">Quotation Number <span class='text-red'>*</span></b></td>
              <td class="text-left" width="35%">
                <label class="label_input">
                  <input type="text" class="form-control input input-sm required w50" name="id_quotation" id="id_quotation" value="<?= $getC->id_delivery; empty($getC->id_delivery)?'':$getC->id_delivery?>" readonly>
                  <label class="label label-danger id_quotation hideIt">Quotation Number Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid" width="15%">Marketing <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_input">
                  <select class="form-control input-sm input required select2 " name="id_karyawan" id="id_karyawan"></select>
                  <label class="label label-danger id_karyawan hideIt">Marketing Can't be empty!</label>
                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-id_cuctomer">
              <td class="text-left vMid">Customer <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_input">
                  <select class="form-control input-sm required select2 w70" name="id_cuctomer" id="id_cuctomer"></select>
                  <label class="label label-danger id_cuctomer hideIt">Customer Can't be empty!</label>

                </label>
              </td>
			  
			  <td class="text-left vMid">Date <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_input">
                  <input type="text" class="form-control input input-sm required datepicker w50" placeholder="<?= date('Y-m-d') ?>" name="date" id="date" value="<?= empty($getC->date_quotation)? '':$getC->date_quotation?>">
                  <label class="label label-danger date hideIt">Date Can't be empty!</label>
                </label>
              </td>
			  
            </tr>
			
			<tr id="my-grid-tr-nm_pic">
              <td class="text-left vMid">PIC <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_input">
                  <input type="text" class="form-control input required w70" name="nm_pic" id="nm_pic" placeholder="Name PIC" value="<?= $getC->name_pic; empty($getC->name_pic)?'':$getC->name_pic?>">
				  <input type="hidden" class="form-control input input-sm required w70" name="id_pic" id="id_pic" value="<?= $getC->id_pic; empty($getC->id_pic)?'':$getC->id_pic?>">
                  <label class="label label-danger nm_pic hideIt">PIC Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid">Total DPP <span class='text-red'>*</span></b></td>
              <td class="text-left">
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
			
			<tr id="my-grid-tr-address">
              <td class="text-left vMid">Address <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_input">
                  <textarea type="text" class="form-control input input-sm required w70" name="address" id="address" placeholder="Address" value="<?= $getC->address; empty($getC->address)?'':$getC->address?>"></textarea>
                  <label class="label label-danger address hideIt">Address Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid">PPN <span class='text-red'>*</span></b></td>
              <td class="text-left">
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
			
            <tr id="my-grid-tr-type">
              <td class="text-left vMid">Type <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_input">
                  <select class="form-control required select2" name="type" id="type">
                    <option value=""></option>
                    <option value="process">Process</option>
                    <option value="non process">Non Process</option>
                  </select>
                  <label class="label label-danger type hideIt">Type Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid">Grand Total <span class='text-red'>*</span></b></td>
              <td class="text-left">
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
			
			<tr id="my-grid-tr-cat">
              <td class="text-left vMid">Category <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_input">
                  <select class="form-control required select2" name="cat" id="cat">
                    <option value=""></option>
                    <option value="project">Project</option>
                    <option value="wholesale">Wholesale</option>
                  </select>
                  <label class="label label-danger cat hideIt">Category Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid"></b></td>
              <td class="text-left">
                <label class="label_input">
					<input type="checkbox" name="nett_price" > Nett Price
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-type_project">
              <td class="text-left vMid">Type Project <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_input">
                  <select class="form-control required select2" name="type_project" id="type_project">
                    
                  </select>
                  <label class="label label-danger type_project hideIt">Type Project Can't be empty!</label>
                </label>
              </td>
			  
			  <td class="text-left vMid">Success Fee <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_input">
					<button type="button" class="btn btn-sm btn-success" onclick="add_fee()"><i class="fa fa-plus"></i> Add Fee</button>
                </label>
              </td>
			  
            </tr>
			
			<tr id="my-grid-tr-typ">
              <td class="text-left vMid"></b></td>
              <td class="text-left">
              </td>
			  
			  <td class="text-left vMid"></td>
              <td class="text-left">
                <label class="label_input" id="fee_data">
					<table class="table-condensed table-striped table-bordered" id="dtFee" width="100%">
						<thead>
							<tr>
								<td>PIC</td>
								<td width="10%" class="text-center">%</td>
								<td class="text-right">Value</td>
								<td class="text-right"></td>
							</tr>
						</thead>
						<tbody>
							
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
								<th rowspan="2" class="text-center" style="width:10%">Item Code</th>
								<th colspan="3" class="text-center">Total</th>
								<th colspan="2" class="text-center">Price</th>
								<th colspan="2" class="text-center">Total Price</th>
								<th rowspan="2" class="text-center">Stok</th>
								<th rowspan="2" class="text-center" width="3%">Diskon(%)</th>
								<th rowspan="2" class="text-center">Netto</th>
								<th rowspan="2" class="text-center">Status</th>
								<th rowspan="2" class="text-center">Stok Dijual</th>
								<th rowspan="2" class="text-center">Keterangan</th>
								<th rowspan="2" class="text-center" width="10%">Aksi</th>
							</tr>
							<tr>
								<th class="text-center" style="width:5%">Qty</th>
								<th class="text-center" style="width:5%">Unit</th> 
								<th class="text-center" style="width:5%">Total QTY</th>
								<th class="text-center">Fabric</th>
								<th class="text-center" width="5%">Air Freight</th>
								<th class="text-center">Fabric</th>
								<th class="text-center">Air Freight</th>
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
<div class="modal fade" id="ModalView">
    <div class="modal-dialog" style="width:90%">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="head_title">List Data</h4>
        </div>
        <div class="modal-body" >
			<div class="box box-primary">
				<div class="box-header">
					<select id="category" class="form-control select">
						<option value="">--All--</option>
						<option value="1">FABRIC</option>
						<option value="2">Curtain Accessories</option>
						<option value="3">Interior Accessories</option>
						<option value="4">Sewing</option>
						<option value="5">Artwork</option>
					</select>
				</div>
				<div class="box-body" id="view">
				
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
        <span class="glyphicon glyphicon-remove"></span>  Close</button>
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
        <div class="modal-body" >
			<div class="box box-primary">
				<div class="box-body" id="view2">
				
				</div>
			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">
        <span class="glyphicon glyphicon-remove"></span>  Close</button>
        <button type="button" class="btn btn-warning" onclick="tambah_data2()" data-dismiss="modal">
        <span class="glyphicon glyphicon-save"></span> Add Data</button>
        </div>
      </div>
    </div>
  </div>
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
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>

<script type="text/javascript">
	$(document).on('change','#category',function(){
	  var cat = $(this).val();
		  $.ajax({
			type:'POST',
			url:siteurl+'quotation_open/list_barang',
			data:{'id':cat},
			success:function(result){
				$('#view').html(result);
				// console.log(result);
			},
			error:function(){
				alert('Ajax Error..!!!!!!');
			}
			  
		  })

	})
	
	$(document).on('change','#id_cuctomer',function(){
	  var cust = $(this).val();
		  $.ajax({
			type:'POST',
			url:siteurl+'quotation_open/dataCustomer',
			data:{'id_cust':cust},
			dataType:'json',
			success:function(result){
				console.log(result);
				$('#id_pic').val(result['pic'].id_pic);
				$('#nm_pic').val(result['pic'].name_pic);
				$('#address').val(result['customer'].address_office);
				
				
				
				
			},
			error:function(){
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
	
	$('#dtFee').DataTable({
		"paging": false,
		"searching": false,
		"lengthChange": false,
		"ordering": false,
		"info":     false
		
	});
	
	function add_fee()
    {
      tujuan = siteurl+'quotation_open/addFee';
      $.post(tujuan,function(result){
        $("#ModalView2").modal();
        $("#view2").html(result);
      });
    }
	
	
	function tambah_data2(){
      var list_mentah = $('#input_edit2').val();
      var list_arr = list_mentah.split(";");
      if(list_mentah != ""){
          $.ajax({
              type:"POST",
              url:siteurl+"quotation_open/get_karyawan",
              data:"id_kar="+list_mentah,
              success:function(result){
                  var data = JSON.parse(result);
                  var dt = $('#dtFee').DataTable();
                  dt.rows().remove();
                  for (var i = 0; i < list_arr.length; i++) {
					 // console.log(data[i].id_product);
                    dt.row.add([
                      data[i].nama_karyawan,
					  '<input type="text" style="width:100%" name="persen_['+data[i].id_karyawan+']" data-id="'+data[i].id_karyawan+'" id="persen_'+data[i].id_karyawan+'" class="form-control input-sm numberOnly nominal persen text-right" placeholder="0">',
                      '<input type="text" style="width:100%" name="value_['+data[i].id_karyawan+']" data-id="'+data[i].id_karyawan+'" id="value_'+data[i].id_karyawan+'"  class="form-control input-sm numberOnly nominal value text-right" placeholder="0">',
					  '<a class="text-red hapus_item_js_2" href="javascript:void(0)" title="Hapus Item"><i class="fa fa-times"></i></a><span class="numbering"></span>',
                    ]).draw(false);

                  }
              }
          });
      }
    }
	
	 jQuery(document).on('keyup keypress blur', '.numberOnly', function(){
		if ((event.which < 48 || event.which > 57 ) && (event.which < 46 || event.which > 46 ) && event.which != 43) {
		  event.preventDefault();
		}
	  });
	  
	  jQuery(document).on('keyup change', '.nominal', function(){
		var val = this.value;
		val = val.replace(/[^0-9\.]/g,'');

		if(val != "") {
		  valArr = val.split(',');
		  valArr[0] = (parseInt(valArr[0],10)).toLocaleString();
		  val = valArr.join(',');
		}

		this.value = val;
	  });
	  
	function add_list()
    {
      // tujuan = siteurl+'quotation_open/list_barang';
      // $.post(tujuan,function(result){
        $("#ModalView").modal();
        // $("#view").html();
      // });
    }

	function tambah_data(){
      var list_mentah = $('#input_edit').val();
      var list_arr = list_mentah.split(";");
      if(list_mentah != ""){
          $.ajax({
              type:"POST",
              url:siteurl+"quotation_open/get_item_barang",
              data:"idbarang="+list_mentah,
              success:function(result){
                  var data = JSON.parse(result);
                  var dt = $('#dtDetail').DataTable();
                  dt.rows().remove();
                  for (var i = 0; i < list_arr.length; i++) {
					 // console.log(data[i].id_product);
                    dt.row.add([
						'<a class="text-red hapus_item_js" href="javascript:void(0)" title="Hapus Item"><i class="fa fa-times"></i></a><span class="numbering">'+parseInt(i+1)+'</span>',
                      data[i].id_product,
					  '<input type="text" style="width:100%" name="qty_['+data[i].id_product+']" data-id="'+data[i].id_product+'" id="qty_'+data[i].id_product+'" class="form-control input-sm numberOnly nominal required qty">',
					  '<input type="text" style="width:100%" name="unit_['+data[i].id_product+']" data-id="'+data[i].id_product+'" id="unit_'+data[i].id_product+'" class="form-control input-sm numberOnly nominal required unit">',
					  '<div class="text-right"><span name="tQty_unit_['+data[i].id_product+']" data-id="'+data[i].id_product+'" id="tQty_'+data[i].id_product+'" class="text-right nominal">0</span></div>',
                      '<div class="text-right"><span name="price_['+data[i].id_product+']" data-id="'+data[i].id_product+'" id="price_'+data[i].id_product+'" class="text-right nominal">'+data[i].pricelist+'</span></div>',
                      '<input type="text" style="width:100%" name="air_['+data[i].id_product+']" data-id="'+data[i].id_product+'" id="air_'+data[i].id_product+'"  class="form-control input-sm numberOnly nominal required air">',
                      '<div class="text-right"><span name="tPrice_['+data[i].id_product+']" data-id="'+data[i].id_product+'" id="tPrice_'+data[i].id_product+'" class="text-right">0</span></div>',
                      '<div class="text-right"><span name="tAir_['+data[i].id_product+']" data-id="'+data[i].id_product+'" id="tAir_'+data[i].id_product+'" class="text-right">0</span></div>',
                      '<div class="text-right"><span name="stok_['+data[i].id_product+']" data-id="'+data[i].id_product+'" id="stok_'+data[i].id_product+'" class="text-right">0</span></div>',
                      '<input type="text" style="width:100%" name="disk_['+data[i].id_product+']" data-id="'+data[i].id_product+'" id="disk_'+data[i].id_product+'" class="form-control input-sm numberOnly nominal required">',
                      '<div class="text-right"><span name="netto_['+data[i].id_product+']" data-id="netto_'+data[i].id_product+'" id="netto_'+data[i].id_product+'" class="text-right">0</span></div>',
                      '<div class="text-center"><span name="status_['+data[i].id_product+']" class="text-right">'+data[i].product_status+'</span></div>',
                      '<div class="text-center"><span name="stok_ready['+data[i].id_product+']" class="text-right">0</span></div>',
                      '<div class="text-center"><span name="note_['+data[i].id_product+']" class="text-right">Note</span></div>',
                      '<div class="text-center"><span name="aksi_['+data[i].id_product+']" class="text-right">Aksi</span></div>'
                    ]).draw(false);

                  }
              }
          });
      }
    }
	
	
	$(document).on('input keyup change paste','#dtDetail input.qty ',function(e){
		var qty 			= $(this).val();
		var id  			= $(this).data('id');
		var unit 			= $('#unit_'+id).val();
		var priceFabric 	= $('#price_'+id).val();
		var priceAir 		= $('#air_'+id).val();
		var totalFabric 	= $('#tPrice_'+id).val();
		var totalAir 		= $('#tAir_'+id).val();
		var netto 			= $('#netto_'+id).val();
		
		
		var tQty = parseInt(qty) * parseInt(unit);
		var tPrice = parseInt(tQty) * parseInt(priceFabric);
		
		if (tQty){
			$('#tQty_'+id).text(tQty);
			$('#tPrice_'+id).text(tPrice);
			
		}else {
			$('#tQty_'+id).text('0');
			$('#tPrice_'+id).text('0');
			// alert(tPrice);
		}
	})
	 
	$(document).on('input keyup change paste','#dtDetail input.unit',function(e){
		var unit = $(this).val();
		var id  = $(this).data('id');
		var qty = $('#qty_'+id).val();
		var priceFabric 	= $('#price_'+id).text();
		var priceAir 		= $('#air_'+id).val();
		var totalFabric 	= $('#tPrice_'+id).text();
		var totalAir 		= $('#tAir_'+id).text();
		var netto 			= $('#netto_'+id).val();

		var tQty = parseInt(qty) * parseInt(unit);
		var tPrice = parseInt(tQty) * parseInt(priceFabric);

		if (tQty){
			$('#tQty_'+id).text(tQty);
			$('#tPrice_'+id).text(tPrice);
		}else {
			$('#tQty_'+id).text('0');
			$('#tPrice_'+id).text('0');
		}
	})
	
	$(document).on('keyup change paste','#dtDetail input.air',function(e){
		var air 			= parseInt($(this).val());
		var id  			= $(this).data('id');
		var tQty 			= $('#tQty_'+id).text();
		var unit 			= $('#unit_'+id).val();
		var priceFabric 	= $('#price_'+id).text();
		var totalFabric 	= $('#tPrice_'+id).text();

		var totalAir = parseInt(tQty) * parseInt(air);
		if (totalAir){
			$('#tAir_'+id).text(totalAir);
		}else {
			$('#tAir_'+id).text('0');
		}
	})
	
	
	 $(document).ready(function() {
      var table = $('#dtDetail').DataTable();
	  
	  $('#dtDetail tbody').on( 'click', 'a.hapus_item_js', function () {

        table
            .row( $(this).parents('tr') )
            .remove()
            .draw();

        if ($('#view tr .dataTables_empty')[0]) {
          var x=1;
        }else {
          var x = $('#view tr').length+1;
        }
        for (var i = 0; i < x; i++) {
          $('.numbering').eq(i-1).text(i);
        }
        
      } );
	  
	});
	
	$(document).ready(function() {
      var table = $('#dtFee').DataTable();
	  
	  $('#dtFee tbody').on( 'click', 'a.hapus_item_js_2', function () {
 
        table
            .row( $(this).parents('tr') )
            .remove()
            .draw();

        if ($('#view tr .dataTables_empty')[0]) {
          var x=1;
        }else {
          var x = $('#view tr').length+1;
        }
        // for (var i = 0; i < x; i++) {
          // $('.numbering').eq(i-1).text(i);
        // }
         
      } );
	  
	});
	
	jQuery(document).on('keyup keypress blur', '.numberOnly', function(){
    if ((event.which < 48 || event.which > 57 ) && (event.which < 46 || event.which > 46 ) && event.which != 43) {
      event.preventDefault();
    }
  });
  
	var id = $('#id_quotation').val();
      if (id == '') {
        $.ajax({
          url: siteurl+active_controller+"getID",
          dataType : "json",
          type: 'POST',
          data: {id:'QU'},
          success: function(result){
            $('#id_quotation').val(result.id);
          },
          error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      }

	$(document).ready(function(){
	getCustomer();
	getTypeProject();
	getKar();
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
	
	$(".select").select2({
      placeholder: "Choose An Option",
      allowClear: true,
      width: '20%',
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
    var column_name = 'name_customer';
    var table_name = 'master_customer';
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
  
  function getTypeProject() {
    if ('<?=($getC->type_project)?>' != null) {
      var id_selected = '<?=$getC->type_project?>';
    }else if ($('#type_project').val() != null || $('#type_project').val() != '') {
      var id_selected = $('#type_project').val();
    }else {
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
        $('#type_project').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  
  function getKar() {
    if ('<?=($getC->id_karyawan)?>' != null) {
      var id_selected = '<?=$getC->id_karyawan?>';
    }else if ($('#id_karyawan').val() != null || $('#id_karyawan').val() != '') {
      var id_selected = $('#id_karyawan').val();
    }else {
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
        $('#id_karyawan').html(result.html);
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
  
  jQuery(document).on('click', '#saveQuotation', function(){
      var valid = getValidation();
      // console.log(valid);
      if (valid) {
        var formdata = new FormData(document.getElementById("form-quotation"));//$("#form-supplier").serialize();
        // console.log(formdata);
		// alert(formdata);
		// exit();
        $.ajax({
          url: siteurl+active_controller+"saveQuotation",
          dataType : "json",
          type: 'POST',
          data: formdata,
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(result){
            if(result.status=='1'){
              swal({
                title: "Sukses!",
                text: result['pesan'],
                type: "success",
                timer: 1500,
                showConfirmButton: false
              });
              setTimeout(function(){
                DataTables('set');
                if (($("#ModalView3").data('bs.modal') || {}).isShown) {
                  $("#ModalView3").modal('hide');
                }else {
                  $("#ModalView").modal('hide');
                }

              },1600);
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
          error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      }else {
        swal({
          title: "Gagal!",
          text: 'Please fill in the blank form!',
          type: "error",
          timer: 1500,
          showConfirmButton: false
        });
      }

      //$("#ModalView").modal('hide');
    });
</script>
