<link rel="stylesheet" href="<?php echo base_url('/public').'/css/product.css'?>">

<h2>REGISTER PRODUCT</h2>

<form method="POST" action="/product/store">
	<?php echo validation_errors(); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" id="inputName" 
			required 
			name="name"
			minlength="2" 
			maxlength="50">
	</div>

	<div class="form-group">
		<label>Type</label>
		<select class="form-control" required name="type_id">
		    <option value="-1">Choose an option</option>
			<?php foreach ($type_products as $key => $value) { ?>
				<option value="<?php echo $value->id_type ?>"><?php echo $value->name_type ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Price (COP)</label>
		<input type="number" class="form-control" id="inputPrice" 
			required 
			name="price"
			min="0">
	</div>
	
	<div class="form-group">
		<label>Quantity</label>
		<span>( One unit per 1000g, for unpackaged products ) <span>
		<input type="quantity" class="form-control" id="inputQuantity" 
			required 
			value="1"
			name="quantity"
			min="0">
	</div>

  <button id="btn_submit" type="submit" class="btn btn-primary">Create</button>
</form>


