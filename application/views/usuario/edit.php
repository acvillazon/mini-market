<link rel="stylesheet" href="<?php echo base_url('/public').'/css/usuario.css'?>">

<h2>EDIT USER</h2>
<form  method="POST" 
	<?php if(validation_errors()) { ?>
		action="<?php echo '/usuario/update/'.set_value('id_user'); ?>"
	<?php } else { ?>
		action="<?php echo '/usuario/update/'.$user->id_user ?>"
	<?php } ?> >

	<div class="form-group">
		<input type="text"
			hidden
			name="id_user"
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('id_user'); ?>"
			<?php } else { ?>
				value="<?php echo $user->id_user ?>" 
			<?php } ?>
		>

	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" id="inputName" 
			required
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('name'); ?>"
			<?php } else { ?>
				value="<?php echo $user->name ?>" 
			<?php } ?>
			name="name"
			minlength="2" 
			maxlength="20">
	</div>

  <div class="form-group">
    <label>Email address</label>
	<input type="text" class="form-control" id="inputEmail" 
		required
		<?php if(validation_errors()) { ?>
			value="<?php echo set_value('email'); ?>"
		<?php } else { ?>
			value="<?php echo $user->email ?>" 
		<?php } ?>
		pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
		name="email" 
		minlength="5" 
		maxlength="50">
  </div>

  <div class="phone_age">
	  <div class="form-group phone_style">
		<label>Country</label>
		<input type="text" class="form-control" id="inputCountry" 
			required
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('country'); ?>"
			<?php } else { ?>
				value="<?php echo $user->country ?>" 
			<?php } ?>
			name="country" 
			min="1000000" 
			maxlength="10000000">
	  </div>
	
	  <div class="form-group age_style">
		<label>City</label>
		<input type="text" class="form-control" id="inputCity" 
			required
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('city'); ?>"
			<?php } else { ?>
				value="<?php echo $user->city ?>" 
			<?php } ?>
			name="city" 
			min="18" 
			maxlength="200">
	  </div>

  </div>
  
  <div class="phone_age">
	  <div class="form-group phone_style">
		<label>Phone number</label>
		<input type="number" class="form-control" id="inputPhone" 
			required
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('phone'); ?>"
			<?php } else { ?>
				value="<?php echo $user->phone ?>" 
			<?php } ?>
			name="phone" 
			minlength="7" 
			maxlength="20">
	  </div>
	  
	  <div class="form-group age_style">
		<label>Age</label>
		<input type="number" class="form-control" id="inputPhone" 
			required
			<?php if(validation_errors()) { ?>
				value="<?php echo set_value('age'); ?>"
			<?php } else { ?>
				value="<?php echo $user->age ?>" 
			<?php } ?>
			name="age" 
			minlength="1" 
			maxlength="5">
	  </div>
  </div>
  
  <div class="form-group">
    <label>Address</label>
	<input type="text" class="form-control" id="inputAddress" 
		required
		<?php if(validation_errors()) { ?>
				value="<?php echo set_value('address'); ?>"
		<?php } else { ?>
				value="<?php echo $user->address ?>" 
		<?php } ?>
		name="address" 
		minlength="5" 
		maxlength="20">
  </div>

  <button id="btn_submit" type="submit" class="btn btn-primary">Update</button>
</form>
