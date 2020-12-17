
						<div class="row gutters">
							<div class="col-xl-6 col-lg-6 col-md-6 offset-xl-3 offset-lg-3 offset-md-3 col-sm-12">
								<!-- Row start -->
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="card">
											<div class="card-header">Email Settings</div>
											<div class="card-body">
												<form method="POST">
													<div class="form-group mb-3">
														<label for="server">Server</label>
														<input type="text" class="form-control" id="server" placeholder="Server Url" value="<?=getenv('MailServer')?>" name="server">
														<label class="text-danger"><?=form_error('server')?></label>
													</div>
													<div class="form-group mb-3">
														<label for="port">Port</label>
														<input type="text" class="form-control" id="port" placeholder="Port" value="<?=getenv('MailPort')?>" name="port">
														<label class="text-danger"><?=form_error('port')?></label>
													</div>
													<div class="form-group mb-3">
														<label for="username">Username</label>
														<input type="text" class="form-control" id="username" placeholder="Username" value="<?=getenv('MailUser')?>" name="username">
														<label class="text-danger"><?=form_error('username')?></label>
													</div>
													<div class="form-group mb-3">
														<label for="password">Password</label>
														<input type="text" class="form-control" id="password" placeholder="Password" value="<?=getenv('MailPassword')?>" name="password">
														<label class="text-danger"><?=form_error('password')?></label>
													</div>
													<div class="form-group mb-3">
														<label for="encryption">Encryption</label>
														<select size="1" class="form-control" id="encryption" name="encryption">
															<option value="" <?=(getenv('MailCrypto') == '')?'selected':''?>>None</option>
															<option value="tls" <?=(getenv('MailCrypto') == 'tls')?'selected':''?>>TLS</option>
															<option value="ssl" <?=(getenv('MailCrypto') == 'ssl')?'selected':''?>>SSL</option>
														</select>
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