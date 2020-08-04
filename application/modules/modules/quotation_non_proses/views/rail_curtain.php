<div class="col-md-5">
				
	<div class="form-group">
	  <label class="control-label col-sm-3" for="rail_material<?=$no?>">Rail Material</label>
	  <div class="col-md-7">  
		<strong>
			<select class="form-control required select2" name="rail_curtain[<?=$no?>][rail_material]" id="rail_material<?=$no?>"></select>
			<label class="label label-danger rail_material<?=$no?> hideIt">Rail Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="qyt_rail<?=$no?>">Qty</label>
	  <div class="col-md-7">  
		<strong>
			<input type="number" min="0" readonly class="form-control text-right	" placeholder="0" name="rail_curtain[<?=$no?>][qyt_rail]" id="qyt_rail<?=$no?>">
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="price_rail<?=$no?>">Price</label>
	  <div class="col-md-7">  
		<strong>
			<input type="number" min="0" readonly class="form-control text-right" placeholder="0" name="rail_curtain[<?=$no?>][price_rail]" id="price_rail<?=$no?>">
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="diskon_rail<?=$no?>">Diskon</label>
	  <div class="col-md-4">  
		<strong>
			<div class="input-group">
				<input type="number" min="0" class="form-control required text-right" placeholder="0" name="rail_curtain[<?=$no?>][diskon_rail]" id="diskon_rail<?=$no?>">
				<span class="input-group-addon">%</span>
			</div>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="ex_comm_rail<?=$no?>">External Commission</label>
	  <div class="col-md-7">  
		<strong>
			<input type="text" min="0" class="form-control" name="rail_curtain[<?=$no?>][ex_comm_rail]" id="ex_comm_rail<?=$no?>">
			<label class="label label-danger ex_comm_rail<?=$no?> hideIt">External Commission Can't be empty!</label>
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="ket_rail<?=$no?>">Keterangan</label>
	  <div class="col-md-7">  
		<strong>
			<textarea type="text" min="0" class="form-control" name="rail_curtain[<?=$no?>][ket_rail]" id="ket_rail<?=$no?>"></textarea>
		</strong>
	  </div>	
	</div>
	
</div>

<div class="col-md-3">

	<div class="form-group">
	  <label class="control-label" for="detail_comp<?=$no?>">Detail Component</label>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="rail_comp<?=$no?>">Rail</label>
	  <div class="col-md-6">  
		<strong>
		<div class="input-group">
			<input type="text" class="form-control" readonly name="product_curtain[<?=$no?>][rail_comp]" id="rail_comp<?=$no?>" value="1">
			<span class="input-group-addon">m</span>
		</div>	
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="carier_rail<?=$no?>">Carier</label>
	  <div class="col-md-6">  
		<strong>
		<div class="input-group">
			<input type="number" min="0" class="form-control" readonly name="product_curtain[<?=$no?>][carier_rail]" id="carier_rail<?=$no?>" value="20">
			<span class="input-group-addon">Pcs</span>
		</div>	
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="bracket_rail<?=$no?>">Bracket</label>
	  <div class="col-md-6">  
		<strong>
		<div class="input-group">
			<input type="number" min="0" class="form-control" readonly name="product_curtain[<?=$no?>][bracket_rail]" id="bracket_rail<?=$no?>" value="20">
			<span class="input-group-addon">Pcs</span>
		</div>	
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="endcap_rail<?=$no?>">Endcap</label>
	  <div class="col-md-6">  
		<strong>
		<div class="input-group">
			<input type="number" min="0" class="form-control" readonly name="product_curtain[<?=$no?>][endcap_rail]" id="endcap_rail<?=$no?>" value="20">
			<span class="input-group-addon">Pcs</span>
		</div>	
			
		</strong>
	  </div>	
	</div>
	
</div>

<div class="col-md-4">

	<div class="form-group">
	  <label class="control-label" for="detail_comp<?=$no?>">Additionam Component</label>
	  <label style="padding-left:20px"><input type="radio" class="add_comp" data-id="<?=$no?>" name="rail_curtain[<?=$no?>][add_comp]" checked value="no"><span style="margin-left:5px">No</span></label>
	  <label style="margin-left:20px"><input type="radio" class="add_comp" data-id="<?=$no?>" name="rail_curtain[<?=$no?>][add_comp]" value="yes"><span style="margin-left:5px">Yes</span></label>
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="rail_comp<?=$no?>">Rail</label>
	  <div class="col-md-5">  
		<strong>
		<div class="input-group">
			<input type="number" min="0" class="form-control" name="product_curtain[<?=$no?>][rail_comp]" id="rail_comp<?=$no?>" value="1">
			<span class="input-group-addon">m</span>
		</div>	
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="carier_rail<?=$no?>">Carier</label>
	  <div class="col-md-5">  
		<strong>
		<div class="input-group">
			<input type="number" min="0" class="form-control" name="product_curtain[<?=$no?>][carier_rail]" id="carier_rail<?=$no?>" value="20">
			<span class="input-group-addon">Pcs</span>
		</div>	
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="bracket_rail<?=$no?>">Bracket</label>
	  <div class="col-md-5">  
		<strong>
		<div class="input-group">
			<input type="number" min="0" class="form-control" name="product_curtain[<?=$no?>][bracket_rail]" id="bracket_rail<?=$no?>" value="20">
			<span class="input-group-addon">Pcs</span>
		</div>	
		</strong>
	  </div>	
	</div>
	
	<div class="form-group">
	  <label class="control-label col-sm-3" for="endcap_rail<?=$no?>">Endcap</label>
	  <div class="col-md-5">  
		<strong>
		<div class="input-group">
			<input type="number" min="0" class="form-control" name="product_curtain[<?=$no?>][endcap_rail]" id="endcap_rail<?=$no?>" value="20">
			<span class="input-group-addon">Pcs</span>
		</div>
		</strong>
	  </div>	
	</div>
	
</div>