
						<div class="row gutters">
							<div class="col-12 col-md-12">
								<!-- Row start -->
								<form method="POST" enctype="multipart/form-data">
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="card">
											<div class="card-header">SEO</div>
											<div class="card-body">
												<div class="form-group mb-3">
													<label for="name">Meta Title</label>
													<input type="text" class="form-control" id="name" placeholder="Meta Title" value="<?=$titles['settings_value']?>" name="title">
												</div>
												<div class="form-group  mb-3">
													<label for="description">Meta Description</label>
													<textarea class="form-control" id="description" rows="2" placeholder="Meta Description" name="description"><?=@$description['settings_value']?></textarea>
												</div>
												<button type="submit" class="btn btn-success ">Save</button>
											</div>
										</div>
									</div>
								</div>
								</form>
								<!-- Row end -->
							</div>
						</div>
						