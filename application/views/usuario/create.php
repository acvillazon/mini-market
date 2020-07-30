<link rel="stylesheet" href="<?php echo base_url('/public').'/css/usuario.css'?>">
<script src="<?php echo base_url('/public').'/js/usuario.create.js'?>"></script>

<h2>CREATE NEW USER</h2>
<form method="POST" action="/usuario/store">
<div class="form-group">
    <label>Name</label>
	<input type="text" class="form-control" id="inputName" 
		value="<?php echo set_value('name'); ?>"
		required 
		name="name"
		minlength="2" 
		maxlength="50">
  </div>

  <div class="phone_age">
	  <div class="form-group phone_style">
		<label>Password</label>
		<input type="password" class="form-control" id="inputPassword" 
			value="<?php echo set_value('password'); ?>"
			required
			name="password" 
			minlength="5" 
			maxlength="12">
	  </div>
	
	  <div class="form-group age_style">
		<label>Repeat password</label>
		<input type="password" class="form-control" onblur="passEqual()" id="inputPassword_"
			value="<?php echo set_value('password_'); ?>"
			required
			name="password_" 
			minlength="5" 
			maxlength="12">
	  </div>

  </div>
  
  <div class="phone_age">
	  <div class="form-group phone_style">
		<label>Country</label>
		<input type="text" class="form-control" id="inputCountry" 
			value="<?php echo set_value('country'); ?>"
			required
			name="country" 
			minlength="2" 
			maxlength="50">
	  </div>
	
	  <div class="form-group age_style">
		<label>City</label>
		<input type="text" class="form-control" id="inputCity" 
			required
			value="<?php echo set_value('city'); ?>"
			name="city" 
			minlength="2" 
			maxlength="50">
	  </div>

  </div>
  
  <div class="form-group">
    <label>Email address</label>
	<input type="text" class="form-control" id="inputEmail" 
		value="<?php echo set_value('email'); ?>"
		required
		pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
		name="email" 
		minlength="5" 
		maxlength="50">
  </div>
  
  <div class="phone_age">
	  <div class="form-group phone_style">
		<label>Phone number</label>
		<input type="number" class="form-control" id="inputPhone" 
			value="<?php echo set_value('phone'); ?>"
			required
			name="phone" 
			min="1000000" 
			maxlength="10000000">
	  </div>
	  
	  <div class="form-group age_style">
		<label>Age</label>
		<input type="number" class="form-control" id="inputPhone" 
			value="<?php echo set_value('age'); ?>"
			required
			name="age" 
			min="18" 
			max="200">
	  </div>
  </div>
  
  <div class="form-group">
    <label>Address</label>
	<input type="text" class="form-control" id="inputAddress" 
		required
		value="<?php echo set_value('address'); ?>"
		name="address" 
		minlength="5" 
		maxlength="20">
  </div>

  <button id="btn_submit" type="submit" class="btn btn-primary">Create</button>
</form>
