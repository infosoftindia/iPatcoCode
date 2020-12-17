
						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
								<div class="card">
									<div class="card-header">Edit Profile</div>
									<div class="card-body">
										<form action="<?=admin_url('profile/update')?>" method="POST">
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="FirstName" class="col-form-label">First Name</label>
													<input type="text" class="form-control" id="FirstName" placeholder="First Name" name="fname" value="<?=$profile['users_first_name']?>">
												</div>
												<div class="form-group col-md-6">
													<label for="LastName" class="col-form-label">Last Name</label>
													<input type="text" class="form-control" id="LastName" placeholder="Last Name" name="lname" value="<?=$profile['users_last_name']?>">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputEmail" class="col-form-label">Email <small class="text-danger">You cannot change your email</small></label>
													<input type="text" class="form-control" id="inputEmail" value="<?=$profile['users_email']?>" readonly>
												</div>
												<div class="form-group col-md-6">
													<label for="inputPhone" class="col-form-label">Phone Number</label>
													<input type="text" class="form-control" id="inputPhone" placeholder="Phone Number" name="phone" value="<?=$profile['users_mobile']?>">
												</div>
											</div>
											<div class="form-group">
												<label for="inputAddress" class="col-form-label">Address</label>
												<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address1" value="<?=$profile['address_line5']?>">
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputCity" class="col-form-label">City</label>
													<input type="text" class="form-control" placeholder="City" id="inputCity" name="city" value="<?=$profile['address_line3']?>">
												</div>
												<div class="form-group col-md-4">
													<label for="inputState" class="col-form-label">State</label>
													<select id="inputState" class="form-control" name="state">
														<option value="">Select your address</option>
														<option <?=$profile['address_line2'] == 'Andhra Pradesh'?'selected':''?>>Andhra Pradesh</option>
														<option <?=$profile['address_line2'] == 'Andaman and Nicobar Islands'?'selected':''?>>Andaman and Nicobar Islands</option>
														<option <?=$profile['address_line2'] == 'Arunachal Pradesh'?'selected':''?>>Arunachal Pradesh</option>
														<option <?=$profile['address_line2'] == 'Assam'?'selected':''?>>Assam</option>
														<option <?=$profile['address_line2'] == 'Bihar'?'selected':''?>>Bihar</option>
														<option <?=$profile['address_line2'] == 'Chandigarh'?'selected':''?>>Chandigarh</option>
														<option <?=$profile['address_line2'] == 'Chhattisgarh'?'selected':''?>>Chhattisgarh</option>
														<option <?=$profile['address_line2'] == 'Dadar and Nagar Haveli'?'selected':''?>>Dadar and Nagar Haveli</option>
														<option <?=$profile['address_line2'] == 'Daman and Diu'?'selected':''?>>Daman and Diu</option>
														<option <?=$profile['address_line2'] == 'Delhi'?'selected':''?>>Delhi</option>
														<option <?=$profile['address_line2'] == 'Lakshadweep'?'selected':''?>>Lakshadweep</option>
														<option <?=$profile['address_line2'] == 'Puducherry'?'selected':''?>>Puducherry</option>
														<option <?=$profile['address_line2'] == 'Goa'?'selected':''?>>Goa</option>
														<option <?=$profile['address_line2'] == 'Gujarat'?'selected':''?>>Gujarat</option>
														<option <?=$profile['address_line2'] == 'Haryana'?'selected':''?>>Haryana</option>
														<option <?=$profile['address_line2'] == 'Himachal Pradesh'?'selected':''?>>Himachal Pradesh</option>
														<option <?=$profile['address_line2'] == 'Jammu and Kashmir'?'selected':''?>>Jammu and Kashmir</option>
														<option <?=$profile['address_line2'] == 'Jharkhand'?'selected':''?>>Jharkhand</option>
														<option <?=$profile['address_line2'] == 'Karnataka'?'selected':''?>>Karnataka</option>
														<option <?=$profile['address_line2'] == 'Kerala'?'selected':''?>>Kerala</option>
														<option <?=$profile['address_line2'] == 'Madhya Pradesh'?'selected':''?>>Madhya Pradesh</option>
														<option <?=$profile['address_line2'] == 'Maharashtra'?'selected':''?>>Maharashtra</option>
														<option <?=$profile['address_line2'] == 'Manipur'?'selected':''?>>Manipur</option>
														<option <?=$profile['address_line2'] == 'Meghalaya'?'selected':''?>>Meghalaya</option>
														<option <?=$profile['address_line2'] == 'Mizoram'?'selected':''?>>Mizoram</option>
														<option <?=$profile['address_line2'] == 'Nagaland'?'selected':''?>>Nagaland</option>
														<option <?=$profile['address_line2'] == 'Odisha'?'selected':''?>>Odisha</option>
														<option <?=$profile['address_line2'] == 'Punjab'?'selected':''?>>Punjab</option>
														<option <?=$profile['address_line2'] == 'Rajasthan'?'selected':''?>>Rajasthan</option>
														<option <?=$profile['address_line2'] == 'Sikkim'?'selected':''?>>Sikkim</option>
														<option <?=$profile['address_line2'] == 'Tamil Nadu'?'selected':''?>>Tamil Nadu</option>
														<option <?=$profile['address_line2'] == 'Telangana'?'selected':''?>>Telangana</option>
														<option <?=$profile['address_line2'] == 'Tripura'?'selected':''?>>Tripura</option>
														<option <?=$profile['address_line2'] == 'Uttar Pradesh'?'selected':''?>>Uttar Pradesh</option>
														<option <?=$profile['address_line2'] == 'Uttarakhand'?'selected':''?>>Uttarakhand</option>
														<option <?=$profile['address_line2'] == 'West Bengal'?'selected':''?>>West Bengal</option>
													</select>
												</div>
												<div class="form-group col-md-2">
													<label for="inputZip" class="col-form-label">Zip</label>
													<input type="text" class="form-control" placeholder="Zip" id="inputZip" name="pin" value="<?=$profile['address_line4']?>">
												</div>
											</div>
											<button type="submit" class="btn btn-primary">Update Your Profile</button>
										</form>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
								<div class="card">
									<div class="card-header">Change Password</div>
									<div class="card-body">
										<form action="<?=admin_url('profile/change-password')?>" method="POST">
											<?php if(validation_errors()){ ?>
											<div class="alert alert-danger"><?=validation_errors('<p style="margin-bottom: 0;">', '</p>')?></div>
											<?php } ?>
											<div class="form-group">
												<label for="old_Password" class="col-form-label">Current Password</label>
												<input type="text" class="form-control" id="old_Password" placeholder="Current Password" name="old_Password">
											</div>
											<div class="form-group">
												<label for="new_Password" class="col-form-label">New Password</label>
												<input type="text" class="form-control" id="new_Password" placeholder="Current Password" name="new_Password">
											</div>
											<div class="form-group">
												<label for="confirm_Password" class="col-form-label">Confirm Password</label>
												<input type="text" class="form-control" id="confirm_Password" placeholder="Current Password" name="confirm_Password">
											</div>
											<button type="submit" class="btn btn-primary">Change Password</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->