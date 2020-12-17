
	<form method="POST" action="<?=admin_url('posts/categories/update/'.$category->categories_id)?>">
		<div class="form-group mb-3">
			<label for="name">Category Name</label>
			<input type="text" class="form-control" id="name" placeholder="Category Name" value="<?=$category->categories_name?>" name="name">
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="sku">Parents</label>
				<select class="form-control" name="parent">
					<option value="">Choose Parent Category</option>
					<?php if($categories){ foreach($categories as $cat){ ?>
					<option value="<?=$cat->categories_id?>" <?=$category->categories_parent == $cat->categories_id ? 'selected' : ''?>><?=$cat->categories_name?></option>
					<?php } } ?>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="description">Category Description</label>
				<textarea class="form-control" id="description" rows="2" placeholder="Category Description" name="description"><?=getCategoryMeta($category->categories_id, '_description')?></textarea>
			</div>
		</div>
		<div class="form-group mb-3">
			<label for="status">Status</label>
			<select class="form-control" id="status" name="status">
				<option value="1" <?=$category->categories_status == '1'?'selected':''?>>Active</option>
				<option value="0" <?=$category->categories_status == '0'?'selected':''?>>Inactive</option>
			</select>
		</div>
		<button type="submit" class="btn btn-success ">Update Category</button>
	</form>

