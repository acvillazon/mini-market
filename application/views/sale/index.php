<link rel="stylesheet" href="<?php echo base_url('/public').'/css/sales.css'?>">
<script src="<?php echo base_url('/public').'/js/sales.index.js'?>"></script>

<div class="container-fluid flex-design">
	<div class="flex-1">
		<img class="image_cash" src="<?php echo base_url('/public').'/assets/images/cash-register.svg'?>">
	</div>

	<textarea id="products" name="products[]" disabled hidden><?php echo json_encode($products) ?></textarea>
	
	<div class="flex-2">
		<h2> CASHIER</h2>
		<form method="POST">
			<div class="form-group">
					<label>Select Product</label>
					<select id="inputProduct" onchange="currentProductPrice()" class="form-control" required>
						<option value="-1">Choose product</option>
						<?php foreach ($products as $key => $value) { ?>
							<option 
								value="<?php echo $value->id_product.'|'.$value->price ?>"><?php echo $value->name_product ?></option>
						<?php } ?>
					</select>
			</div>

			<div class="form-group">
				<label>Quantity</label>
				<input type="number" class="form-control" id="inputQuantity" 
					required 
					value="1"
					name="quantity"
					min="1" 
					max="15">
			</div>

			<button id="btn_submit" onclick="addToCart()" type="button" class="btn btn-primary">Add to cart</button>

		</form>
	</div>
</div>

<div class="mt-3"></div>
<div>Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
<hr>

<div style="display: flex; justify-content: flex-end;">
	<span class="badge badge-warning">
		<p style="padding-top: 10px;">Before selling the products, select the customer of the purchase.</p>
	</span>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody id="container-data"></tbody>
	<tfooter>
		<tr>
		<th scope="col"></th>
		<th scope="col"></th>
		<th scope="col">TOTAL</th>
		<th scope="col" id="total_footer">$0</th>
		</tr>
	</tfooter>
  
</table>
<hr>

<div style="display: flex; justify-content: flex-end">
	<div style="display: flex; width: 20%; flex-direction: column;">

		<div class="form-group">
			<select id="inputClient" onchange="clientOnChange()" class="form-control" required>
					<option value="-1">Choose Client</option>
					<?php foreach ($users as $key => $value) { ?>
						<option 
							value="<?php echo $value->id_user?>"><?php echo $value->name ?></option>
					<?php } ?>
			</select>
		</div>
		
		<button id="btn_payment" type="submit" onclick="sendToBackend()" disabled class="btn btn-primary">Sell products</button>
	</div>
	
</div>
