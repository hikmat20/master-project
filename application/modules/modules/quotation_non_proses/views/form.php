
<?php 

$count = $this->input->post('count');

if ($count != ''){
	$no = $count+1;
}
?>

<div class="form-horizontal">
	<div class="box box-warning">
		<div data-item="ruang" data-count="<?= $no ?>">
			<div class="box-header">
				<h4><label> Deskripsi Jendela[<?= $no ?>]</label></h4>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="form-group">
					  <label class="control-label col-sm-2" for="ruangan">Ruangan</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control required" id="ruang<?=$no?>" placeholder="Nama Ruangan" name="ruang[<?=$no?>][nm_ruang]">
						<label class="label label-danger ruang<?=$no?> hideIt">Ruangan Can't be empty!</label></label>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="lantai">Lantai</label>
					  <div class="col-sm-10">          
						<input type="text" class="form-control required" placeholder="Lantai" id="lantai<?=$no?>" name="ruang[<?=$no?>][lantai]">
						<label class="label label-danger lantai<?=$no?> hideIt">Lantai Can't be empty!</label></label>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="jendela">Jendela</label>
					  <div class="col-sm-10">          
						<input type="text" class="form-control required" placeholder="Jendela" id="jendela<?=$no?>" name="ruang[<?=$no?>][jendela]">
						<label class="label label-danger jendela<?=$no?> hideIt">Jendela Can't be empty!</label></label>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="lebar">Lebar</label>
					  <div class="col-md-4">          
						<div class="input-group">
							<input type="number" min="0" class="form-control required lebar" data-id="<?=$no?>" placeholder="0" id="lebar<?=$no?>" name="ruang[<?=$no?>][lebar]">
							<span class="input-group-addon">cm</span>
						</div>
							<label class="label label-danger lebar<?=$no?> hideIt">Lebar Can't be empty!</label></label>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="tinggi">Tinggi</label>
					  <div class="col-md-4">  
						<div class="input-group">
							<input type="number" min="0" class="form-control required" placeholder="0" data-id="<?=$no?>" id="tinggi<?=$no?>" name="ruang[<?=$no?>][tinggi]">
							<span class="input-group-addon">cm</span>
						</div>
							<label class="label label-danger tinggi<?=$no?> hideIt">Tinggi Can't be empty!</label></label>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2">Installation</label>
					  <div class="col-md-4">  
						<div class="input-group">
							<label style="padding-left:20px"><input type="radio" checked class="required" name="ruang[<?=$no?>][installation]" value="no"><span style="margin-left:5px">No</span></label>
							<label style="margin-left:20px"><input type="radio" class="required" name="ruang[<?=$no?>][installation]" value="yes"><span style="margin-left:5px">Yes</span></label>
							<label class="label label-danger ruang[<?=$no?>][installation] hideIt">Installation Can't be empty!</label>
						</div>
					  </div>
					</div>
				</div>
				<div class="col-md-4 col-sm-offset-1">
					<div class="form-horizontal">
						<div class="form-group">
						  <div class="col-md-4">          
						  <label class="control-label" for="upload">Upload Gambar</label>
							<input type="file" id="upload_<?=$no?>" name="uplaod_gambar_[<?=$no?>][]">
						  </div>
						</div>
						<img src="" alt="gamabar" id="gmbr_[<?=$no?>][]">
					</div>
				</div>
			</div>
		<hr>
			<!-- DETAIL -->
			
			<div class="box-solid">
			
				<div class="box-header">
					<button type="button" class="btn btn-xs addCurtain" data-id="<?=$no?>"><i class="fa fa-plus"></i></button>
					<button type="button" class="btn btn-xs"><i class="fa fa-minus"></i></button>
				  <label style="font-size:20px;margin-left:20px">Curtain</label>
				  
					<!--<label class="switch">
					  <input type="checkbox">
					  <span class="slider round"></span>
					</label> -->
				</div>
				
				<div id="box-body" style="padding:5px">
				  <div class="box-curtain<?=$no?>">
					
				 </div>  
			   </div>

				<div class="box-header">
					<button type="button" class="btn btn-xs"><i class="fa fa-plus"></i></button>
					<button type="button" class="btn btn-xs"><i class="fa fa-minus"></i></button>
				  <label style="font-size:20px;margin-left:20px">Vitrage</label>
				</div>
				<div id="box-body" style="padding:5px">
				  <div class="box-vitrage_">
					<!--<div class="panel panel-default">
						<div class="panel-body" >
							<div class="col-md-6">
								<div class="form-group">
								  <label class="control-label col-sm-2" for="lebar">Lebar</label>
								  <div class="col-md-4">          
									<input type="text" class="form-control required" placeholder="0" id="lebar<?=$no?>" name="ruang[<?=$no?>][lebar]">
									<label class="label label-danger lebar<?=$no?> hideIt">Ruangan Can't be empty!</label></label>
								  </div>	
								</div>
							</div>
						</div>
					</div>-->
				 </div>  
			   </div>	
			   
		</div>
	</div>
</div>


<script>

$('#dtFee').DataTable({
		"paging": false,
		"searching": false,
		"lengthChange": false,
		"ordering": false,
		"info":     false
		
	});

$(document).on('click','.addCurtain',function(){
	var no = $(this).data('id');

	$.ajax({
		type:'POST',
		url:siteurl+active_controller+'addCurtain',
		data:{'no':no},
		success:function(result){
			$(".box-curtain"+no).html(result);
			$(".select2").select2({
			  placeholder: "Choose An Option",
			  allowClear: true,
			  dropdownParent: $("#form-quotation")
			});
			getProduk(no);
			getSewing(no);
		}
	})
})

function getSewing(no){
	// if ('<?=($getC->id_customer)?>' != null) {
		  // var id_selected = '<?=$getC->id_customer?>';
	// }else if ($('#id_produk_curtain<?=$no?>').val() != null || $('#id_produk_curtain<?=$no?>').val() != '') {
	  // var id_selected = $('#id_produk_curtain<?=$no?>').val();
	// }else {
	  // var id_selected = '';
	// }
	//console.log(id_selected);
	var column = 'id_sewing';
	var column_fill = '';
	var column_name = 'item';
	var table_name = 'sewing';
	var key = 'id_sewing';
	var act = 'free';
	$.ajax({
	  url: siteurl+active_controller+"getOpt",
	  dataType : "json",
	  type: 'POST',
	  data: {
		// id_selected:id_selected,
		column:column,
		column_fill:column_fill,
		column_name:column_name,
		table_name:table_name,
		key:key,
		act:act
	  },
	  success: function(result){
		$('#jahitan'+no).html(result.html);
	  },
	  error: function (request, error) {
		console.log(arguments);
		alert(" Can't do because: " + error);
	  }
	});
	
}


function getProduk(no) {
    // if ('<?=($getC->id_customer)?>' != null) {
		  // var id_selected = '<?=$getC->id_customer?>';
	// }else if ($('#id_produk_curtain<?=$no?>').val() != null || $('#id_produk_curtain<?=$no?>').val() != '') {
	  // var id_selected = $('#id_produk_curtain<?=$no?>').val();
	// }else {
	  // var id_selected = '';
	// }
	//console.log(id_selected);
	var column = 'id_product';
	var column_fill = '';
	var column_name = 'name_product';
	var table_name = 'master_product_fabric';
	var key = 'id_product';
	var act = 'free';
	$.ajax({
	  url: siteurl+active_controller+"getOpt",
	  dataType : "json",
	  type: 'POST',
	  data: {
		// id_selected:id_selected,
		column:column,
		column_fill:column_fill,
		column_name:column_name,
		table_name:table_name,
		key:key,
		act:act
	  },
	  success: function(result){
		$('#product_curtain'+no).html(result.html);
	  },
	  error: function (request, error) {
		console.log(arguments);
		alert(" Can't do because: " + error);
	  }
	});
}

// QTY UNIT CHANGE //
//=====================//

$(document).on('change keyup paste blur','.qty_unit',function(){
	var no 		= $(this).data('id');
	var qty 	= $(this).val();
	var tKain 	= $('#t_kain'+no).val();
	var type 	= $('#type'+no).data('type');
	
	console.log(tKain);
	console.log(no);
	console.log(qty);
	console.log(type);
	
	total_kain = parseInt(qty) * tKain;
	
	$('#tot_kain'+no).val(total_kain.toFixed(1));
	
})

// DISKON MAINTENANCE //
//=====================//

$(document).on('change','.pilihMainten',function(){
	var no 		= $(this).data('id');
	var type 	= $(this).val();

	if (type == 'yes'){
		$('#disc_mnt'+no).val('5');
	} else {
		$('#disc_mnt'+no).val('0');
	}
})

// INPUT DISKON FABRIC //
//=====================//

$(document).on('keyup paste change blur','.disc_fab',function(){
	var no 		= $(this).data('id');
	var disVal 	= $(this).val();
	var disk 	= $(disc_cat).val();
	disk2 		= disk.replace(/%/g,'');
	
	if (parseInt(disVal) > parseInt(disk2)){
		alert('diskon melebihi batas');
		$(this).val(0);
	}
})


// PRODUCT CURTAIN //
//=====================//

$(document).on('change','.product_curtain',function(){
  var no = $(this).data('id');
  var product = $(this).val();
  
	  $.ajax({
		type:'POST',
		url:siteurl+'quotation_proses/dataProduct',
		data:{'product':product},
		dataType:'json',
		success:function(result){
			// console.log(result['product']);
			$('#lebar_kain'+no).val(result['product'].width);	
			$('#harga_kain'+no).val(result['product'].pricelist.replace(/\B(?=(?:\d{3})+(?!\d))/g,","));	
		},
		error:function(){
			alert('Ajax Error..!!!!!!');
		}  
	  })
})

// DATA DETAIL //
//=============//

$(document).on('change','.dt_panel',function(e){
	e.preventDefault()
	var no 	= $(this).data('id');
	type 	= $(this).val();


	$.ajax({
		type:'POST',
		url:siteurl+active_controller+'addDetailCurtain',
		data:{'no':no,'type':type},
		success:function(result){
			// console.log(result);
			$(".data_detail"+no).html(result);
			$(".select2").select2({
			  placeholder: "Choose An Option",
			  allowClear: true,
			  dropdownParent: $("#form-quotation")
			});
		}
	})
})


// JAHITAN //
//----------//

$(document).on('change','.jahitan',function(){
  var no = $(this).data('id');
  var id_jahitan = $(this).val();
	  $.ajax({
		type:'POST',
		url:siteurl+'quotation_proses/dataJahitan',
		data:{'id_jahitan':id_jahitan},
		dataType:'json',
		success:function(result){
			// console.log(result['sewing']);
			$('#hrg_jahitan'+no).val(result['sewing'].price.replace(/\B(?=(?:\d{3})+(?!\d))/g,","));	
		},
		error:function(){
			alert('Ajax Error..!!!!!!');
		}  
	  })
})

$(document).on('change','.pilihJahitan',function(){
  var type = $(this).val();
  var no = $(this).data('id');
  
  if (type == 'yes'){
	  
	  $('#dt_jns_jahit'+no).html(
	  '<strong>'+
		'<select class="form-control required select2 jahitan" data-id="<?=$no?>" name="product_curtain[<?=$no?>][jahitan]" id="jahitan<?=$no?>"></select>'+
		'<input type="text" style="margin-top:5px" readonly class="form-control text-right" placeholder="0" name="product_curtain[<?=$no?>][hrg_jahitan]" id="hrg_jahitan<?=$no?>">'+
	  '</strong>');
	  $(".select2").select2({
		  placeholder: "Choose An Option",
		  allowClear: true,
		  dropdownParent: $("#form-quotation")
	  });
	  getSewing(no);
	  
  } else {
	  $('#dt_jns_jahit'+no).html('');
  }
})

// RAIL CURTAIN //
//--------------//

$(document).on('change','.pilihRail',function(){
  var type 	= $(this).val();
  var no 	= $(this).data('id');
  
  if (type == 'yes'){
	  
	$.ajax({
		type	:'POST',
		url		:siteurl+active_controller+'addRailCurtain',
		data	:{'no':no},
		success	:function(result){
			$("#dt_rail_curtain"+no).html(result);
			$(".select2").select2({
			  placeholder: "Choose An Option",
			  allowClear: true,
			  dropdownParent: $("#form-quotation")
			});
		}
	})
	  
  } else {
	  $('#dt_rail_curtain'+no).html('');
  }
})



// RUMUS PANEL //
//-------------//

function rumus_panel(no,ovlKiri,ovlTengah,jh,jv,lebar,lbrKain,fullness){
	
	jml = (parseInt(ovlKiri) + parseInt(ovlTengah) + parseInt(jh) + parseInt(jv) + parseInt(lebar))/parseInt(lbrKain)*(parseInt(fullness)/100);
	$('#rumus_panel'+no).val(jml.toFixed(2));
}

// RUMUS TOTAL KAIN NON PANEL //
//------------------------//

function total_kain_np(no,lebar,ovlKiri,ovlTengah,jh,fullness){

	jmlKain = ((parseInt(lebar) + parseInt(ovlKiri) + parseInt(ovlTengah) + parseInt(jh)) * parseInt(fullness)/100)/100;
	$('#t_kain'+no).val(jmlKain.toFixed(1));
}

// RUMUS TOTAL KAIN PANEL //
//------------------------//

function total_kain(no,tinggi,roundUp,jv){

	jmlRound = (parseInt(jv) + parseInt(tinggi)) * parseInt(roundUp)/100;
	$('#t_kain'+no).val(jmlRound);
}


$(document).on('keyup paste change blur','.ovl_kiri,.ovl_tengah,.jahit_h,.jahit_v,.fullness,.r_up_panel',function(){
	var no 		= $(this).data('id');
	lebar 		= $('#lebar'+no).val() || 0;
	ovlKiri 	= $('#ovl_kiri'+no).val() || 0;
	ovlTengah 	= $('#ovl_tengah'+no).val() || 0;
	jh 			= $('#jahit_h'+no).val() || 0;
	jv 			= $('#jahit_v'+no).val() || 0;
	lbrKain		= $('#lebar_kain'+no).val() || 0;
	fullness	= $('#fullness'+no).val() || 0;
	roundUp 	= $('#r_up_panel'+no).val() || 0;
	tinggi 		= $('#tinggi'+no).val() || 0;
	type 		= $('#type'+no).data('type');
	
	if (type == 'panel'){
		rumus_panel(no,ovlKiri,ovlTengah,jh,jv,lebar,lbrKain,fullness);
		total_kain(no,tinggi,roundUp,jv);
	} else {
		total_kain_np(no,lebar,ovlKiri,ovlTengah,jh,fullness);
		
	}
	
})

// RUMUS DISKON FABRIC //
//---------------------//

function diskon_fabric(no,harga_kain,diskon_fab){

	// alert(no+","+harga_kain+","+diskon_fab);
	t_disk = (parseInt(harga_kain) * parseInt(diskon_fab))/100;
	$('#t_disc_fab'+no).val((''+t_disk).replace(/\B(?=(?:\d{3})+(?!\d))/g,','));
}

$(document).on('keyup paste change focus blur','.harga_kain,.disc_fab',function(){
	var no 		= $(this).data('id');
	diskon_fab 	= $('#disc_fab'+no).val() || 0;
	harga_kain 		= $('#harga_kain'+no).val().replace(/,/g,'') || 0;
	
	diskon_fabric(no,harga_kain,diskon_fab);
})

// RUMUS DISKON MAINTENANCE //
//--------------------------//

function diskon_maintenance(no,harga_kain,diskon_fab,diskon_mnt,mode){
	if (mode == 'yes') {
		t_disk = (parseInt(harga_kain) * (parseInt(diskon_fab) + 5 ))/100;
		$('#t_disc_fab'+no).val((''+t_disk).replace(/\B(?=(?:\d{3})+(?!\d))/g,','));
	} else {
		t_disk = (parseInt(harga_kain) * (parseInt(diskon_fab)))/100;
		$('#t_disc_fab'+no).val((''+t_disk).replace(/\B(?=(?:\d{3})+(?!\d))/g,','));
	}
}

$(document).on('change','.pilihMainten',function(){
	var no 		= $(this).data('id');
	mode 		= $(this).val();
	diskon_fab 	= $('#disc_fab'+no).val() || 0;
	diskon_mnt 	= $('#disc_mnt'+no).val() || 0;
	harga_kain 	= $('#harga_kain'+no).val().replace(/,/g,'') || 0;
	
	diskon_maintenance(no,harga_kain,diskon_fab,diskon_mnt,mode);
})	
	

</script>