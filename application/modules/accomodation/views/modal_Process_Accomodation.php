<?php

if (!empty($this->uri->segment(3))) {
	
  // $getC             = $this->db->get_where('master_supplier',array('id_supplier'=>$id))->row();
  $getC             = $this->db->get_where('accomodation',array('id_accomodation'=>$id))->row();
  $name_category     = $this->db->get_where('category',array('id_categori'=>$getC->category_id))->row();
  $name_type        = $this->db->get_where('child_supplier_type',array('id_type'=>$getC->id_type))->row();
  $name_brand       = $this->db->where_in('id_brand',explode(";",$getC->id_brand))->get('master_product_brand')->result();
  $name_procat      = $this->db->get_where('master_product_category',array('id_category'=>$getC->id_category))->row();
  $name_buscat      = $this->db->get_where('child_supplier_business_category',array('id_business'=>$getC->id_business))->row();
  $name_supcap      = $this->db->get_where('child_supplier_capacity',array('id_capacity'=>$getC->id_capacity))->row();
  $name_toq         = $this->db->get_where('child_supplier_toq',array('id_toq'=>$getC->id_toq))->row();
  $getSP		        = $this->db->get_where('child_supplier_pic',array('id_supplier'=>$id))->result();
  $getSB		        = $this->db->get_where('child_supplier_bank',array('id_supplier'=>$id))->result();
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
              <th class="text-center" colspan='3'>DETAIL ACCOMODATION</th>
            </tr>
            <tr id="my-grid-tr-id_accomodation">
              <td class="text-left vMid">Code <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->id_accomodation:'-'?>
                </label>
                <label class="label_input">
                  <input type="hidden" name="type" value="<?=empty($getC->id_accomodation)?'add':'edit'?>">
                  <input type="text" class="form-control input input-sm required w50" name="id_accomodation" id="id_accomodation" value="<?= $getC->id_accomodation; empty($getC->id_accomodation)?'':$getC->id_accomodation?>" readonly>
                  <label class="label label-danger id_accomodation hideIt">Code Can't be empty!</label>

                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-id_category">
              <td class="text-left vMid">Catgory <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$name_category->nm_categori:'-'?>
                </label>
                <label class="label_input">
                  <select class="form-control input-sm required select2 w50" name="id_category" id="id_category">
                  </select>
                  <label class="label label-danger id_category hideIt">Category Can't be empty!</label>

                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-detail">
              <td class="text-left vMid">Detail <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->detail:'-'?>
                </label>
                <label class="label_input">
                  <?php
                  echo form_input(array('type'=>'text','id'=>'detail','name'=>'detail','class'=>'form-control input-sm required w70', 'placeholder'=>'Detail','autocomplete'=>'off','value'=>empty($getC->detail)?'':$getC->detail))
                  ?>
                  <!--<a id="generate_id" class="btn btn-sm btn-primary" style="display:inline-block">Generate ID</a>-->
                  <label class="label label-danger detail hideIt">Detail Name Can't be empty!</label>

                </label>
              </td>
            </tr>

            <tr id="my-grid-tr-item_cost">
              <td class="text-left vMid">Item Cost <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->item_cost:'-'?>
                </label>
                <label class="label_input">
					<div class="w50">
					<div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Rp</span>
					  <?= form_input(array('type'=>'text','id'=>'item_cost','name'=>'item_cost','class'=>'form-control required input-sm text-right numberOnly nominal w50','placeholder'=>'0','autocomplete'=>'off','value'=>empty($getC->item_cost)?'':number_format($getC->item_cost)))?>
					 <span class="input-group-addon" id="basic-addon2">.00</span>
					 </div>
					<div>
					  <label class="label label-danger item_cost hideIt">Detail Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-unit">
              <td class="text-left vMid">Qty <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->unit:'-'?>
                </label>
                <label class="label_input">
                  <?php
                  echo form_input(array('type'=>'text','id'=>'unit','name'=>'unit','class'=>'form-control required input-sm w50', 'placeholder'=>'Qty','autocomplete'=>'off','value'=>empty($getC->unit)?'':$getC->unit))
                  ?>
                  <label class="label label-danger unit hideIt">Qty Can't be empty!</label>

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
			echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success label_input','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'addSupplierSave')).' ';
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
	var id = $('#id_accomodation').val();
      if (id == '') {
        $.ajax({
          url: siteurl+active_controller+"getID",
          dataType : "json",
          type: 'POST',
          data: {id:'AC'},
          success: function(result){
            $('#id_accomodation').val(result.id);
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
	getCategory() 
    getSupplierType();
    getBrand();
    getToq();
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
    //ADD LIST BUTTON
    $('#addPIC').click(function(e){
      var x = parseInt(document.getElementById("tfoot-pic").rows.length)+1;
      //console.log(x);
      var row = '<tr class="addjs">'+
            '<td style="background-color:#E0E0E0">'+
            '<a class="text-red hapus_item_js" href="javascript:void(0)" title="Delete List"><i class="fa fa-times"></i></a> || <span class="numbering">'+
            x+'</span> '+
            '<input type="text" name="pic[]"  class="form-control input-sm " required="" placeholder="Input PIC Name" style="width:75%;text-align:center;display:inline-block">'+
						/*'<select name="step[]" id="step[]" class="chosen_select form-control inline-block select_step">'+
							'<option value="0">Select Step</option>'+
						'<?php foreach($getStep AS $val => $valx){ ?>'+
								'<option value="<?=$valx["step_name"]?>"><?=strtoupper($valx["step_name"])?></option>'+
						'<?php } ?>'+
						'</select>'+*/
            '</td>'+
            '<td style="background-color:#E0E0E0;text-align:left">'+
            '<input type="text" name="pic_phone[]"  class="form-control input-sm inSp2 numberOnly" required="" placeholder="Input PIC Number">'+
            '<input type="email" name="pic_email[]"  class="form-control input-sm inSp2 " required="" placeholder="Input PIC Email">'+
            '<input type="level" name="pic_level[]"  class="form-control input-sm inSp2 " required="" placeholder="Input PIC Job/Level">'+
            '</td>'+
        '</tr>'

      $('#tfoot-pic').append(row);

    });
    $('#addBankListX').click(function(e){
      var x = parseInt(document.getElementById("tfoot-pic").rows.length)+1;
      console.log(x);
      var row =
          '<div class="bank_list">'+
          '<div class="row">'+
            '<div class="col-lg-3 col-md-3">'+
              '<span style="width:4%"><a class="text-red hapus_item_js" href="javascript:void(0)" title="Delete List"><i class="fa fa-times"></i></a> </span>'+
              '<input type="text" name="bank_name[]"  class="form-control input-sm " required="" placeholder="Input Bank Name" style="width:80%;text-align:center;display:inline-block">'+
            '</div>'+
            '<div class="col-lg-3 col-md-3">'+
              '<input type="text" name="bank_acc_no[]"  class="form-control input-sm bank_num numberOnly" required="" placeholder="Input A/C No." style="text-align:center;display:inline-block">'+
            '</div>'+
            '<div class="col-lg-3 col-md-3">'+
              '<input type="text" name="bank_code[]"  class="form-control input-sm " required="" placeholder="Input Bank Code" style="text-align:center;display:inline-block">'+
            '</div>'+
            '<div class="col-lg-3 col-md-3">'+
              '<input type="text" name="bank_acc_name[]"  class="form-control input-sm " required="" placeholder="Input A/C Name" style="text-align:center;display:inline-block">'+
            '</div>'+
          '</div>'+
          '<div class="row">'+
            '<div class="col-lg-3 col-md-3">'+
            '<span style="width:4%"></span>'+
              '<input type="text" name="bank_address[]"  class="form-control input-sm " required="" placeholder="Input Bank Address" style="width:80%;text-align:center;display:inline-block">'+
            '</div>'+
            '<div class="col-lg-3 col-md-3">'+
            '</div>'+
            '<div class="col-lg-3 col-md-3">'+
            '</div>'+
            '<div class="col-lg-3 col-md-3">'+
            '</div>'+
          '</div>'+
          '</div>'

      $('.bank_class').append(row);

    });
    $('#addBankList').click(function(e){
      var x = parseInt($(".bank_list").length)+1;
      console.log(x);
      var row =
        '<div class="bank_list">'+
        '  <div class="col-sm-12" style="padding:2%">'+
        '    <div class="row" style="">'+
        '      <div class="col-sm-12" style="background-color:#9999FF; color:#190033; font-size: 15px; text-align:center; padding:1%; width:95%; margin-left:2.5%">'+
        '        <strong>'+
        '          <a class="text-red hapus_item_js" href="javascript:void(0)" title="Delete List"><i class="fa fa-times"></i></a> || Supplier Bank No.<span class="numbering_bank">'+x+'</span></a>'+
        '        </strong>'+
        '      </div>'+
        '    </div>'+
        '    <div class="row">'+
        '      <div class="row" style="padding:1%; width:95%; margin-left:2.5%">'+
        '        <div class="col-lg-3 col-md-3">'+
        '          Bank Name'+
        '        </div>'+
        '        <div class="col-lg-3 col-md-3">'+
        '          <input type="text" name="bank_name[]"  class="form-control input-sm " required="" placeholder="Input Bank Name" style="text-align:center;display:inline-block">'+
        '        </div>'+
        '        <div class="col-lg-3 col-md-3">'+
        '          Bank Address'+
        '        </div>'+
        '        <div class="col-lg-3 col-md-3">'+
        '          <input type="text" name="bank_address[]"  class="form-control input-sm " required="" placeholder="Input Bank Address" style="text-align:center;display:inline-block">'+
        '        </div>'+
        '      </div>'+
        '      <div class="row" style="padding:1%; width:95%; margin-left:2.5%">'+
        '        <div class="col-lg-3 col-md-3">'+
        '          Bank Account Name'+
        '        </div>'+
        '        <div class="col-lg-3 col-md-3">'+
        '          <input type="text" name="bank_acc_name[]"  class="form-control input-sm " required="" placeholder="Input A/C Name" style="text-align:center;display:inline-block">'+
        '        </div>'+
        '        <div class="col-lg-3 col-md-3">'+
        '          Bank Account Number'+
        '        </div>'+
        '        <div class="col-lg-3 col-md-3">'+
        '          <input type="text" name="bank_acc_no[]"  class="form-control input-sm bank_num numberOnly" required="" placeholder="Input A/C No." style="text-align:center;display:inline-block">'+
        '        </div>'+
        '      </div>'+
        '      <div class="row" style="padding:1%; width:95%; margin-left:2.5%">'+
        '        <div class="col-lg-3 col-md-3">'+
        '          Bank Code'+
        '        </div>'+
        '        <div class="col-lg-3 col-md-3">'+
        '          <input type="text" name="bank_code[]"  class="form-control input-sm " required="" placeholder="Input Bank Code" style="text-align:center;display:inline-block">'+
        '        </div>'+
        '        <div class="col-lg-3 col-md-3">'+
        '        </div>'+
        '        <div class="col-lg-3 col-md-3">'+
        '        </div>'+
        '      </div>'+

        '    </div>'+
        '  </div>'+
        '</div>';

      $('.bank_class').append(row);

    });

    //REMOVE LIST BUTTON
    $('#tfoot-pic').on( 'click', 'a.hapus_item_js', function () {
  			//console.log('a');
        $(this).parents('tr').remove();
        if (parseInt(document.getElementById("tfoot-pic").rows.length) == 0) {
          var x=1;
        }else {
          var x = parseInt(document.getElementById("tfoot-pic").rows.length)+1;
        }
        for (var i = 0; i < x; i++) {
          $('.numbering').eq(i-1).text(i);
        }
    } );
    $('.bank_class').on( 'click', 'a.hapus_item_js', function () {
  			//console.log('a');
        $(this).parents('.bank_list').remove();
        if (parseInt($(".bank_list").length) == 0) {
          var x=1;
        }else {
          var x = parseInt($(".bank_list").length)+1;
        }
        for (var i = 0; i < x; i++) {
          $('.numbering_bank').eq(i-1).text(i);
        }
        /*if (parseInt(document.getElementById("tfoot-pic").rows.length) == 0) {
          var x=1;
        }else {
          var x = parseInt(document.getElementById("tfoot-pic").rows.length)+1;
        }
        for (var i = 0; i < x; i++) {
          $('.numbering').eq(i-1).text(i);
        }*/
    } );


    jQuery(document).on('keyup', '.bank_num', function(){
      var foo = $(this).val().split("-").join(""); // remove hyphens
      if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
      }
      $(this).val(foo);
    });


    $(document).on('click', '#saveSelBrand', function(e){
      var formdata = $("#form-selBrand").serialize();
      var selected = '';
      $('#my-grid input:checked').each(function() {
          //selected.push($(this).val());
          selected = selected+$(this).val()+';';
      });
      //console.log(selected);
      $('#id_brand').val(selected);
      $("#ModalView2").modal('hide');
    });
    // $(document).on('click', '#generate_id', function(e){
      

    // });
    $(document).on('click', '.radioShipping', function(e){
      getProCat();
      /*var id_category = $('#id_category').val();
      var val = $(this).val();
      if (val != '') {
        $.ajax({
          url: siteurl+active_controller+"getProductCatOpt",
          dataType : "json",
          type: 'POST',
          data: {id_category:id_category,supplier_shipping:val},
          success: function(result){
            $('#id_category').html(result.html);
          },
          error: function (request, error) {
            console.log(arguments);
            alert(" Can't do because: " + error);
          }
        });
      }else {
        swal({
          title: "Warning!",
          text: "Complete Supplier name first, please!",
          type: "warning",
          timer: 3500,
          showConfirmButton: false
        });
      }*/

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
      getBusCat();
    });
    $(document).on('change', '#id_business', function(e){
      getSupCap();
    });
    $(document).on('change', '#id_capacity', function(e){
      //  console.log($(this).val());
    });
    $(document).on('change', '#id_category', function(e){
      getCodeCategory();
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
    if ('<?php $getC ?>' != null) {
      // getProCat();
      getBusCat();
      getSupCap();
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

  function getCategory() {
    if ('<?=($getC->category_id)?>' != null) {
      var id_selected = '<?=$getC->category_id?>';
    }else if ($('#id_category').val() != null || $('#id_category').val() != '') {
      var id_selected = $('#id_category').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = 'id_categori';
    var column_fill = '';
    var column_name = 'nm_categori';
    var table_name = 'category';
    var key = 'id_categori';
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
        $('#id_category').html(result.html);
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
