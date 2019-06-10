<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h3>
				<span class="font-weight-semibold"><?php echo lang_line('mod_title'); ?></span>
			</h3>
		</div>
	</div>
	<div class="breadcrumb-line breadcrumb-line-light">
		<div class="breadcrumb">
			<a href="<?php echo admin_url('home'); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> <?php echo lang_line('admin_link_home') ?></a>
			<span class="breadcrumb-item"><?php echo lang_line('mod_title'); ?></span>
			<span class="breadcrumb-item"><?php echo lang_line('mod_title_add'); ?></span>
		</div>
	</div>
</div>

<div class="content">
	<div class="block">
		<div class="block-header">
			<h3><?php echo lang_line('mod_title_add');?></h3>
		</div>
		<div class="box-content">
			<?=form_open('','id="form_add" autocomplete="off"');?>
			<div class="row">
				<div class="col-md-9">
					<!-- Title -->
					<div class="form-group mb-4">
						<input type="text" name="title" id="title" class="form-control post-title-input" value="<?=set_value('title'); ?>" placeholder="<?=lang_line('form_label_title');?>">
						<input id="seotitle" type="hidden" name="seotitle" value="<?=set_value('seotitle');?>" readonly>
					</div>
					<!--/ Title -->

					<!-- Content -->
					<div class="form-group mb-0">
						<label class="mb-1"><?=lang_line('form_label_content');?></label>
						<span class="btn-group pull-right">
							<button type="button" id="tiny-text" class="button btn-xs btn-default btn-flat">Text</button type="button">
							<button type="button" id="tiny-visual" class="button btn-xs btn-default btn-flat">Visual</button type="button">
						</span>
						<div class="clearfix"></div>
						<textarea id="Content" name="content" class="form-control" rows="20" style="border-radius:0px;">
							<?= set_value('content');?>
						</textarea>
						<div class="form-input-error"><?=form_error('content');?></div>
					</div>
					<!--/ Content -->
				</div>

				<div class="col-md-3" style="min-width:120px;">
					<div id="sticky" class="bg-white">
						<div class="accordion post-setting" id="accordionPost">
							<!-- Status -->
							<div class="card">
								<div class="card-header" id="collapse-category">
									<button class="btn btn-link" type="button" data-toggle="collapse" aria-expanded="true" data-target="#collapseStatus" aria-controls="collapseStatus">Status</button>
								</div>
								<div id="collapseStatus" class="collapse show" aria-labelledby="collapse-status" data-parent="#accordionPost">
									<div class="card-body">
										<!-- active -->
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="cActive" name="active" value="1">
											<label class="form-check-label" for="cActive"><?=lang_line('form_label_active');?></label>
										</div>
										<!--/ active -->
										<!-- headline -->
										<div class="form-check">
											<input class="form-check-input" type="checkbox" id="cHeadline" name="headline" value="1">
											<label class="form-check-label" for="cHeadline"><?=lang_line('form_label_headline');?></label>
										</div>
										<!--/ headline -->
									</div>
								</div>
							</div>
							<!--/ Status -->

							<!-- Category -->
							<div class="card">
								<div class="card-header" id="collapse-category">
									<button class="btn btn-link" type="button" data-toggle="collapse" aria-expanded="true" data-target="#collapseCategory" aria-controls="collapseCategory"><?=lang_line('form_label_category');?></button>
								</div>
								<div id="collapseCategory" class="collapse" aria-labelledby="collapse-category" data-parent="#accordionPost">
									<div class="card-body">
										<div id="select-category"></div>
										<select name="category" class="select-category" data-placeholder="- <?=lang_line('form_label_category');?> -">
											<option value="<?=encrypt('1')?>">Uncategory</option>
										</select>
										<div class="mt-2">
											<small><b><a href="<?=admin_url('category/add-new')?>" target="_blank" class="mt-8"><i class="icon-plus-circle2"></i> <?=lang_line('button_add_new')?></a></b></small>
										</div>
									</div>
								</div>
							</div>
							<!--/ Category -->
							
							<!-- Tags -->
							<div class="card">
								<div class="card-header" id="collapsed-tags">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsedTags" aria-expanded="false" aria-controls="collapsedTags">
										<?=lang_line('form_label_tag');?>
									</button>
								</div>
								<div id="collapsedTags" class="collapse" aria-labelledby="collapsed-tags" data-parent="#accordionPost">
									<div class="card-body">
										<input id="tagsjs" type="text" name="tags" placeholder="Input Tag"  value="<?= set_value('tags');?>" class="form-control">
										<div class="mt-2">
											<small><b><a href="<?=admin_url('tag')?>" target="_blank" class="mt-8"><i class="icon-plus-circle2"></i> <?=lang_line('button_add_new')?></a></b></small>
										</div>
									</div>
								</div>
							</div>
							<!--/ Tags -->

							<!-- Picture -->
							<div class="card">
								<div class="card-header" id="collapsed-picture">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsedPicture" aria-expanded="false" aria-controls="collapsedPicture">
										<?=lang_line('form_label_picture');?>
									</button>
								</div>
								<div id="collapsedPicture" class="collapse" aria-labelledby="collapsed-picture" data-parent="#accordionPost">
									<div class="card-body">
										<!-- Picture -->
										<div>
											<a class="browse-files" href="<?=content_url('plugins/filemanager/dialog.php?type=1&relative_url=1&field_id=picture&sort_by=date&descending=1&akey=' . login_key('admin'));?>">
												<img id="imgprv" class="" src="<?=post_images('', '', TRUE);?>" style="width:100%;max-width:115px;">
											</a>
											<div class="mt-2">
												<span id="delpict" class="button btn-xs btn-default"><i class="icon-bin"></i> <?=lang_line('button_delete');?> <?=lang_line('form_label_picture');?></span>
											</div>
											<input id="picture" type="hidden" name="picture">
										</div>
										<!--/ Picture -->

										<!-- Image descrption -->
										<div class="mt-3 form-groupX">
											<label><?=lang_line('form_label_caption');?></label>
											<textarea name="image_caption" class="form-control" maxlength="100"></textarea>
										</div>
										<!--/ Image descrption -->
									</div>
								</div>
							</div>
							<!--/ Picture -->

							<!-- Date Publish -->
							<div class="card">
								<div class="card-header" id="collapsed-datetime">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsedDateTime" aria-expanded="false" aria-controls="collapsedDateTime">
										<?=lang_line('form_label_date');?>
									</button>
								</div>
								<div id="collapsedDateTime" class="collapse" aria-labelledby="collapsed-datetime" data-parent="#accordionPost">
									<div class="card-body">

										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-date"><i class="fa fa-calendar"></i></span>
											</div>
											<input type="text" id="publishdate" name="datepost" class="form-control" aria-label="Date" aria-describedby="basic-date" value="<?=date('Y-m-d');?>" required>
										</div>

										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-time"><i class="fa fa-clock-o"></i></span>
											</div>
											<input type="text" id="publishtime" name="timepost" class="form-control" aria-label="Time" aria-describedby="basic-time" value="<?=date('H:i:s');?>" required>
										</div>
									</div>
								</div>
							</div>
							<!--/ Date Publish -->
						</div>
						<hr>
						<div>
							<button type="submit" class="button btn-primary submit_add"><i id="submit_icon" class="fa fa-check mr-2"></i>Submit</button>
							<a href="<?=admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?=lang_line('button_cancel');?></a>
						</div>
					</div>
				</div>
			</div>
			<?=form_close();?>
		</div>
	</div>
</div>