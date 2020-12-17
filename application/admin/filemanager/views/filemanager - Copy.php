
						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">File Manager</div>
									<div class="card-body">
										<!-- Row start -->
										<div class="row gutters">
											
										</div>
										<div class="row gutters">
											<?php
												$medias = array_diff(scandir(getenv('uploads')), array('.', '..', '.htaccess'));
												if($medias){ foreach($medias as $media){
											?>
											<div class="col-xl-2 col-lg-2 col-md-2 col-sm-4">
												<label for="" class="my-2">
													<img src="<?=base_url(getenv('uploads').$media)?>" class="img-fluid h-100">
													<input type="checkbox">
												</label>
											</div>
												<?php } } ?>
										</div>
										<!-- Row end -->
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->
					</div>
					<!-- END: .main-content -->