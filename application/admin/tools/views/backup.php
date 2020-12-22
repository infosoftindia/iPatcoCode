
						<div class="row gutters">
							<div class="col-12 col-md-12">
								<!-- Row start -->
								<div class="row gutters">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="card">
											<div class="card-header">Backup Tables</div>
											<div class="card-body">
												<form method="POST" action="<?=admin_url('tools/backup-table')?>">
													<?php foreach($tables as $table){ ?>
													<div class="custom-control custom-switch mb-3">
														<input type="checkbox" class="custom-control-input" name="tables[]" id="tbl_<?=$table?>" value="<?=$table?>">
														<label class="custom-control-label" for="tbl_<?=$table?>"><?=$table?></label>
													</div>
													<?php } ?>
													<div class="form-group mb-3">
														<label for="file_type">Export File Type</label>
														<select type="text" class="form-control" id="file_type" name="file_type">
															<option value="txt" >Text (SQL)</option>
															<option value="zip" >Zip</option>
															<option value="gzip" >gZip</option>
														</select>
														<label class="text-danger"></label>
													</div>
													<button type="submit" class="btn btn-success mt-4">Make Backup</button>
												</form> 
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
										<div class="card">
											<div class="card-header">Database Backup</div>
											<div class="card-body">
												<form method="POST" action="<?=admin_url('tools/backup-database')?>">
													<button type="submit" class="btn btn-success ">Make Backup</button>
												</form> 
											</div>
										</div>
									</div>
								</div>
								<!-- Row end -->
							</div>
						</div>