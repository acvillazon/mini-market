<link rel="stylesheet" href="<?php echo base_url('/public').'/css/product.css'?>">

<div class="title_botton">
	<h2>PRODUCT</h2>
		<a href="/product/create">
		<button type="button"  class="btn btn-primary">Add new product</button>
	</a>
</div>
<hr>
<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Availability</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php foreach ($products as $key => $value) { ?>
		<tr>
			<th scope="row"><?php echo $value->name_type?></th>
			<td>
				<!-- <a href="<?php echo '/product/show/'.$value->id_product?>"> -->
					<?php echo $value->name_product?>
				<!-- </a>	 -->
			</td>
			<td><?php echo $value->quantity?></td>
			<td>$<?php echo $value->price?></td>
			<td>
				<?php if($value->quantity<=0){ ?>
					<span class="badge badge-danger">out of stock</span>
				<?php } ?>
				
				<?php if($value->quantity>0){ ?>
					<span class="badge badge-success">available</span>
				<?php } ?>
			</td>
			<td>
				<a href="<?php echo '/product/edit/'.$value->id_product?>" class="btn-link">Editar</a> |
				<a href="<?php echo '/product/delete/'.$value->id_product?>" class="btn-link">Eliminar</a>
			</td>
			</tr>
	    <tr>
	<?php } ?> 		
  </tbody>
</table>
</div>
