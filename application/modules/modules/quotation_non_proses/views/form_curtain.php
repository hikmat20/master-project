<div class="panel panel-primary">
	<div class="panel-body">
	
	<!-- =================== SIDE LEFT ============================= -->
	
		<div class="col-md-6">
		
			<div class="form-group">
			  <label class="control-label col-sm-3" for="product_curtain<?=$no?>">Bahan</label>
			  <div class="col-md-7">  
				<strong>
					<select class="form-control required select2 product_curtain" data-id="<?=$no?>" name="product_curtain[<?=$no?>][id_product]" id="product_curtain<?=$no?>"></select>
					<label class="label label-danger product_curtain<?=$no?> hideIt">Product Curtain Can't be empty!</label>
				</strong>
			  </div>	
			</div>
			
			<div class="form-group">
			  <label class="control-label col-sm-3" for="panel<?=$no?>">Panel</label>
			  <div class="col-md-7">  
				<strong>
					<select class="form-control required select2 dt_panel" data-id="<?=$no?>" name="product_curtain[<?=$no?>][panel]" id="panel<?=$no?>">
						<option value=""></option>
						<option value="no">No</option>
						<option value="yes">Yes</option>
					</select>
					<label class="label label-danger panel<?=$no?> hideIt">Panel Curtain Can't be empty!</label>
				</strong>
			  </div>	
			</div>
			
		</div>
		
		<!-- =================== SIDE RIGHT ============================= -->
		
		<div class="col-md-6">
			
			<div class="form-group">
			  <label class="control-label col-sm-3" for="lebar_kain<?=$no?>">Lebar Kain</label>
			  <div class="col-md-7">  
				<strong>
					<input type="text" readonly class="form-control lebar_kain" placeholder="0" data-id="<?=$no?>" name="product_curtain[<?=$no?>][lebar_kain]" id="lebar_kain<?=$no?>">
					<label class="label label-danger lebar_kain<?=$no?> hideIt">Lebar Kain Can't be empty!</label>
				</strong>
			  </div>	
			</div>
			
			<div class="form-group">
			  <label class="control-label col-sm-3" for="harga_kain<?=$no?>">Harga Kain</label>
			  <div class="col-md-7"> 
				<strong>
					<div class="input-group">
						<span class="input-group-addon">Rp.</span>
						<input type="text" class="form-control required text-right harga_kain" data-id="<?=$no?>" readonly placeholder="0" min="0" name="product_curtain[<?=$no?>][harga_kain]" id="harga_kain<?=$no?>">
					</div>
				</strong>
			  </div>	
			</div>
			
		</div>

		<div class="data_detail<?=$no?>">
		</div>
		
		<!-- jenis jahitan -->
		<div class="row">
		
			<div class="col-md-6">
			<br>
				<div class="form-group">
				  <label class="control-label col-sm-3" for="jns_jahit<?=$no?>">Jenis Jahitan</label>
				  <div class="col-md-7">  
					<strong>
						<label style="padding-left:20px"><input type="radio" class="pilihJahitan" data-id="<?=$no?>" name="product_curtain[<?=$no?>][jahit]" checked value="no"><span style="margin-left:5px">No</span></label>
						<label style="margin-left:20px"><input type="radio" class="pilihJahitan" data-id="<?=$no?>" name="product_curtain[<?=$no?>][jahit]" value="yes"><span style="margin-left:5px">Yes</span></label>
						<label class="label label-danger jahit<?=$no?> hideIt">Jahitan Can't be empty!</label>
					</strong>
					
					<div id="dt_jns_jahit<?=$no?>">
					</div>
					
				  </div>	
				</div>
		
			<br>
				<div class="form-group">
				  <label class="control-label col-sm-3" for="rail_curtain<?=$no?>">Rail Curtain</label>
				  <div class="col-md-7">  
					<strong>
						<label style="padding-left:20px"><input type="radio" class="pilihRail" data-id="<?=$no?>" name="rail_curtain[<?=$no?>][rail_curtain]" checked value="no"><span style="margin-left:5px">No</span></label>
						<label style="margin-left:20px"><input type="radio" class="pilihRail" data-id="<?=$no?>" name="rail_curtain[<?=$no?>][rail_curtain]" value="yes"><span style="margin-left:5px">Yes</span></label>
					</strong>
				  </div>	
				</div>
			
			</div>
			
		</div>
		
		<div class="col-md-11 col-md-offset-1">
			<div id="dt_rail_curtain<?=$no?>">
			</div>
		</div>
	</div>
</div>