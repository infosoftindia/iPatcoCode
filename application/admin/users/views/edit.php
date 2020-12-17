
						<style>
							.custom-file {
								width: 100% !important;
							}
							.thumbnail-h-180{
								max-height: 180px !important;
								width: 100% !important;
								object-fit: cover;
								border: 1px solid #179978;
								border-radius: 5px;
								margin-bottom: 5px;
							}

							.thumbnail-h-100{
								height: 100px;
								object-fit: cover;
								padding: 3px;
								border-radius: 10px;
							}
							label.text-danger{
								margin: 0;
							}
							label.text-danger p{
								margin: 0;
							}
						</style>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<!-- Row start -->
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="card">
											<div class="card-header">Add New User</div>
											<div class="card-body">
												<form method="POST">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group mb-3">
																<label for="fname">First Name</label>
																<input type="text" class="form-control" id="fname" placeholder="First Name" value="<?=(set_value('fname') == '')?$user['users_first_name']:set_value('fname')?>" name="fname">
																<label class="text-danger"><?=form_error('fname')?></label>
															</div>
															<div class="form-group mb-3">
																<label for="lname">Last Name</label>
																<input type="text" class="form-control" id="lname" placeholder="Last Name" value="<?=(set_value('lname') == '')?$user['users_last_name']:set_value('lname')?>" name="lname">
																<label class="text-danger"><?=form_error('lname')?></label>
															</div>
															<div class="form-group mb-3">
																<label for="email">Email</label>
																<input type="text" class="form-control" id="email" placeholder="Email" value="<?=(set_value('email') == '')?$user['users_email']:set_value('email')?>" name="email">
																<label class="text-danger"><?=form_error('email')?></label>
															</div>
															<div class="form-group mb-3">
																<label for="mobile">Mobile</label>
																<input type="text" class="form-control" id="mobile" placeholder="Mobile" value="<?=(set_value('mobile') == '')?$user['users_mobile']:set_value('mobile')?>" name="mobile">
																<label class="text-danger"><?=form_error('mobile')?></label>
															</div>
															<div class="form-group mb-3">
																<label for="role">Role</label>
																<select type="text" class="form-control" id="role" name="role">
																	<option value="121" <?=$user['users_role'] == '121'?'selected':''?>>Admin</option>
																	<option value="1" <?=$user['users_role'] == '1'?'selected':''?>>User</option>
																	<option value="2" <?=$user['users_role'] == '2'?'selected':''?>>Vendor</option>
																</select>
																<label class="text-danger"><?=form_error('role')?></label>
															</div>
															<button type="submit" class="btn btn-success ">Save</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Row end -->
							</div>
						</div>