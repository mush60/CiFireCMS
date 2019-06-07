<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-inline">
		<div class="page-title">
			<h3>
				<span class="font-weight-semibold"><?=lang_line('mod_title');?></span>
			</h3>
		</div>
	</div>
	<div class="breadcrumb-line breadcrumb-line-light">
		<div class="breadcrumb">
			<a href="<?=admin_url('home');?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> <?=lang_line('admin_link_home');?></a>
			<span class="breadcrumb-item"><?=lang_line('mod_title');?></span>
			<span class="breadcrumb-item"><?=lang_line('mod_title_reply');?></span>
		</div>
	</div>
</div>

<div class="content">
	<?=$this->alert->show($this->mod); ?>
	<div class="ajax_alert" style="display:none;"></div>

	<div class="block">
		<div class="block-header">
			<h3><?=lang_line('mod_title_reply');?></h3>
		</div>
			<?=form_open();?>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label><?=lang_line('form_label_to')?></label>
							<input type="text" class="form-control" value="<?=$res_mail['email']?>" disabled>
							<input type="hidden" name="to" class="form-control" value="<?=$res_mail['email']?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label><?=lang_line('form_label_subject')?></label>
							<input type="text" name="subject" class="form-control" value="<?=$res_mail['subject']?>">
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-12">
						<div class="form-group">
							<label for="Content"><?=lang_line('form_label_message')?></label>
							<textarea name="message" id="Content" cols="30" rows="10"></textarea>
						</div>
					</div>
				</div>
				<hr>
				<div class="block-actions">
					<button type="submit" class="button btn-primary mr-2"><i class="fa fa-check mr-2"></i><?=lang_line('button_submit');?></button>
					<a href="<?=admin_url($this->mod);?>" class="button btn-default pull-right"><i class="fa fa-times mr-2"></i><?=lang_line('button_cancel');?></a>
				</div>
			</div>
		</div>
			<?=form_close();?>
	</div>
</div>