<?php

if (!empty($this->uri->segment(3))) {
  $getC = $this->db->get_where('blind',array('id_blind'=>$id))->row();
}
if ($this->uri->segment(3) == 'view') {
  $view = 'style="display:block"';
}else {
  $mode = 'input';
}

?>
<form class="" id="form-blind" action="" method="post" enctype="multipart/form-data">
  <div class="box box-success">
	<div class="box-body" style="">
    <div class="row">
	  <div class="col-md-12">
	  <table class="table table-condensed">
		<thead>
			<tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
			  <th class="text-center" colspan='3'>DETAIL BLIND</th>
			</tr>
		</thead>
	  </table>
	  </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <table id="my-grid3" class="table table-striped table-bordered table-hover table-condensed" width="100%">
          <tbody>
            <tr id="my-grid-tr-id_blind">
              <td class="text-left vMid" width="40%">Code <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->id_blind:'-'?>
                </label>
                <label class="label_input">
                  <input type="hidden" name="type" value="<?=empty($getC->id_blind)?'add':'edit'?>">
                  <input type="text" class="form-control input required w20" name="id_blind" id="id_blind" value="<?= $getC->id_blind; empty($getC->id_blind)?'':$getC->id_blind?>" readonly>
                  <input type="text" class="form-control input required w20" maxlength="3" name="id_blind_2" id="id_blind_2" value="<?= $getC->id_blind_2; empty($getC->id_blind_2)?'':$getC->id_blind_2?>">
                  <input type="text" class="form-control input required w20" maxlength="3" name="id_blind_3" id="id_blind_3" value="<?= $getC->id_blind_3; empty($getC->id_blind_3)?'':$getC->id_blind_3?>">
                </label>
                  <label class="label label-danger id_blind hideIt">Code Can't be empty!</label>
                  <label class="label label-danger id_blind_2 hideIt">Code 2 Can't be empty!</label>
                  <label class="label label-danger id_blind_3 hideIt">Code 3 Can't be empty!</label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-name_blind">
              <td class="text-left vMid">Blind Name <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->name_blind:'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input required w90" name="name_blind" id="name_blind" placeholder="Blind Name" value="<?= $getC->name_blind; empty($getC->name_blind)?'':$getC->name_blind?>">
                  <label class="label label-danger name_blind hideIt">Blind Name Can't be empty!</label>
                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-supplier">
              <td class="text-left vMid">Supplier <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)? strtoupper($getC->id_supplier):'-'?>
                </label>
                <label class="label_input">
                  <select class="form-control required select2" name="supplier" id="supplier"></select>
                  <label class="label label-danger supplier hideIt">Supplier Can't be empty!</label>

                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-color">
              <td class="text-left vMid">Colour Code </b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->color_code:'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input w90" name="color" id="color" placeholder="Colour Code" value="<?= $getC->color_code; empty($getC->color_code)?'':$getC->color_code?>">
                  <label class="label label-danger color hideIt">Colour Code Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-fabric">
              <td class="text-left vMid">Fabric Code <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->fabric_code:'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input required w90" name="fabric" id="fabric" placeholder="Fabric Code" value="<?= $getC->fabric_code; empty(fabric_code)?'':$getC->fabric_code?>">
                  <label class="label label-danger fabric hideIt">Fabric Code Can't be empty!</label>
                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-width">
              <td class="text-left vMid">Lebar <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->width:'-'?>
                </label>
                <label class="label_input">
				<div class="w30">
				<div class="input-group">
                  <input type="number" min="0" class="form-control input required numberOnly text-right" name="width" id="width" placeholder="0" value="<?= $getC->width; empty($getC->width)?'':$getC->width?>">
				  <span class="input-group-addon" id="basic-addon1">m</span>
				</div>
				</div>
                  <label class="label label-danger width hideIt">Lebar Can't be empty!</label>
                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-height">
              <td class="text-left vMid">Tinggi <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->height:'-'?>
                </label>
                <label class="label_input">
				<div class="w30">
				<div class="input-group">
                  <input type="number" min="0" class="form-control input required numberOnly text-right" name="height" id="height" placeholder="0" value="<?= $getC->height; empty($getC->height)?'':$getC->height?>">
				  <span class="input-group-addon" id="basic-addon1">m</span>
				</div>
				</div>
                  <label class="label label-danger height hideIt">Tinggi Can't be empty!</label>
                </label>
              </td>
            </tr>
	
			<tr id="my-grid-tr-unit">
              <td class="text-left vMid">Unit Of Measurements <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)? strtoupper($getC->uom):'-'?>
                </label>
                <label class="label_input">
				  <input class="form-control required w20" readonly name="unit" value="m2">
                  <label class="label label-danger unit hideIt">Unit Can't be empty!</label>

                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-buy-price">
              <td class="text-left vMid">Buy Price <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  Rp. <?=($getC)?number_format($getC->buy_price):'-'?>
                </label>
                <label class="label_input">
					<div class="w90">
					<div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Rp</span>
					  <?= form_input(array('type'=>'text','min'=>'0','id'=>'buy-price','name'=>'buy-price','class'=>'form-control required text-right numberOnly nominal w50','placeholder'=>'0','autocomplete'=>'off','value'=>empty($getC->buy_price)?'':number_format($getC->buy_price)))?>
					 <span class="input-group-addon" id="basic-addon2">.00</span>
					 </div>
					</div>
					  <label class="label label-danger buy-price hideIt">Buy Price Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-selling-price">
              <td class="text-left vMid">Selling Price <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  Rp. <?=($getC)?number_format($getC->sale_price):'-'?>
                </label>
                <label class="label_input">
					<div class="w90">
					<div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Rp</span>
					  <?= form_input(array('type'=>'text','min'=>'0','id'=>'selling-price','name'=>'selling-price','class'=>'form-control required text-right numberOnly nominal w50','placeholder'=>'0','autocomplete'=>'off','value'=>empty($getC->sale_price)?'':number_format($getC->sale_price)))?>
					 <span class="input-group-addon" id="basic-addon2">.00</span>
					 </div>
					</div>
					  <label class="label label-danger selling-price hideIt">Selling Price Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-image">
              <td class="text-left vMid">Image <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC->images) != ''?'<img src='.'./assets/img/blind/'.$getC->images.' width="100px">':'-'?>
                </label>
                <label class="label_input">
				  <input type="file" id="image" name="image" class="form-control hidden input-sm required w50" onchange ="tampilkanPreview(this,'preview')">

                  <label class="label label-danger image hideIt">Name Card Can't be empty!</label>
				  <?=($getC->images) != ''?'<img id="preview" src='.'./assets/img/blind/'.$getC->images.' width="100px">':'<img id="preview" width="100px" src='.'./assets/img/blind/noimage.jpg>';?>
                  <input type="hidden" name="filelama" id="filelama" class="form-control" value="<?= ($getC)?$getC->images:''?>">
                </label>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
	  
	  <div class="col-md-6">
		<table id="my-grid4" class="table table-striped table-bordered table-hover table-condensed" width="100%">
			<tbody>
			
				<tr id="my-grid-tr-jenis">
				  <td class="text-left vMid">Type  </b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->type:'-'?>
					</label>
					<label class="label_input">
					  <label>
						<input type="radio" name="jenis" value="manual" <?=($getC->type == 'manual')?'checked':''?>> Manual
					  </label>
					  <label>
						<input type="radio" name="jenis" value="motorized" <?=($getC->type == 'motorized')?'checked':''?> style="margin-left:20px"> Motorized
					  </label>
					  <label class="label label-danger jenis hideIt">Type Can't be empty!</label>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-sistem">
				  <td class="text-left vMid">System  </b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->sistem:'-'?>
					</label>
					<label class="label_input">
					  <input type="text" class="form-control input w90" name="sistem" id="sistem" placeholder="System" value="<?= $getC->sistem; empty($getC->sistem)?'':$getC->sistem?>">
					  <label class="label label-danger sistem hideIt">System Can't be empty!</label>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-min_width">
				  <td class="text-left vMid">Min Lebar</b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->min_width:'-'?>
					</label>
					<label class="label_input">
						<div class="w30">
						<div class="input-group">
							<input type="number" min="0" class="form-control input text-right" name="min_width" id="min_width" placeholder="0" value="<?= $getC->min_width; empty($getC->min_width)?'':$getC->min_width?>">
							<label class="label label-danger min_width hideIt">Min Lebar Can't be empty!</label>
							<span class="input-group-addon" id="basic-addon1">m</span>
						</div>
						</div>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-max_width">
				  <td class="text-left vMid">Max Lebar</b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->max_width:'-'?>
					</label>
					<label class="label_input">
						<div class="w30">
						<div class="input-group">
							<input type="number"  min="0" class="form-control input text-right" name="max_width" id="max_width" placeholder="0" value="<?= $getC->max_width; empty($getC->max_width)?'':$getC->max_width?>">
							<label class="label label-danger max_width hideIt">Max Lebar Can't be empty!</label>
							<span class="input-group-addon" id="basic-addon1">m</span>
						</div>
						</div>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-min_height">
				  <td class="text-left vMid">Min Tinggi</b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->min_height:'-'?>
					</label>
					<label class="label_input">
						<div class="w30">
						<div class="input-group">
							<input type="number"  min="0" class="form-control input text-right" name="min_height" id="min_height" placeholder="0" value="<?= $getC->min_height; empty($getC->min_height)?'':$getC->min_height?>">
							<label class="label label-danger min_height hideIt">Min Tinggi  Can't be empty!</label>
							<span class="input-group-addon" id="basic-addon1">m</span>
						</div>
						</div>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-max_height">
				  <td class="text-left vMid">Max Tinggi</b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->max_height:'-'?>
					</label>
					<label class="label_input">
						<div class="w30">
						<div class="input-group">
							<input type="number" min="0" class="form-control input text-right" name="max_height" id="max_height" placeholder="0" value="<?= $getC->max_height; empty($getC->max_height)?'':$getC->name_blind?>">
							<label class="label label-danger max_height hideIt">Max Tinggi Can't be empty!</label>
							<span class="input-group-addon" id="basic-addon1">m</span>
						</div>
						</div>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-height_chain">
				  <td class="text-left vMid">Tinggi Chain</b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->height_chain:'-'?>
					</label>
					<label class="label_input">
					  <input type="number" min="0" class="form-control input w30 text-right" name="height_chain" id="height_chain" placeholder="0" value="<?= $getC->height_chain; empty($getC->height_chain)?'':$getC->height_chain?>">
					  <label class="label label-danger height_chain hideIt">Tinggi Chain Can't be empty!</label>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-posisi">
				  <td class="text-left vMid">Posisi Chain</b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->position_chain:'-'?>
					</label>
					<label class="label_input">
					  <select class="form-control input w90 select2" name="posisi" id="posisi">
						<option value="kanan" <?=($getC->position_chain == 'kanan')?'selected':''?>>Kanan</option>
						<option value="kiri" <?=($getC->position_chain == 'kiri')?'selected':''?>>Kiri</option>
					  </select>
					  <label class="label label-danger posisi hideIt">Posisi Chain Can't be empty!</label>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-leadtime">
				  <td class="text-left vMid">Leadtime Pengerjaan<span class='text-red'>*</span></b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->leadtime:'-'?>
					</label>
					<label class="label_input">
						<div class="w40">
						<div class="input-group">
						  <input type="number"  min="0" class="form-control input required text-right" name="leadtime" id="leadtime" placeholder="0" value="<?= $getC->leadtime; empty($getC->leadtime)?'':$getC->leadtime?>">
						  <span class="input-group-addon" id="basic-addon1">menit</span>
						</div>
						</div>
						  <label class="label label-danger leadtime hideIt">Leadtime Pengerjaan Can't be empty!</label>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-installation">
				  <td class="text-left vMid">Jml Teknisi Pemasangan</b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->installation:'-'?>
					</label>
					<label class="label_input">
						<div class="w40">
						<div class="input-group">
							<input type="number" min="0" class="form-control input text-right" name="installation" id="installation" placeholder="0" value="<?= $getC->installation; empty($getC->installation)?'':$getC->installation?>">
							<label class="label label-danger installation hideIt">Jml Teknisi Pemasangan Can't be empty!</label>
							<span class="input-group-addon" id="basic-addon1">Orang</span>
						</div>
						</div>
					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-status">
				  <td class="text-left vMid">Status <span class='text-red'>*</span></b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC->status == '0')?'<span class="badge bg-blue">Aktif</span>':'<span class="badge bg-red">Non Aktif</span>'?>
					</label>
					<label class="label_input">
					  <select class="form-control required select2" name="status" id="status">
						<option value="0" <?= $getC->status == '0'? 'selected':''?> >Aktif</option>
						<option value="1" <?= $getC->status == '1'? 'selected':''?>>Non Aktif </option>
					  </select>
					  <label class="label label-danger status hideIt">Status Can't be empty!</label>

					</label>
				  </td>
				</tr>
				
				<tr id="my-grid-tr-description">
				  <td class="text-left vMid">Remark </b></td>
				  <td class="text-left">
					<label class="label_view">
					  <?=($getC)?$getC->remark:'-'?>
					</label>
					<label class="label_input">
						<textarea type="text" id="descrip" name="descrip" class="form-control w90" placeholder="Remark" autocomplete="off"><?=empty($getC->remark)?'':$getC->remark?></textarea>
						<label class="label label-danger descrip hideIt">Notes Can't be empty!</label>

					</label>
				  </td>
				</tr>
				
			</tbody>
		</table>
		
	  <div>
      </div>
    </div>

		<?php
			echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success label_input','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'saveBlind')).' ';
		?>
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
function tampilkanPreview(gambar,idpreview){
  var gb = gambar.files;
  for (var i = 0; i < gb.length; i++){
	  var gbPreview = gb[i];
	  var imageType = /image.*/;
	  var preview=document.getElementById(idpreview);            
	  var reader = new FileReader();
	  
	  if (gbPreview.type.match(imageType)) {
		  preview.file = gbPreview;
		  reader.onload = (function(element) { 
			  return function(e) { 
				  element.src = e.target.result; 
			  }; 
		  })(preview);
		  reader.readAsDataURL(gbPreview);
	  }else{
		  reader.onload = (function(element) { 
			  return function(e) { 
				  // element.src = "../../../../images/avatar.png"; 
			  }; 
		  })(preview);
		  reader.readAsDataURL(gbPreview);
		  const Toast = Swal.mixin({
			toast: true,
			position: 'top',
			showConfirmButton: false,
			timer: 5000,
			onOpen: (toast) => {
			  toast.addEventListener('mouseenter', Swal.stopTimer)
			  toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		  })

		  Toast.fire({
			icon: 'error',
			title: 'Type file tidak sesuai. Khusus file gambar.'
		  })
		  $('#gambar').val('');
		  return false;
	  }
	 
  }    
}
  
	var id = $('#id_blind').val();
      if (id == '') {
        $.ajax({
          url: siteurl+active_controller+"getID",
          dataType : "json",
          type: 'POST',
          data: {id:'RO'},
          success: function(result){
            $('#id_blind').val(result.id);
          },
          error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      }
	  
	  if('<?= $getC->size_1 != '' && $getC->size_2 != '' ?>'){
		  $('#my-grid-tr-size').prop('hidden', false);
	  }
	  // else {
        // swal({
          // title: "Warning!",
          // text: "Complete Accomodation name first, please!",
          // type: "warning",
          // timer: 3500,
          // showConfirmButton: false
        // });
      // }

	$(document).ready(function(){
		getSupplier();
		getUOM();
		
    $(".datepicker").datepicker({
        format : "yyyy-mm-dd",
        showInputs: true,
        autoclose:true
    });
	
    $(".select2").select2({
      placeholder: "Choose An Option",
      allowClear: true,
	  width: '90%',
      dropdownParent: $("#form-blind")
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

    $(document).on('click change keyup paste blur', '#form-blind .form-control', function(e){
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

	
    if ('<?= $this->uri->segment(3) ?>' == 'view') {
      $('.label_view').css("display","block");
      $('.label_input').css("display","none");
    }else {
      $('.label_view').css("display","none");
      $('.label_input').css("display","block");
    }
    console.log('<?= $this->uri->segment(3) ?>');
	});
  
  
  function getSupplier() {
    if ('<?=($getC->id_supplier)?>' != null) {
      var id_selected = '<?=$getC->id_supplier?>';
    }else if ($('#id_supplier').val() != null || $('#id_supplier').val() != '') {
      var id_selected = $('#id_supplier').val();
    }else {
      var id_selected = '';
    }
    var column = '';
    var column_fill = '';
    var column_name = 'nm_supplier_office';
    var table_name = 'master_supplier';
    var key = 'id_supplier';
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
        $('#supplier').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  
  function getUOM() {
    if ('<?=($getC->uom)?>' != null) {
      var id_selected = '<?=$getC->uom?>';
    }else if ($('#unit').val() != null || $('#unit').val() != '') {
      var id_selected = $('#unit').val();
    }else {
      var id_selected = '';
    }
    var column = '';
    var column_fill = '';
    var column_name = 'name_uom';
    var table_name = 'master_uom';
    var key = 'id_uom';
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
        $('#unit').html(result.html);
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
              scrollTop: $("#form-blind").offset().top
          }, 2000);
          count = count+1;
        }

      }
      else if ((node == 'INPUT' && type == 'text') || (node == 'SELECT') || (node == 'INPUT' && type == 'number')) {
        if ($(this).val() == null || $(this).val() == '') {
          var name = $(this).attr('id');

          name.replace('[]','');
          $('.'+name).removeClass('hideIt');
          $('.'+name).css('display','inline-block');
          $('html, body, .modal').animate({
              scrollTop: $("#form-blind").offset().top
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
</script>
