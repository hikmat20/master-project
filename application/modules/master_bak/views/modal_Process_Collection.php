<?php

if (!empty($this->uri->segment(3))) {
  $getC		= $this->db->get_where('master_product_collection',array('id_collection'=>$id))->row();
}
$getI   = $this->db->query("SELECT MAX(id_collection) AS max_id FROM master_product_collection WHERE id_collection LIKE '%CL%' ORDER BY id_collection DESC LIMIT 1")->row();
//echo "$first_letter";
//exit;
$num = substr($getI->max_id,-5)+1;
$id_collection = 'CL'.str_pad($num,5,"0",STR_PAD_LEFT);


?>
<form class="" id="form-collection" action="" method="post">
  <div class="box box-success">
	<div class="box-body" style="">
    <div class="row">
      <div class="col-sm-12">

        <section id="DETAIL_COLLECTION_IDENTITY">
          <table id="my-grid" class="table table-striped table-bordered table-hover table-condensed" width="100%">
            <tbody>
              <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
                <th class="text-center" colspan='2'>DETAIL COLLECTION</th>
              </tr>
              <tr id="my-grid-tr-id_collection">
                <td class="text-left vMid">Code <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?=$getC->id_collection?>
                  </label>
                  <label class="label_input">
                    <input type="hidden" name="type" value="<?=empty($getC->id_collection)?'add':'edit'?>">
                    <input type="text" class="form-control input input-sm required w50" name="id_collection" id="id_collection" value="<?=empty($getC->id_collection)?$id_collection:$getC->id_collection?>" readonly>
                    <label class="label label-danger id_collection hideIt">Code Can't be empty!</label>
                  </label>
                </td>
              </tr>

              <tr id="my-grid-tr-name_collection">
                <td class="text-left vMid">Collection Name <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?=$getC->name_collection?>
                  </label>
                  <label class="label_input">
                  <?php
                  echo form_input(array('type'=>'text','id'=>'name_collection','name'=>'name_collection','class'=>'form-control input-sm required w60', 'placeholder'=>'Collection Name','autocomplete'=>'off','value'=>empty($getC->name_collection)?'':$getC->name_collection))
                  ?>
                  <!--<a id="generate_id" class="btn btn-sm btn-primary" style="display:inline-block">Generate ID</a>-->
                  <label class="label label-danger name_collection hideIt">Collection Name Can't be empty!</label>
                </label>
                </td>
              </tr>

              <tr id="my-grid-tr-type_collection">
                <td class="text-left vMid">Collection Type <span class='text-red'>*</span></b></td>
                <td class="text-left">
                  <label class="label_view">
                    <?=$getC->type_collection?>
                  </label>
                  <label class="label_input">
                  <?php
                  echo form_input(array('type'=>'text','id'=>'type_collection','name'=>'type_collection','class'=>'form-control input-sm required w60', 'placeholder'=>'Collection Type','autocomplete'=>'off','value'=>empty($getC->type_collection)?'':$getC->type_collection))
                  ?>
                  <label class="label label-danger type_collection hideIt">Collection Type Can't be empty!</label>
                </label>
                </td>
              </tr>
            </tbody>
          </table>
        </section>

      </div>
    </div>
    <label class="label_input">
      <?php
        echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'addCollectionSave')).' ';
      ?>
    </label>

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
  .w100{
		display: inline-block;
		width: 100%;
	}
  .inline-block{
		display: inline-block;
	}
  .checkbox-label:hover{
    cursor: pointer;
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

    //console.log($(".branch").length);
  

    if ('<?= $this->uri->segment(4) ?>' == 'view') {
      $('.label_view').css("display","block");
      $('.label_input').css("display","none");
    }else {
      $('.label_view').css("display","none");
      $('.label_input').css("display","block");
    }
	});

  function getProv() {
    if ('<?=($getC->id_prov)?>' != null) {
      var id_selected = '<?=$getC->id_prov?>';
    }else if ($('#id_prov').val() != null || $('#id_prov').val() != '') {
      var id_selected = $('#id_prov').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
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
        $('#id_prov').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  function getReference() {
    if ('<?=($getC->id_reference)?>' != null) {
      var id_selected = '<?=$getC->id_reference?>';
    }else if ($('#id_reference').val() != null || $('#id_reference').val() != '') {
      var id_selected = $('#id_reference').val();
    }else {
      var id_selected = '';
    }
    //console.log(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_reference';
    var table_name = 'child_customer_reference';
    var key = 'id_reference';
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
        $('#id_reference').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  function getCustomerCat() {
    if ('<?=($getC->id_category_customer)?>' != null) {
      var id_selected = '<?=$getC->id_category_customer?>';
    }else if ($('#id_category_customer').val() != null || $('#id_category_customer').val() != '') {
      var id_selected = $('#id_category_customer').val();
    }else {
      var id_selected = '';
    }
    //getCode(id_selected);
    var column = '';
    var column_fill = '';
    var column_name = 'name_category_customer';
    var table_name = 'child_customer_category';
    var key = 'id_category_customer';
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
        $('#id_category_customer').html(result.html);
      },
      error: function (request, error) {
        console.log(arguments);
        alert(" Can't do because: " + error);
      }
    });
    sel2();
  }
  function getSales() {
    if ('<?=($getC->id_karyawan)?>' != null) {
      var id_selected = '<?=$getC->id_karyawan?>';
    }else if ($('#id_karyawan').val() != null || $('#id_karyawan').val() != '') {
      var id_selected = $('#id_karyawan').val();
    }else {
      var id_selected = '';
    }
    var column = 'divisi';
    var column_fill = '3';
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
    var table_name = 'child_customer_business_category';
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
    var table_name = 'child_customer_capacity';
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
    var table_name = 'child_customer_toq';
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
  function getCode(id_cat) {
    if (id_cat != '') {
      $.ajax({
        url: siteurl+active_controller+"getCodeByCat",
        dataType : "json",
        type: 'POST',
        data: {id_category_customer:id_cat},
        success: function(result){
          $('#id_customer').val(result.id);
        },
        error: function (request, error) {
          console.log(arguments);
          alert(" Can't do because: " + error);
        }
      });
    }else {
      alert(" Can't do because: " );
    }
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
    var id_customer = '<?=$id?>';
    var id_brand    = <?php echo json_encode(explode(";",$getC->id_brand) );?>;
    $.ajax({
      url: siteurl+active_controller+"getBrandOpt",
      dataType : "json",
      type: 'POST',
      data: {id_customer:id_customer},
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
  function getCustomerTypeX() {
    var id_type = $('#id_type').val();
    var supplier_shipping = $('#supplier_shipping').val();
    $.ajax({
      url: siteurl+active_controller+"getCustomerTypeOpt",
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
  function getCustomerCapX(id_capacity=null) {
    var id_business = $('#id_business').val();
    $.ajax({
      url: siteurl+active_controller+"getCustomerCapOpt",
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
    //getCustomerType();
    //getBusinessCat('<?=empty($getC->id_business)?"":$getC->id_business?>');
    //getCustomerCap('<?=empty($getC->id_capacity)?"":$getC->id_capacity?>');
  }
  */
</script>
