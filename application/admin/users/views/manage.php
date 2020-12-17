<style>
	.user-thumbnail{
		width: 50px;
		height: 50px;
		object-fit: cover;
	}
</style>
						<div class="row gutters">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">Manage Users</div>
									<div class="card-body">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th width="">#</th>
													<th width="">Full Name</th>
													<th width="">Email</th>
													<th width="">Role</th>
													<th width="">Posts</th>
												</tr>
											</thead>
											<tbody>
												<?php if($users){ $count = 1; foreach($users as $user){ ?>
												<tr class="table-row">
													<td><?=$count++?></td>
													<td>
														<img src="<?=base_url(getenv('uploads').(($user['users_profile'] == '')?'temp.png':$user['users_profile']))?>" class="user-thumbnail">
														<?=$user['users_first_name'].' '.$user['users_last_name']?>
														<p><small class="table-small">
															<a href="<?=admin_url('users/edit/'.$user['users_id'])?>" class="mr-1 text-success">Edit</a>
															<a href="<?=admin_url('users/delete/'.$user['users_id'])?>" class="mr-1 text-danger">Delete</a>
															<a href="" class="mr-1 text-info">View</a>
														</small>&nbsp;</p>
													</td>
													<td>
														<div><?=$user['users_email']?></div>
														<div><small><?=date(getenv('DateFormat'), strtotime($user['users_created']))?></small></div>
													</td>
													<td><?=($user['users_role'] == 1)?'Regular User':(($user['users_role'] == 121)?'Admin':(($user['users_role'] == 2)?'Vendor':'Unknown'))?></td>
													<td>
														<div><?=$user['total_posts']?></div>
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

