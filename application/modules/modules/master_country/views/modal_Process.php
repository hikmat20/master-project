<?php

if (!empty($id)) {
  $getC		= $this->db->get_where('master_country',array('id_country'=>$id))->row();
}

?>
<form id="form-country" action="" method="post">
<div class="box box-success">
	<div class="box-body" style="">
		<table id="my-grid" class="table table-striped table-bordered table-hover table-condensed" width="100%">
			<tbody>
				<tr style='background-color: #175477; font-size: 15px;'>
          <th class="text-center">
            Country Name:
          </th>
					<th class="text-center">
            <input type="hidden" name="type" value="<?=empty($getC)?'add':'edit'?>">
            <input type="hidden" name="id_country" value="<?=empty($getC)?'':$getC->id_country?>">
            <input type="text" name="name_country" value="<?=empty($getC)?'':$getC->name_country?>" class="form-control input input-sm">
          </th>
				</tr>

		</table>
		<br>
    <a id="addCountrySave" class="btn btn-sm btn-success">Save</a>

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
    $(document).on('click', '#addCountrySave', function(e){
      var formdata = $("#form-country").serialize();
      $.ajax({
        url: siteurl+active_controller+"saveCountry",
        dataType : "json",
        type: 'POST',
        data: formdata,
        success: function(result){
          //console.log(result['msg']);
          if(result.status=='1'){
            swal({
              title: "Sukses!",
              text: result['msg'],
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
              text: result['msg'],
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
      //$("#ModalView").modal('hide');
    });

	});

</script>
