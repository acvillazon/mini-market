<link rel="stylesheet" href="<?php echo base_url('/public').'/css/product.css'?>">

<h2>UPDATE PRODUCT: <?php echo $product->name_product ?></h2>

<form method="POST" action="<?php echo '/product/update/'.$product->id_product ?>">
	<?php echo validation_errors(); ?>
	
	<div class="phone_age">
		<div class="form-group phone_style">
			<label>ID</label>
			<input type="text" class="form-control " id="inputID" 
				value="<?php echo $product->id_product ?>"
				disabled
				name="id_product">
		</div>
	
		<div class="form-group age_style">
			<label>Name</label>
			<input type="text" class="form-control " id="inputName" 
				required 
				value="<?php echo $product->name_product ?>"
				name="name"
				minlength="2" 
				maxlength="50">
		</div>

	</div>
	

	<div class="form-group">
		<label>Type</label>
		<select
			value="<?php echo $product->name_type ?>"
			class="form-control" required name="type_id">
			<?php foreach ($type_products as $key => $value) { ?>
				<option value="<?php echo $value->id_type ?>"><?php echo $value->name_type ?></option>
			<?php } ?>
		</select>
	</div>

	<div class="form-group">
		<label>Price (COP)</label>
		<input type="number" class="form-control" id="inputPrice" 
			required
			value="<?php echo $product->price ?>"
			name="price"
			min="0">
	</div>
	
	<div class="form-group">
		<p style="padding: 0px; margin:0px"><strong>Stock: <?php echo $product->quantity ?></strong></p>
		<label>Quantity</label>
		<span>( One unit per 1000g, for unpackaged products) <span>
		<input type="quantity" class="form-control" id="inputQuantity" 
			required
			value="0"
			name="quantity"
			min="1">
	</div>

  <button id="btn_submit" type="submit" class="btn btn-primary">Update</button>
</form>


