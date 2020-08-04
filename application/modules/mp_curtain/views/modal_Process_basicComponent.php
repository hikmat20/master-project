<?php

if (!empty($id)) {
  $getC		= $this->db->get_where('child_supplier_type',array('id_type'=>$id))->row();
}

?>
<form id="form-type" action="" method="post">
<div class="box box-success">
	<div class="box-body" style="">
		<div class="row">
      <div class="col-sm-12">
        <form class="" id="formBasicComponent" action="" method="post">
          <div class="col-sm-12">
            <table id="NonComponent_left" class="table table-striped table-bordered table-hover table-condensed" width="100%">
              <tbody>
                <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
                  <th class="text-center" colspan='2'>HEADER PRODUCT IDENTITY</th>
                </tr>

                <tr id="my-grid-tr-id_product">
                  <td class="text-left vMid">Component Code <span class='text-red'>*</span></b></td>
                  <td class="text-left">
                    <label class="label_view">
                      <?=$getC->id_component?>
                    </label>
                    <div class="label_input">
                      <input type="hidden" name="type" value="<?=empty($getC->id_component)?'add':'edit'?>">
                      <?php
                      if (!empty($getC)) {
                        $id_component = explode("-",$getC->id_component);
                      }
                      ?>
                      <div class="row col-sm-7">
                        <div class="input-group">
                          <input type="text" class="form-control required input-sm w20" name="id_component_1" id="id_component_1" value="<?=empty($getC->id_component)?'':$id_component[1]?>" readonly>
                          <span class="input-group-addon">-</span>
                          <input type="text" class="form-control required input-sm w20" name="id_component_2" id="id_component_2" value="<?=empty($getC->id_component)?'':$id_component[2]?>" readonly>
                          <span class="input-group-addon">-</span>
                          <input type="text" class="form-control required input-sm w20" name="id_component_3" id="id_component_3" value="<?=empty($getC->id_component)?'':$id_component[3]?>" readonly>
                        </div>
                      </div>
                      <label class="label label-danger id_component hideIt">Code Can't be empty!</label>
                    </div>
                  </td>
                </tr>

                <tr id="my-grid-tr-name_component">
                  <td class="text-left vMid">Component Name <span class='text-red'>*</span></b></td>
                  <td class="text-left">
                    <label class="label_view">
                      <?=$getC->name_component?>
                    </label>
                    <div class="label_input">
                      <input type="text" class="form-control input input-sm required w50" name="name_component" id="name_component" value="<?=empty($getC->name_component)?'':$getC->name_component?>">
                      <label class="label label-danger name_component hideIt">item Name Can't be empty!</label>
                    </div>
                  </td>
                </tr>
                <!--
                <tr id="my-grid-tr-id_supplier_component">
                  <td class="text-left vMid">Supplier <span class='text-red'>*</span></b></td>
                  <td class="text-left">
                    <label class="label_view">
                      <?=($getC)?$name_supplier->nm_supplier:'-'?>
                    </label>
                    <div class="label_input">
                      <select class="form-control input-sm required select2 id_supplier_component_input id_needed" data-width="150" name="id_supplier_component" id="id_supplier_component">
                      </select>
                      <label class="label label-danger id_supplier_component hideIt">Supplier Can't be empty!</label>

                    </div>
                  </td>
                </tr>
                -->
                <tr id="my-grid-tr-uom">
                  <td class="text-left vMid">UOM <span class='text-red'>*</span></b></td>
                  <td class="text-left">
                    <label class="label_view">
                      <?=($getC)?$getC->uom:'-'?>
                    </label>
                    <div class="label_input">
                      <select class="form-control required select2" data-width="200" name="uom_component" id="uom_component" style="width:60%">
                        <option value="">None</option>
                        <option value="PCS" <?=(!empty($getC) && $getC->uom == 'PCS')?'selected':''?> >PCS</option>
                        <option value="M" <?=(!empty($getC) && $getC->uom == 'M')?'selected':''?> >M</option>
                        <option value="Cube" <?=(!empty($getC) && $getC->uom == 'Cube')?'selected':''?> >Cube</option>
                        <option value="Set" <?=(!empty($getC) && $getC->uom == 'Set')?'selected':''?> >Set</option>
                      </select>
                      <div class="row col-sm-6 get_set hideIt" style="margin-top:1%">
                        <div class="input-group select2-bootstrap-append">
                          <input type="text" class="form-control input w50 numberOnly" name="qty_set" id="qty_set" style="display:inline-block" value="<?=empty($getC->qty_set)?'':$getC->qty_set?>">
                          <span class="input-group-addon">PCs</span>
                        </div>
                      </div>
                      <label class="label label-danger uom hideIt">UOM Can't be empty!</label>

                    </div>
                  </td>
                </tr>

                <tr id="my-grid-tr-buy_price">
                  <td class="text-left vMid">Buy Price</td>
                  <td class="text-left">
                    <label class="label_view">
                      <?=($getC)?$getC->buy_price:'-'?>
                    </label>
                    <div class="label_input row col-sm-6">
                      <div class="input-group mb-1">
                        <span class="input-group-addon">Rp</span>
                        <input type="text" class="form-control input w50 numberOnly" name="buy_price" id="buy_price" placeholder="Price" style="display:inline-block" value="<?=empty($getC->buy_price)?'':$getC->buy_price?>">
                      </div>
                      <div class="get_set hideIt">
                        <div class="input-group">
                          <span class="input-group-addon">Rp</span>
                          <input type="text" class="form-control input w50 numberOnly" name="buy_price_set" id="buy_price_set" placeholder="Set Price" style="display:inline-block" value="<?=empty($getC->buy_price_set)?'':$getC->buy_price_set?>">
                        </div>

                      </div>
                      <label class="label label-danger buy_price hideIt">Buy Price Can't be empty!</label>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
    <?php
			echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success label_input','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'addBasicSave')).' ';
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

</style>

<script type="text/javascript">

	$(document).ready(function(){
    $(document).on('click change keyup paste blur', '#uom_component', function(e){
      //console.log('XC');
      var val = $(this).val();
      if (val == 'Set') {
        $('.get_set').removeClass('hideIt');
        $('.get_set').css('display','block');
      }else {
        $('.get_set').addClass('hideIt');
        $('.get_set').css('display','none');

      }
    });
    if ('<?= $this->uri->segment(4) ?>' == 'view') {
      $('.label_view').css("display","block");
      $('.label_input').css("display","none");
    }else {
      $('.label_view').css("display","none");
      $('.label_input').css("display","block");
    }
    var x = parseInt(document.getElementById("basicComponent_Detail").rows.length)+1;
    var sup = $('#id_supplier').val();
    var mid = $('#id_product_2').val();
    $('#id_component_1').val(sup);
    $('#id_component_2').val(mid);
    $('#id_component_3').val(x);

	});

</script>
