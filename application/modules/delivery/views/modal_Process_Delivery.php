<?php

if (!empty($this->uri->segment(3))) {
	
  // $getC             = $this->db->get_where('master_supplier',array('id_supplier'=>$id))->row();
  $getC             = $this->db->get_where('delivery',array('id_delivery'=>$id))->row();
  $name_kota     	= $this->db->get_where('kabupaten',array('id_kab'=>$getC->id_kabupaten))->row();
  $name_provinsi    = $this->db->get_where('provinsi',array('id_prov'=>$getC->id_provinsi))->row();
  $cost       		= $this->db->get_where('delivery_cost',array('id_delivery'=>$getC->id_delivery))->result();
  // $name_procat      = $this->db->get_where('master_product_category',array('id_category'=>$getC->id_category))->row();
  // $name_buscat      = $this->db->get_where('child_supplier_business_category',array('id_business'=>$getC->id_business))->row();
  // $name_supcap      = $this->db->get_where('child_supplier_capacity',array('id_capacity'=>$getC->id_capacity))->row();
  // $name_toq         = $this->db->get_where('child_supplier_toq',array('id_toq'=>$getC->id_toq))->row();
  // $getSP		        = $this->db->get_where('child_supplier_pic',array('id_supplier'=>$id))->result();
  // $getSB		        = $this->db->get_where('child_supplier_bank',array('id_supplier'=>$id))->result();
  //$getB     = $this->db->get_where('master_product_brand',array('id_supplier'=>$id))->result();
}
if ($this->uri->segment(4) == 'view') {
  $view = 'style="display:block"';
}else {
  $mode = 'input';
}

?>
<form class="" id="form-supplier" action="" method="post" enctype="multipart/form-data">
  <div class="box box-success">
	<div class="box-body" style="">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <table id="my-grid3" class="table table-striped table-bordered table-hover table-condensed" width="100%">
          <tbody>
            <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
              <th class="text-center" colspan='3'>DETAIL DELIVERY COST</th>
            </tr>
            <tr id="my-grid-tr-id_delivery">
              <td class="text-left vMid" width="20%">Code <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->id_delivery:'-'?>
                </label>
                <label class="label_input">
                  <input type="hidden" name="type" value="<?=empty($getC->id_delivery)?'add':'edit'?>">
                  <input type="text" class="form-control input input-sm required w50" name="id_delivery" id="id_delivery" value="<?= $getC->id_delivery; empty($getC->id_delivery)?'':$getC->id_delivery?>" readonly>
                  <label class="label label-danger id_delivery hideIt">Code Can't be empty!</label>

                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-id_provinsi">
              <td class="text-left vMid">Provinsi <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$name_provinsi->nama:'-'?>
                </label>
                <label class="label_input">
                  <select class="form-control input-sm required select2 w50" name="id_provinsi" id="id_provinsi">
                  </select>
                  <label class="label label-danger id_provinsi hideIt">Provinsi Can't be empty!</label>

                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-id_kota">
              <td class="text-left vMid">City <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$name_kota->nama:'-'?>
                </label>
                <label class="label_input">
                  <select class="form-control input-sm required select2 w50" name="id_kota" id="id_kota">
                  </select>
                  <label class="label label-danger id_kota hideIt">City Can't be empty!</label>

                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-via">
              <td class="text-left vMid">Via <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->activation:'-'?>
                </label>
                <label class="label_input w70">
                  <select class="form-control required select2" name="via" id="via">
                    <option value="udara">Udara</option>
                    <option value="darat & laut">Darat & Laut</option>
                  </select>
                  <label class="label label-danger via hideIt">Via Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-supplier">
              <td class="text-left vMid">Supplier <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->supplier:'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input input-sm required w60" name="supplier" id="supplier" placeholder="Supplier" value="<?= $getC->supplier; empty($getC->supplier)?'':$getC->supplier?>">
                  <label class="label label-danger supplier hideIt">Supplier Can't be empty!</label>
                </label>
              </td>
            </tr>

            <tr id="my-grid-tr-weights">
              <td class="text-left vMid">Weight <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
				<div id="cost" class="">
					<table class="table-condensed" width="40%">
						<thead>
						<tr>
							<th>Criteria</th>
							<th>To Weight</th>
							<th>Item Cost</th>
						</tr>
						</thead>
					<tbody id="data_cost">
						 <tbody>
						 <?php foreach($cost as $c): ?>
							<tr>
								<td class="text-center"><?= $c->weight_1 ?></td>
								<td class="text-center"><?= $c->weight_2 ?></td>
								<td class="text-right"><?= number_format($c->item_cost) ?></td>
							</tr>
						<?php endforeach ?>
						 </tbody>
					</tbody>
					</table>
				</div>
                  
                </label>
				
              </td>
            </tr>
			
			<tr id="my-grid-tr-duration">
              <td class="text-left vMid">Duration <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->duration:'-'?>
                </label>
                <label class="label_input">
				<?= form_input(array('type'=>'text','id'=>'duration','name'=>'duration','class'=>'form-control required input-sm w50','placeholder'=>'1-2 Days','autocomplete'=>'off','value'=>empty($getC->duration)?'':$getC->duration))?>
                  <label class="label label-danger duration hideIt">Duration Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-package">
              <td class="text-left vMid">Package <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->status:'-'?>
                </label>
                <label class="label_input w70">
                  <select class="form-control required select2" name="package" id="package">
                    <option value="reguler">Reguler</option>
                    <option value="express">Express</option>
                  </select>
                  <label class="label label-danger package hideIt">Package Can't be empty!</label>

                </label>
              </td>
            </tr>

            <tr id="my-grid-tr-description">
              <td class="text-left vMid">Description </b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->description:'-'?>
                </label>
                <label class="label_input">
                  <?php
                  echo form_textarea(array('type'=>'text','id'=>'descrip','name'=>'descrip','class'=>'form-control input-sm w50', 'placeholder'=>'Description','autocomplete'=>'off','value'=>empty($getC->description)?'':$getC->description))
                  ?>
                  <label class="label label-danger descrip hideIt">Description Can't be empty!</label>

                </label>
              </td>
            </tr>

            <tr id="my-grid-tr-activation">
              <td class="text-left vMid">Status <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->activation:'-'?>
                </label>
                <label class="label_input w70">
                  <select class="form-control required select2" name="activation" id="activation">
                    <option value="aktif">Active</option>
                    <option value="nonaktif">Inactive</option>
                  </select>
                  <label class="label label-danger activation hideIt">Status Can't be empty!</label>

                </label>
              </td>
            </tr>

          </tbody>
        </table>
       
      </div>
    </div>

		<?php
			echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success label_input','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'saveDelivery')).' ';
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
$(document).ready(function(){
	$(document).on('click','#addCost',function(e){
		e.preventDefault();
		var nomor = 1;
		var valuex	= $('#data_cost').find('tr').length;
		if(valuex > 0){
			var akhir	= $('#data_cost tr:last').attr('id');
			var det_id	= akhir.split('_');
			var nomor	= parseInt(det_id[1])+1;
		}
		$('#data_cost').append(
		'<tr id="cost_'+nomor+'" >'+
			'<td><input class="form-control required input-sm text-right numberOnly nominal" name="cost['+nomor+'][weight1]" id="weight1_'+nomor+'" placeholder="0" autocomplete="off"></td>'+
			'<td><input class="form-control required input-sm text-right numberOnly nominal" name="cost['+nomor+'][weight2]" id="weight2_'+nomor+'" placeholder="0" autocomplete="off"></td>'+
			'<td><input class="form-control required input-sm text-right numberOnly nominal" name="cost['+nomor+'][item_cost]" id="item_cost_'+nomor+'" placeholder="0" autocomplete="off"></td>'+
			'<td><button type="button" onclick="delRow_Liner('+nomor+')" class="btn btn-xs btn-danger"><i class="fa fa-close"></i></button></td>'+
		'</tr>'+
		'  <label class="label label-danger weight1_'+nomor+' hideIt">Weight 1 Can\'t be empty!</label>'+
		'  <label class="label label-danger weight2_'+nomor+' hideIt">Weight 2 Can\'t be empty!</label>'+
		'  <label class="label label-danger item_cost_'+nomor+' hideIt">Item Cost Can\'t be empty!</label>'+
		'</label>'
		);
		
		console.log(valuex);
	});
	
	
	$(document).on('click','#next_cost',function(){
		$('#next_cost_input').removeClass('hidden');
	})
	
	
})
	function delRow_Liner(row){
		$('tr#cost_'+row).remove();
		// row = 0;
	
	}
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

    // getCountry();
	// getCategory();
	getProvinsi();
    // getSupplierType();
    // getBrand();
    // getToq();
    $(".datepicker").datepicker({
        format : "yyyy-mm-dd",
        showInputs: true,
        autoclose:true
    });
    $(".select2").select2({
      placeholder: "Choose An Option",
      allowClear: true,
      width: '60%',
      dropdownParent: $("#form-supplier")
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
    $(document).on('click change keyup paste blur', '#form-supplier .form-control', function(e){
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
    if ('<?php $getC->id_provinsi ?>' != null) {
		id_prov = '<?php $getC->id_provinsi ?>';
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

	function getProvinsi() {
    if ('<?=($getC->id_provinsi)?>' != null) {
      var id_selected = '<?=$getC->id_provinsi?>';
    }else if ($('#id_provinsi').val() != null || $('#id_provinsi').val() != '') {
      var id_selected = $('#id_provinsi').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = 'id_prov';
    var column_fill = '';
    var column_name = 'nama';
    var table_name = 'provinsi';
    var key = 'id_prov';
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
        $('#id_provinsi').html(result.html);
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
  function getBrand() {
    var id_brand    = <?php echo json_encode(explode(";",$getC->id_brand) );?>;
    var id_selected = 'multiple';
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_brand';
    var table_name = 'master_product_brand';
    var key = 'id_brand';
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
        $('#id_brand').html(result.html);
        $('#id_brand').val(id_brand);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  // function getProCat() {
    // if ('<?=($getC->id_category)?>' != null) {
      // var id_selected = '<?=$getC->id_category?>';
    // }else if ($('#id_category').val() != null || $('#id_category').val() != '') {
      // var id_selected = $('#id_category').val();
    // }else {
      // var id_selected = '';
    // }
    // var column = 'supplier_shipping';
    // var column_fill = $("input[name='supplier_shipping']:checked").val();
    // var column_name = 'name_category';
    // var table_name = 'master_product_category';
    // var key = 'id_category';
    // var act = 'free';
    // $.ajax({
      // url: siteurl+active_controller+"getOpt",
      // dataType : "json",
      // type: 'POST',
      // data: {
        // id_selected:id_selected,
        // column:column,
        // column_fill:column_fill,
        // column_name:column_name,
        // table_name:table_name,
        // key:key,
        // act:act
      // },
      // success: function(result){
        // $('#id_category').html(result.html);
      // },
      // error: function (request, error) {
        // console.log(arguments);
        // alert(" Can't do because: " + error);
      // }
    // });
    // sel2();
  // }
  function getBusCat() {
    if ('<?=($getC->id_business)?>' != null) {
      var id_selected = '<?=$getC->id_business?>';
    }else if ($('#id_business').val() != null || $('#id_business').val() != '') {
      var id_selected = $('#id_business').val();
    }else {
      var id_selected = '';
    }
    var column = 'id_type';
    var column_fill = $("#id_type").val();
    var column_name = 'name_business';
    var table_name = 'child_supplier_business_category';
    var key = 'id_business';
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
        $('#id_business').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  function getSupCap() {
    var id_capacity    = <?php echo json_encode(explode(";",$getC->id_capacity) );?>;
    var id_selected = 'multiple';
    //console.log(id_selected);
    var column = 'id_business';
    var column_fill = $('#id_business').val();
    var column_name = 'name_capacity';
    var table_name = 'child_supplier_capacity';
    var key = 'id_capacity';
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
        $('#id_capacity').html(result.html);
        $('#id_capacity').val(id_capacity);
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
              scrollTop: $("#form-supplier").offset().top
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
              scrollTop: $("#form-supplier").offset().top
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
  function getSupplierTypeX() {
    var id_type = $('#id_type').val();
    var supplier_shipping = $('#supplier_shipping').val();
    $.ajax({
      url: siteurl+active_controller+"getSupplierTypeOpt",
      dataType : "json",
      type: 'POST',
      data: {id_type:id_type},
      success: function(result){
        $('#id_type').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
  }
  function getCountryX() {
    var id_country = $('#id_country').val();
    $.ajax({
      url: siteurl+active_controller+"getCountryOpt",
      dataType : "json",
      type: 'POST',
      data: {id_country:id_country},
      success: function(result){
        $('#id_country').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
  }
  function getBusinessCatX(id_business=null) {
    var id_type = $('#id_type').val();
    //var supplier_shipping = $('#supplier_shipping').val();
    $.ajax({
      url: siteurl+active_controller+"getBusinessCatOpt",
      dataType : "json",
      type: 'POST',
      data: {id_type:id_type,id_business:id_business},
      success: function(result){
        $('#id_business').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
  }
  function getSupplierCapX(id_capacity=null) {
    var id_business = $('#id_business').val();
    $.ajax({
      url: siteurl+active_controller+"getSupplierCapOpt",
      dataType : "json",
      type: 'POST',
      data: {id_capacity:id_capacity,id_business:id_business},
      success: function(result){
        $('#id_capacity').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
  }
  function getRefreshBrand() {
    var id_brand = $('#id_brand').val();
    if ('<?=($getC->id_brand)?>' != null) {
      var id_brand = '<?=$getC->id_brand?>';
    }else if ($('#id_brand').val() != null || $('#id_brand').val() != '') {
      var id_brand = $('#id_brand').val();
    }else {
      var id_brand = '';
    }
    console.log(id_brand);
    $.ajax({
      url: siteurl+active_controller+"getRefreshBrand",
      dataType : "json",
      type: 'POST',
      data: {id: '<?=$id?>',idb:id_brand},
      success: function(result){
        $('#tableselBrand_tbody').empty();
        $('#tableselBrand_tbody').append(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
  }
  function getRefreshProCat() {
    //var id_category = $('#id_category').val();
    var val = $("input[name='supplier_shipping']:checked").val();
    $.ajax({
      url: siteurl+active_controller+"getProductCatOpt",
      dataType : "json",
      type: 'POST',
      data: {id_category:'',supplier_shipping:val},
      success: function(result){
        $('#id_category').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    //getSupplierType();
    //getBusinessCat('<?=empty($getC->id_business)?"":$getC->id_business?>');
    //getSupplierCap('<?=empty($getC->id_capacity)?"":$getC->id_capacity?>');
  }
  */
</script>
