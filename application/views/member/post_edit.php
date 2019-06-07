<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
	<div class="card-header">
		<h5 class="card-title"><?=lang_line('post_title_edit_post');?></h5>
	</div>
	<div class="card-body">
		<?php
			echo form_open('', 'id="form_post_update" autocomplete="off"');
			echo form_hidden('pk', encrypt($result_post['post_id']));
		?>
		<div class="row post">
			<!-- Left -->
			<div class="col-lg-9">
				<div class="form-group">
					<input type="text" name="title" class="form-control post-title" placeholder="Title" value="<?=$result_post['post_title'];?>">
				</div>
				<br>
				<div class="form-group">
					<label for="Content"><?=lang_line('post_label_content');?></label>
					<div class="pull-right">
						<div class="btn-group">
							<button type="button" class="tiny-text btn btn-sm btn-default">Text</button>
							<button type="button" class="tiny-visual btn btn-sm btn-default">Visual</button>
						</div>
					</div>
					<textarea name="content" id="Content" class="form-control post-content" cols="30" rows="10"><?=$result_post['post_content'];?></textarea>
				</div>
			</div>
			<!--/ Left -->
			<!-- Right -->
			<div class="col-lg-3" style="min-width:120px;">
				<div id="sticky">
					<div class="accordion post-setting" id="accordionPostX">
						<!-- Category -->
						<div class="card">
							<div class="card-header" id="collapse-category">
								<button class="btn btn-link" type="button" data-toggle="collapse" aria-expanded="true" data-target="#collapseCategory" aria-controls="collapseCategory"><?=lang_line('post_label_category');?></button>
							</div>
							<div id="collapseCategory" class="collapse" aria-labelledby="collapse-category" data-parent="#accordionPost">
								<div class="card-body">
									<div id="select-category"></div>
									<select name="category" class="select-category" data-placeholder="- <?=lang_line('post_label_category');?> -">
										<?php
											echo '<option value="'. encrypt($result_post['category_id']) .'">'. $result_post['category_title'] .'</option>';
										?>
									</select>
								</div>
							</div>
						</div>
						<!--/ Category -->
						
						<!-- Tags -->
						<div class="card">
							<div class="card-header" id="collapsed-tags">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsedTags" aria-expanded="false" aria-controls="collapsedTags"><?=lang_line('post_label_tags');?></button>
							</div>
							<div id="collapsedTags" class="collapse" aria-labelledby="collapsed-tags" data-parent="#accordionPost">
								<div class="card-body">
									<?php
										$valtag = $this->CI->post_model->valtag($result_post['post_tag']);
									?>
									<input id="tagsjs" type="text" name="tags" placeholder="Input Tag" class="form-control" value="<?=$valtag;?>">
								</div>
							</div>
						</div>
						<!--/ Tags -->

						<!-- Picture -->
						<div class="card">
							<div class="card-header" id="collapsed-picture">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsedPicture" aria-expanded="false" aria-controls="collapsedPicture"><?=lang_line('post_label_picture');?></button>
							</div>
							<div id="collapsedPicture" class="collapse show" aria-labelledby="collapsed-picture" data-parent="#accordionPost">
								<div class="card-body">
									<!-- Picture -->
									<div class="text-center mb-2">
										<img id="image-preview" src="<?=post_images($result_post['picture'] ,'', TRUE);?>" class="imgprv">
									</div>
									<div class="custom-file">
										<input id="picture" type="file" accept="image/*" name="fupload" class="custom-file-input picture">
										<label class="custom-file-label" for="picture">
											<?php
												$pict = explode('/', $result_post['picture']);
												$arrp = count($pict)-1;
											?>
											<span class="d-inline-block text-truncate w-75"><?=$pict[$arrp]?></span>
										</label>
									</div>
									<!--/ Picture -->

									<!-- Image descrption -->
									<div class="mt-3">
										<label><?=lang_line('post_label_caption');?></label>
										<textarea name="image_caption" class="form-control" maxlength="100"><?=$result_post['image_caption'];?></textarea>
									</div>
									<!--/ Image descrption -->
								</div>
							</div>
						</div>
						<!--/ Picture -->
					</div>

					<hr>
					
					<div>
						<button type="submit" class="btn_submit_post btn btn-primary"><i class="fa fa-save mr-2"></i> <?=lang_line('button_save')?></button>
						<button type="button" class="btn btn-danger pull-right" onclick="location=href='<?=member_url($this->mod)?>'"><i class="fa fa-times"></i> <?=lang_line('button_cancel')?></button>
					</div>
				</div>
			</div>
			<!--/ Right -->
		</div>
		<?=form_close();?>
	</div>
</div>