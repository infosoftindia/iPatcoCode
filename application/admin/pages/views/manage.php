<style>
	
</style>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Manage Pages</div>
									<div class="card-body">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th width="5%">#</th>
													<th width="55%">Title</th>
													<th width="20%">Author</th>
													<th width="5%">Views</th>
													<th width="10%">Date</th>
												</tr>
											</thead>
											<tbody>
												<?php if($posts){ $count = 1; foreach($posts as $post){ ?>
												<tr class="table-row">
													<td><?=$count++?></td>
													<td>
														<?=$post['posts_title']?>
														<p><small class="table-small">
															<a href="<?=admin_url('pages/edit/'.$post['posts_id'])?>" class="mr-1 text-success">Edit</a>
															<a href="<?=admin_url('pages/delete/'.$post['posts_id'])?>" class="mr-1 text-danger">Delete</a>
															<a href="<?=admin_url('pages/view/'.$post['posts_id'])?>" class="mr-1 text-info">View</a>
														</small>&nbsp;</p>
													</td>
													<td><?=$post['users_first_name'].' '.$post['users_last_name']?></td>
													<td><?=$count?></td>
													<td>
														<div>Published</div>
														<div><small><?=date(getenv('DateFormat'), strtotime($post['posts_created']))?></small></div>
													</td>
												</tr>
												<?php } } ?>
											</tbody>
										</table>
										<div class="text-right">
											<ul class="pagination pagination-sm float-right">
												<li class="page-item"><a class="page-link" href="#">Previous</a></li>
												<li class="page-item"><a class="page-link active" href="#">1</a></li>
												<li class="page-item"><a class="page-link" href="#">2</a></li>
												<li class="page-item"><a class="page-link" href="#">3</a></li>
												<li class="page-item"><a class="page-link" href="#">Next</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

