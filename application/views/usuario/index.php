<link rel="stylesheet" href="<?php echo base_url('/public').'/css/usuario.css'?>">

<div class="title_botton">
	<h2>USERS</h2>
	<a href="/usuario/create">
		<button type="button" class="btn btn-primary">Add new user</button>
	</a>
</div>
<hr>

<div class="table-responsive">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Role</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Age</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
	<?php foreach ($users as $key => $value) { ?>
		<tr>
			<th scope="row"><?php echo $value->name_role?></th>
			<td>
				<a href="<?php echo '/usuario/show/'.$value->id_user?>">
					<?php echo $value->name?>
				</a>	
			</td>
			<td><?php echo $value->email?></td>
			<td><?php echo $value->age?></td>
			<td><?php echo $value->phone?></td>
			<td><?php echo $value->address?></td>
			<td>
				<a href="<?php echo '/usuario/edit/'.$value->id_user?>" class="btn-link">Editar</a> |
				<a href="<?php echo '/usuario/delete/'.$value->id_user?>" class="btn-link">Eliminar</a>
			</td>
			</tr>
	    <tr>
	<?php } ?> 		
  </tbody>
</table>
</div>

