<link rel="stylesheet" href="<?php echo base_url('/public').'/css/usuario.css'?>">
<!-- ============================================================== -->
<!-- influencer profile  -->
<!-- ============================================================== -->
<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card influencer-profile-data">
						<div class="card-body">
								<div class="row">
										<div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
												<div class="text-center">
														<img src="<?php echo base_url('/public')."/assets/images/man.svg"?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
													</div>
												</div>
												<div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
														<div class="user-avatar-info">
																<div class="m-b-20">
																		<div class="user-avatar-name">
																				<h2 class="mb-1"><?php echo $user->name ?></h2>
																		</div>
																		<div class="rating-star  d-inline-block">
																				<i class="fa fa-fw fa-star"></i>
																				<i class="fa fa-fw fa-star"></i>
																				<i class="fa fa-fw fa-star"></i>
																				<i class="fa fa-fw fa-star"></i>
																				<i class="fa fa-fw fa-star"></i>
																				<p class="d-inline-block text-dark">14 Reviews </p>
																		</div>
																</div>
																<div class="user-avatar-address">
																		<p class="border-bottom pb-3">
																				<span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-primary "></i><?php echo $user->city.', '.$user->country ?></span>
																				<span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Joined date: 23 June, 2018  </span>
																				<span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><?php echo $user->age ?> Year Old </span>
																		</p>
																		<div class="mt-3">
																			<div class="flex-design">
																				<div style="flex: 1;">
																					<p><strong>Email: </strong><?php echo $user->email ?></p>
																					<p><strong>Phone number: </strong><?php echo $user->phone ?></p>
																					<p><strong>Address: </strong><?php echo $user->address ?></p>
																				</div>
																				<div style="flex: 1;">
																					<p>
																						<strong>Type: </strong>
																						<span class="badge badge-primary"><?php echo $user->name_role ?></span>
																					</p>
																				</div>																		
																			<div>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
								<div class="border-top user-social-box" style="width: 100%;display: flex; flex-wrap: wrap; justify-content: center;">
										<div class="user-social-media d-xl-inline-block"><span class="mr-2 twitter-color"> <i class="fab fa-twitter-square"></i></span><span>13,291</span></div>
										<div class="user-social-media d-xl-inline-block"><span class="mr-2  pinterest-color"> <i class="fab fa-pinterest-square"></i></span><span>84,019</span></div>
										<div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i class="fab fa-instagram"></i></span><span>12,300</span></div>
										<div class="user-social-media d-xl-inline-block"><span class="mr-2  facebook-color"> <i class="fab fa-facebook-square "></i></span><span>92,920</span></div>
										<div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i class="fab fa-youtube"></i></span><span>1291</span></div>
								</div>
						</div>
				</div>
		</div>
		<!-- ============================================================== -->
		<!-- end influencer profile  -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		Icons made by <a href="https://www.flaticon.com/authors/vitaly-gorbachev" title="Vitaly Gorbachev">Vitaly Gorbachev</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
