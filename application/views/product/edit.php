<link rel="stylesheet" href="<?php echo base_url('/public').'/css/product.css'?>">

<h2>UPDATE PRODUCT:
	<?php if(validation_errors()) { ?>
		<?php echo set_value('name'); ?>
	<?php } else { ?>
		<?php echo $product->name_product ?>
	<?php } ?>

</h2>

<form method="POST"
	<?php if(validation_errors()) { ?>
		action="<?php echo '/product/update/'.set_value('id_product'); ?>"
	<?php } else { ?>
		action="<?php echo '/product/update/'.$product->id_product ?>"
	<?php } ?>
>
	<div class="phone_age">
		<div class="form-group phone_style">
			<label>ID</label>
			<input type="text" class="form-control" id="inputID"
				<?php if(validation_errors()) { ?>
					value="<?php echo set_value('id_product'); ?>"
				<?php } else { ?>
					value="<?php echo $product->id_product  ?>" 
				<?php } ?>
				readonly="readonly"
				name="id_product">
		</div>
	
		<div class="form-group age_style">
			<label>Name</label>
			<input type="text" class="form-control " id="inputName" 
				required
				<?php if(validation_errors()) { ?>
					value="<?php echo set_value('name'); ?>"
				<?php } else { ?>
					value="<?php echo $product->name_product ?>" 
				<?php } ?>
				name="name"
				minlength="2" 
				maxlength="50">
		</div>

	</div>
	

	<div class="form-group">
		<label>Type</label>
		<select class="form-control" required name="type_id"
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('type_id'); ?>"
				<?php } else { ?>
				value="<?php echo $product->type_id ?>"
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
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('price'); ?>"
			<?php } else { ?>
				value="<?php echo $product->price ?>" 
			<?php } ?>
			name="price"
			min="0">
	</div>
	
	<div class="form-group">
		<p style="padding: 0px; margin:0px">
		<strong>Stock:
		
			<?php if(validation_errors()) { ?>
			<?php } else { ?>
				<?php echo $product->quantity ?>
			<?php } ?>

		</strong></p>
		<label>Quantity</label>
		<span>( One unit per 1000g, for unpackaged products) <span>
		<input type="quantity" class="form-control" id="inputQuantity" 
			required
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('quantity'); ?>"
			<?php } else { ?>
				value="0" 
			<?php } ?>
			name="quantity"
			min="1">
	</div>

  <button id="btn_submit" type="submit" class="btn btn-primary">Update</button>
</form>


