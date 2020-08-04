<div class="col-md-6" id="type<?=$no?>" data-type="nonpanel">
	<br>		
	<div class="form-group">
	  <label class="control-label col-sm-3" for="bukaan<?=$no?>">Bukaan Arah</label>
	  <div class="col-md-7">  
		<strong>
			<select class="form-control required select2" name="product_curtain[<?=$no?>][bukaan]" id="bukaan<?=$no?>">
				<option value=""></option>
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
			<label class="label label-danger bukaan<?=$no?> hideIt">Bukaan Arah Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="ovl_kiri<?=$no?>">Overlap Kiri</label>
	  <div class="col-md-7">  
		<strong>
			<input type="number" min="0" class="form-control required ovl_kiri" data-id="<?=$no?>" placeholder="0" name="product_curtain[<?=$no?>][ovl_kiri]" id="ovl_kiri<?=$no?>">
			<label class="label label-danger ovl_kiri<?=$no?> hideIt">Overlap Kiri Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="ovl_tengah<?=$no?>">Overlap Tengah</label>
	  <div class="col-md-7">  
		<strong>
			<input type="number" min="0" class="form-control required ovl_tengah" data-id="<?=$no?>" placeholder="0"  name="product_curtain[<?=$no?>][ovl_tengah]" id="ovl_tengah<?=$no?>">
			<label class="label label-danger ovl_tengah<?=$no?> hideIt">Overlap Tengah Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="jahit_h<?=$no?>">Jahit Horizontal</label>
	  <div class="col-md-7">  
		<strong>
			<input type="number" min="0" class="form-control required jahit_h" data-id="<?=$no?>" placeholder="0"  name="product_curtain[<?=$no?>][jahit_h]" id="jahit_h<?=$no?>">
			<label class="label label-danger jahit_h<?=$no?> hideIt">Jahit Horizontal Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="fullness<?=$no?>">Fullness</label>
	  <div class="col-md-7">  
		<strong>
			<input type="number" min="0" class="form-control required fullness" placeholder="0" data-id="<?=$no?>" name="product_curtain[<?=$no?>][fullness]" id="fullness<?=$no?>">
			<label class="label label-danger fullness<?=$no?> hideIt">Fullness Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="qty_unit<?=$no?>">Qty Unit</label>
	  <div class="col-md-4"> 
		<strong>
			<div class="input-group">
				<input type="number" class="form-control required text-right qty_unit" data-id="<?=$no?>" placeholder="0" min="0" name="product_curtain[<?=$no?>][qty_unit]" id="qty_unit<?=$no?>">
				<span class="input-group-addon">Pcs</span>
			</div>
			<label class="label label-danger qty_unit<?=$no?> hideIt">Qty Unit Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="t_kain<?=$no?>">Total Kain</label>
	  <div class="col-md-4">  
		<strong>
		<div class="input-group">
			<input type="hidden" readonly class="form-control" placeholder="0" name="product_curtain[<?=$no?>][t_kain]" id="t_kain<?=$no?>">
			<input type="text" readonly class="form-control" placeholder="0" name="product_curtain[<?=$no?>][t_kain]" id="tot_kain<?=$no?>">
			<span class="input-group-addon">m</span>
		</div>
			<label class="label label-danger t_kain<?=$no?> hideIt">Total Kain Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
</div>

<!-- ========================= -->

<div class="col-md-6">
<br>
	

	<div class="form-group">
	  <label class="control-label col-sm-3" for="curtain<?=$no?>">Curtain Roll</label>
	  <div class="col-md-7">  
		<strong>
			<input type="number" readonly class="form-control" placeholder="0" min="0" name="product_curtain[<?=$no?>][curtain]" id="curtain<?=$no?>">
			<label class="label label-danger curtain<?=$no?> hideIt">Curtain Up Panel Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="disc_fab<?=$no?>">Diskon Fabric</label>
	  <div class="col-md-3"> 
		<strong>
			<div class="input-group">
				<input type="number" class="form-control required disc_fab" placeholder="0" min="0" data-id="<?=$no?>" name="product_curtain[<?=$no?>][disc_fab]" id="disc_fab<?=$no?>">
				<span class="input-group-addon">%</span>
			</div>	
		</strong>
	  </div>	
			<label class="label label-danger disc_fab<?=$no?> hideIt">Diskon Fabric Can't be empty!</label>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="mainten<?=$no?>">Maintenance</label>
	  <div class="col-md-3 col-sm-3"> 
		<strong>
			<label style="padding-left:20px"><input type="radio" data-id="<?=$no?>" checked class="pilihMainten" name="product_curtain[<?=$no?>][mainten]" value="no"><span style="margin-left:5px">No</span></label>
			<label style="margin-left:20px"><input type="radio" data-id="<?=$no?>" class="pilihMainten" name="product_curtain[<?=$no?>][mainten]" value="yes"><span style="margin-left:5px">Yes</span></label>
			<label class="label label-danger mainten<?=$no?> hideIt">Keterangan Can't be empty!</label>
		</strong>
	  </div>
	  <div class="col-md-3 col-xs-4">
		  <div class="input-group">
			<input type="number" readonly class="form-control disc_mnt text-right" placeholder="0" min="0" data-id="<?=$no?>" name="product_curtain[<?=$no?>][disc_mnt]" id="disc_mnt<?=$no?>">
			<span class="input-group-addon">%</span>
		  </div>
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="ex_comm<?=$no?>">External Commission</label>
	  <div class="col-md-7"> 
		<strong>
			<!--<input type="text" class="form-control required" name="product_curtain[<?=$no?>][ex_comm]" id="ex_comm<?=$no?>">
			<label class="label label-danger ex_comm<?=$no?> hideIt">External Commission Can't be empty!</label>
		-->
		<table class="table-condensed table-striped table-bordered" id="dtFee" width="100%">
			<thead>
				<tr>
					<td>PIC</td>
					<td width="25%" class="text-center">%</td>
					<td class="text-right">Value</td>
					<td class="text-right"></td>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
		<button type="button" class="btn btn-sm btn-primary" onclick="add_fee()">Add PIC</button>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="t_disc_fab<?=$no?>">Total Diskon</label>
	  <div class="col-md-6"> 
		<strong>
			<div class="input-group">
				<span class="input-group-addon">Rp.</span>
				<input type="text" class="form-control required text-right" readonly placeholder="0" min="0" name="product_curtain[<?=$no?>][t_disc_fab]" id="t_disc_fab<?=$no?>">
			</div>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="ket<?=$no?>">Keterangan</label>
	  <div class="col-md-7"> 
		<strong>
			<textarea type="text" class="form-control" placeholder="Keterangan"  name="product_curtain[<?=$no?>][ket]" id="ket<?=$no?>"></textarea>
			<label class="label label-danger ket<?=$no?> hideIt">Keterangan Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	<br>
</div>


<script>

	$(document).ready(function() {
      var table = $('#dtFee').DataTable({
		"paging"	: false,
		"searching"	: false,
		"lengthChange": false,
		"ordering"	: false,
		"info"		: false	
	  });
	  
	  $('#dtFee tbody').on( 'click', 'a.hapus', function () {
 
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
	  
	  
	  function add_fee()
		{
		  tujuan = siteurl+'quotation_proses/addFee';
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
				  url:siteurl+"quotation_proses/get_karyawan",
				  data:"id_kar="+list_mentah,
				  success:function(result){
					  var data = JSON.parse(result);
					  console.log(result);
						var dt = $('#dtFee').DataTable();
					  dt.rows().remove();
					  for (var i = 0; i < list_arr.length; i++) {
						 // console.log(data[i].id_product);
						dt.row.add([
						  data[list_arr[i]].nama_karyawan,
						  '<input type="number" style="width:100%" name="persen_['+data[list_arr[i]].id_karyawan+']" data-id="'+[list_arr[i]].id_karyawan+'" id="persen_'+data[list_arr[i]].id_karyawan+'" class="form-control input-sm numberOnly persen text-right" placeholder="0" maxLength="3" min="0" max="100">',
						  '<input type="text" style="width:100%" name="value_['+data[list_arr[i]].id_karyawan+']" data-id="'+[list_arr[i]].id_karyawan+'" id="value_'+data[list_arr[i]].id_karyawan+'"  class="form-control input-sm numberOnly nominal value text-right" placeholder="0">',
						  '<a class="text-red hapus" href="javascript:void(0)" title="Hapus Item"><i class="fa fa-times"></i></a><span class="numbering"></span>',
						]).draw(false);

					  };
				  }
			  });
		  }
		}
		
		$(document).on('input paste keyup','.persen',function(){
			var nilai = $(this).val();
				max = 100;
				if (nilai > max ){
					alert("input tidak boleh melebihi 100%");
					$(this).val('');
				}
		})
	  
</script>