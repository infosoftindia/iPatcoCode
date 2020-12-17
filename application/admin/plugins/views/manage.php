<style>
	
</style>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Manage Plugins</div>
									<div class="card-body">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th width="5%">#</th>
													<th width="20%">Name</th>
													<th width="20%">Author</th>
													<th width="55%">Description</th>
												</tr>
											</thead>
											<tbody>
												<?php if($plugins){ $count = 1; foreach($plugins as $plugin){ ?>
												<tr class="table-row">
													<td><?=$count++?></td>
													<td>
														<?=$plugin['name']?>
														<p><small class="table-small">
															<a href="<?=admin_url('plugins/delete/'.$plugin['slug'])?>" class="mr-1 text-danger">Delete</a>
														</small>&nbsp;</p>
													</td>
													<td><?=$plugin['author']?></td>
													<td><?=$plugin['description']?></td>
												</tr>
												<?php } } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

