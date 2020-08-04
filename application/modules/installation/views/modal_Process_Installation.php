<?php

if (!empty($this->uri->segment(3))) {
	
  $getC = $this->db->get_where('installation',array('id_install'=>$id))->row();
}
if ($this->uri->segment(4) == 'view') {
  $view = 'style="display:block"';
}else {
  $mode = 'input';
}

?>
<form class="" id="form-installation" method="post" enctype="multipart/form-data">
  <div class="box box-success">
	<div class="box-body" style="">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <table id="my-grid3" class="table table-striped table-bordered table-hover table-condensed" width="100%">
          <tbody>
            <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
              <th class="text-center" colspan='3'>DETAIL INSTALLATION COST</th>
            </tr>
            <tr id="my-grid-tr-code">
              <td class="text-left vMid" width="30%">Code <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->id_install:'-'?>
                </label>
                <label class="label_input">
                  <input type="hidden" name="type" value="<?=empty($getC->id_install)?'add':'edit'?>">
                  <input type="text" class="form-control input input-sm required w50" name="code" id="code" value="<?= $getC->id_install; empty($getC->id_install)?'':$getC->id_install?>" readonly>
                  <label class="label label-danger code hideIt">Code Can't be empty!</label>

                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-name">
              <td class="text-left vMid">Installation Name <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)? strtoupper($getC->nm_install):'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input input-sm required w70" name="nm_install" id="nm_install" placeholder="Installation Name" value="<?= $getC->nm_install; empty($getC->nm_install)?'':$getC->nm_install?>">
                  <label class="label label-danger nm_install hideIt">Installation Name Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-time">
              <td class="text-left vMid">Time <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->time_lead:'-'?>
                </label> 
                <label class="label_input">
				  <div class="w40">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>	
						  <input type="text" class="form-control input input-sm numberOnly required w60" name="time" id="time" placeholder="Time" value="<?= $getC->time_lead; empty($getC->time_lead)?'':$getC->time_lead?>">
						  <span class="input-group-addon" id="basic-addon2">Minutes</span>
					 </div>
					<div>
				  <label class="label label-danger time hideIt">Time Can't be empty!</label>
                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-qty_man">
              <td class="text-left vMid">Qty Man <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->qty_man:'-'?>
                </label>
                <label class="label_input">
				  <div class="w40">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>	
						 <input type="text" class="form-control input input-sm numberOnly required w60" name="qty_man" id="qty_man" placeholder="Qty Man" value="<?= $getC->qty_man; empty($getC->qty_man)?'':$getC->qty_man?>">
						<span class="input-group-addon" id="basic-addon2">Man</span>
					 </div>
					<div>
				  <label class="label label-danger qty_man hideIt">Qty Man Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-cost">
              <td class="text-left vMid">Item Cost <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  Rp. <?=($getC)?number_format($getC->item_cost):'-'?>
                </label>
                <label class="label_input">
					<div class="w60">
					<div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Rp</span>
					  <?= form_input(array('type'=>'text','id'=>'cost','name'=>'cost','class'=>'form-control required input-sm text-right numberOnly nominal w50','placeholder'=>'0','autocomplete'=>'off','value'=>empty($getC->item_cost)?'':number_format($getC->item_cost)))?>
					 <span class="input-group-addon" id="basic-addon2">.00</span>
					 </div>
					<div>
					  <label class="label label-danger cost hideIt">Item Cost Can't be empty!</label>
                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-descrip">
              <td class="text-left vMid">Description </b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->description:'-'?>
                </label>
                <label class="label_input">
				  <textarea type="text" id="descrip" name="descrip" class="form-control input-sm w80" placeholder="Description" autocomplete="off"><?= empty($getC->description)?'':$getC->description; ?></textarea>
                  <label class="label label-danger descrip hideIt">Description Can't be empty!</label>

                </label>
              </td>
            </tr>
			
          </tbody>
        </table>
       
      </div>
    </div>

		<?php
			echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success label_input','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'saveSewing')).' ';
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
  
	var id = $('#code').val();
      if (id == '') {
        $.ajax({
          url: siteurl+active_controller+"getID",
          dataType : "json",
          type: 'POST',
          data: {id:'IN'},
          success: function(result){
            $('#code').val(result.id);
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
      dropdownParent: $("#form-installation")
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

    $(document).on('click change keyup paste blur', '#form-installation .form-control', function(e){
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
	
    $(document).on('change', '#unit', function(e){
      var val = $(this).val();
      // alert(val);        
      if (val == 'pcs') {
		  $('#my-grid-tr-size').prop('hidden', false);
		  $('#my-grid-tr-model').prop('hidden', true);
		  $('#size_1, #size_2').addClass('required');
		  $('#model').removeClass('required');
      }else if (val == 'm') {
        $('#my-grid-tr-size').prop('hidden', true);
        $('#size_1, #size_2').removeClass('required');        
		$('#my-grid-tr-model').prop('hidden', false);
        $('#model').addClass('required');
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
              scrollTop: $("#form-installation").offset().top
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
              scrollTop: $("#form-installation").offset().top
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
