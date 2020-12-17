
						<div class="row gutters">
							<div class="col-xl-6 col-lg-6 col-md-6 offset-xl-3 offset-lg-3 offset-md-3 col-sm-12">
								<!-- Row start -->
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="card">
											<div class="card-header">Reading Settings</div>
											<div class="card-body">
												<form method="POST">
													<div class="form-group mb-3">
														<label for="PostPerPage">Posts Per Page</label>
														<input type="text" class="form-control" id="PostPerPage" placeholder="Posts Per Page" value="<?=getenv('PostPerPage')?>" name="post_per_page">
														<label class="text-danger"><?=form_error('post_per_page')?></label>
													</div>
													<div class="form-group mb-3">
														<label for="auto_approve_comment">Auto Approve Comment</label>
														<select size="1" class="form-control" id="auto_approve_comment" name="auto_approve_comment">
															<option value="0" <?=(getenv('AutoApproveComment') == '0')?'selected':''?>>No</option>
															<option value="1" <?=(getenv('AutoApproveComment') == '1')?'selected':''?>>Yes</option>
														</select>
														<label class="text-danger"><?=form_error('auto_approve_comment')?></label>
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