<?php

if (!empty($this->uri->segment(3))) {
  $getC = $this->db->get_where('accessories',array('id_accessories'=>$id))->row();

}
if ($this->uri->segment(3) == 'view') {
  $view = 'style="display:block"';
}else {
  $mode = 'input';
}

?>
<form class="" id="form-accessories" action="" method="post" enctype="multipart/form-data">
  <div class="box box-success">
	<div class="box-body" style="">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <table id="my-grid3" class="table table-striped table-bordered table-hover table-condensed" width="100%">
          <tbody>
            <tr style='background-color: #175477 !important; color: white; font-size: 15px !important;'>
              <th class="text-center" colspan='3'>DETAIL ACCESSORIES</th>
            </tr>
            <tr id="my-grid-tr-id_accessories">
              <td class="text-left vMid" width="40%">Code <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->id_accessories:'-'?>
                </label>
                <label class="label_input">
                  <input type="hidden" name="type" value="<?=empty($getC->id_accessories)?'add':'edit'?>">
                  <input type="text" class="form-control input required w20" name="id_accessories" id="id_accessories" value="<?= $getC->id_accessories; empty($getC->id_accessories)?'':$getC->id_accessories?>" readonly>
                  <input type="text" class="form-control input required w20" maxlength="3" name="id_acc_2" id="id_acc_2" value="<?= $getC->id_acc_2; empty($getC->id_acc_2)?'':$getC->id_acc_2?>">
                  <input type="text" class="form-control input required w20" maxlength="3" name="id_acc_3" id="id_acc_3" value="<?= $getC->id_acc_3; empty($getC->id_acc_3)?'':$getC->id_acc_3?>">
                </label>
                  <label class="label label-danger id_accessories hideIt">Code Can't be empty!</label>
                  <label class="label label-danger id_acc_2 hideIt">Code 2 Can't be empty!</label>
                  <label class="label label-danger id_acc_3 hideIt">Code 3 Can't be empty!</label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-name_accessories">
              <td class="text-left vMid">Accessories Name <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->name_accessories:'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input required w60" name="name_accessories" id="name_accessories" placeholder="Accessories Name" value="<?= $getC->name_accessories; empty($getC->name_accessories)?'':$getC->name_accessories?>">
                  <label class="label label-danger name_accessories hideIt">Accessories Name Can't be empty!</label>
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
			
			<tr id="my-grid-tr-merk">
              <td class="text-left vMid">Merk <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->merk:'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input input-sm required w60" name="merk" id="merk" placeholder="Merk" value="<?= $getC->merk; empty($getC->merk)?'':$getC->merk?>">
                  <label class="label label-danger merk hideIt">Merk Can't be empty!</label>
                </label>
              </td>
            </tr>
			
            <tr id="my-grid-tr-qty">
              <td class="text-left vMid">QTY <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->qty:'-'?>
                </label>
                <label class="label_input">
                  <input type="text" class="form-control input required numberOnly w20 text-right" name="qty" id="qty" placeholder="0" value="<?= $getC->qty; empty($getC->qty)?'':$getC->qty?>">
                  <label class="label label-danger qty hideIt">QTY Can't be empty!</label>
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
                  <select class="form-control required select2" name="unit" id="unit"></select>
                  <label class="label label-danger unit hideIt">Unit Can't be empty!</label>

                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-buy-price">
              <td class="text-left vMid">Buy Price <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  Rp. <?=($getC)?number_format($getC->buying_price):'-'?>
                </label>
                <label class="label_input">
					<div class="w60">
					<div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Rp</span>
					  <?= form_input(array('type'=>'text','id'=>'buy-price','name'=>'buy-price','class'=>'form-control required text-right numberOnly nominal w50','placeholder'=>'0','autocomplete'=>'off','value'=>empty($getC->buying_price)?'':number_format($getC->buying_price)))?>
					 <span class="input-group-addon" id="basic-addon2">.00</span>
					 </div>
					<div>
					  <label class="label label-danger buy-price hideIt">Price Can't be empty!</label>
                </label>
              </td>
            </tr>
			
			<tr id="my-grid-tr-selling-price">
              <td class="text-left vMid">Selling Price <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  Rp. <?=($getC)?number_format($getC->selling_price):'-'?>
                </label>
                <label class="label_input">
					<div class="w60">
					<div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Rp</span>
					  <?= form_input(array('type'=>'text','id'=>'selling-price','name'=>'selling-price','class'=>'form-control required text-right numberOnly nominal w50','placeholder'=>'0','autocomplete'=>'off','value'=>empty($getC->selling_price)?'':number_format($getC->selling_price)))?>
					 <span class="input-group-addon" id="basic-addon2">.00</span>
					 </div>
					<div>
					  <label class="label label-danger selling-price hideIt">Price Can't be empty!</label>
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
              <td class="text-left vMid">Notes </b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC)?$getC->notes:'-'?>
                </label>
                <label class="label_input">
					<textarea type="text" id="descrip" name="descrip" class="form-control w80" placeholder="Notes" autocomplete="off"><?=empty($getC->notes)?'':$getC->notes?></textarea>
					<label class="label label-danger descrip hideIt">Notes Can't be empty!</label>

                </label>
              </td>
            </tr>
			<tr id="my-grid-tr-image">
              <td class="text-left vMid">Image <span class='text-red'>*</span></b></td>
              <td class="text-left">
                <label class="label_view">
                  <?=($getC->images) != ''?'<img src='.'./assets/img/accessories/'.$getC->images.' width="100px">':'-'?>
                </label>
                <label class="label_input">
				  <input type="file" id="image" name="image" class="form-control hidden input-sm required w50" onchange ="tampilkanPreview(this,'preview')">
            
                  <label class="label label-danger image hideIt">Name Card Can't be empty!</label>
				  <?=($getC->images) != ''?'<img id="preview" src='.'./assets/img/accessories/'.$getC->images.' width="100px">':'<img id="preview" width="100px" src='.'./assets/img/accessories/noimage.jpg>';?>
				  
                  <input type="hidden" name="filelama" id="filelama" class="form-control" value="<?= ($getC)?$getC->images:''?>">
                </label>
              </td>
            </tr>
          </tbody>
        </table>
       
      </div>
    </div>

		<?php
			echo form_button(array('type'=>'button','class'=>'btn btn-md btn-success label_input','style'=>'min-width:100px; float:right;','value'=>'save','content'=>'Save','id'=>'saveAccessories')).' ';
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
  
	var id = $('#id_accessories').val();
      if (id == '') {
        $.ajax({
          url: siteurl+active_controller+"getID",
          dataType : "json",
          type: 'POST',
          data: {id:'RO'},
          success: function(result){
            $('#id_accessories').val(result.id);
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
	  width: '60%',
      dropdownParent: $("#form-accessories")
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

    $(document).on('click change keyup paste blur', '#form-accessories .form-control', function(e){
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
              scrollTop: $("#form-accessories").offset().top
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
              scrollTop: $("#form-accessories").offset().top
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
