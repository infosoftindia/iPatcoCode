
						<div class="row gutters">
							<div class="col-xl-6 col-lg-6 col-md-6 offset-xl-3 offset-lg-3 offset-md-3 col-sm-12">
								<!-- Row start -->
								<div class="row gutters">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
										<div class="card">
											<div class="card-header">Media Settings</div>
											<div class="card-body">
												<form method="POST">
													<div class="form-group mb-3">
														<label for="UploadHeight">Upload Height (px)</label>
														<input type="text" class="form-control" id="UploadHeight" placeholder="Upload Height" value="<?=getenv('ImageHeight')?>" name="i_height">
													</div>
													<div class="form-group mb-3">
														<label for="UploadWidth">Upload Width (px)</label>
														<input type="text" class="form-control" id="UploadWidth" placeholder="Upload Width" value="<?=getenv('ImageWidth')?>" name="i_width">
													</div>
													<div class="form-group mb-3">
														<label for="ThumbnailHeight">Thumbnail Height (px)</label>
														<input type="text" class="form-control" id="ThumbnailHeight" placeholder="Thumbnail Height" value="<?=getenv('ThumbnailHeight')?>" name="t_height">
													</div>
													<div class="form-group mb-3">
														<label for="ThumbnailWidth">Thumbnail Width (px)</label>
														<input type="text" class="form-control" id="ThumbnailWidth" placeholder="Thumbnail Width" value="<?=getenv('ThumbnailWidth')?>" name="t_width">
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
						
                        
                        
                        