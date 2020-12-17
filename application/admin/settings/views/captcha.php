
						<div class="row gutters">
							<div class="col-xl-6 col-lg-6 col-md-6 offset-xl-3 offset-lg-3 offset-md-3 col-sm-12">
								<!-- Row start -->
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="card">
											<div class="card-header">reCAPTCHA Settings</div>
											<div class="card-body">
												<form method="POST">
													<div class="form-group mb-3">
														<label for="captcha">Enable Captcha</label>
														<select size="1" class="form-control" id="captcha" name="captcha">
															<option value="0" <?=(getenv('Captcha') == '0')?'selected':''?>>No</option>
															<option value="1" <?=(getenv('Captcha') == '1')?'selected':''?>>Yes</option>
														</select>
														<label class="text-danger"><?=form_error('captcha')?></label>
													</div>
													<div class="form-group mb-3">
														<label for="SiteKey">Site Key</label>
														<input type="text" class="form-control" id="SiteKey" placeholder="Site Key" value="<?=getenv('CaptchaKey')?>" name="site">
														<label class="text-danger"><?=form_error('site')?></label>
													</div>
													<div class="form-group mb-3">
														<label for="SecretKey">Secret Key</label>
														<input type="text" class="form-control" id="SecretKey" placeholder="Secret Key" value="<?=getenv('CaptchaSecret')?>" name="secret">
														<label class="text-danger"><?=form_error('secret')?></label>
													</div>
													<button type="submit" class="btn btn-success ">Save Settings</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Row end -->
							</div>
						</div>