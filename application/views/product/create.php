<link rel="stylesheet" href="<?php echo base_url('/public').'/css/product.css'?>">

<h2>REGISTER PRODUCT</h2>

<form method="POST" action="/product/store">
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" id="inputName" 
			required
			value="<?php echo set_value('name'); ?>" 
			name="name"
			minlength="2" 
			maxlength="50">
	</div>

	<div class="form-group">
		<label>Type</label>
		<select class="form-control" 

			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('type_id'); ?>"
				<?php } else { ?>
				value="-1"
				<?php echo '<option value=-1>Choose an option</option>' ?>
		    	
			<?php } ?>
			required name="type_id">

			<?php foreach ($type_products as $key => $value) { ?>
				<option value="<?php echo $value->id_type ?>"><?php echo $value->name_type ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Price (COP)</label>
		<input type="number" class="form-control" id="inputPrice" 
			required
			value="<?php echo set_value('price'); ?>"
			name="price"
			min="0">
	</div>
	
	<div class="form-group">
		<label>Quantity</label>
		<span>( One unit per 1000g, for unpackaged products ) <span>
		<input type="quantity" class="form-control" id="inputQuantity" 
			required
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('quantity'); ?>"
			<?php } else { ?>
				value="1"
			<?php } ?>
			name="quantity"
			min="0">
	</div>

  <button id="btn_submit" type="submit" class="btn btn-primary">Create</button>
</form>


