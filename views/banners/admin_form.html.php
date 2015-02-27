<?php

$this->set([
	'page' => [
		'type' => 'single',
		'title' => $item->title,
		'empty' => $t('untitled'),
		'object' => $t('banner')
	],
	'meta' => [
		'is_published' => $item->is_published ? $t('published') : $t('unpublished')
	]
]);

?>
<article class="view-<?= $this->_config['controller'] . '-' . $this->_config['template'] ?>">
	<?=$this->form->create($item) ?>
		<?= $this->form->field('id', ['type' => 'hidden']) ?>

		<div class="grid-row">
			<div class="grid-column-left">
				<?php if ($isTranslated): ?>
					<?php foreach ($item->translate('title') as $locale => $value): ?>
						<?= $this->form->field("i18n.title.{$locale}", [
							'type' => 'text',
							'label' => $t('Title') . ' (' . $this->g11n->name($locale) . ')',
							'class' => 'use-for-title',
							'value' => $value
						]) ?>
					<?php endforeach ?>
				<?php else: ?>
					<?= $this->form->field('title', [
						'type' => 'text',
						'label' => $t('Title'),
						'class' => 'use-for-title'
					]) ?>
				<?php endif ?>
			</div>
			<div class="grid-column-right">
				<div class="media-attachment use-media-attachment-direct">
					<?= $this->form->label('BannerCoverMediaId', $t('Medium')) ?>
					<?= $this->form->hidden('cover_media_id') ?>
					<div class="selected"></div>
					<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
				</div>
			</div>
		</div>

		<div class="grid-row">
			<div class="grid-column-left">
			</div>
			<div class="grid-column-right">
				<?= $this->form->field('category', ['type' => 'text', 'label' => $t('Category'), 'value' => $item->category ?: 'default']) ?>
				<div class="help"><?= $t('Category can be an abstract name by which you want to group banners or indicate the location of the banner group on the site.') ?></div>

				<?= $this->form->field('url', [
					'type' => 'text',
					'label' => $t('Link'),
					'placeholder' => $t('https://foo.com/bar or /bar')]
				) ?>
				<div class="help"><?= $t('Provide an URL to make the banner clickable.') ?></div>
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
				<?php if ($isTranslated): ?>
					<?php foreach ($item->translate('body') as $locale => $value): ?>
						<?= $this->form->field("i18n.body.{$locale}", [
							'type' => 'textarea',
							'label' => $t('Text') . ' (' . $this->g11n->name($locale) . ')',
							'wrap' => ['class' => 'body use-editor editor-basic editor-link'],
							'value' => $value
						]) ?>
					<?php endforeach ?>
				<?php else: ?>
					<?= $this->form->field('body', [
						'type' => 'textarea',
						'label' => $t('Text'),
						'wrap' => ['class' => 'body use-editor editor-basic editor-link']
					]) ?>
				<?php endif ?>
			</div>
			<div class="grid-column-right">
			</div>
		</div>
		<div class="bottom-actions">
			<?php if ($item->exists()): ?>
				<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish', 'library' => 'cms_banner'], ['class' => 'button large']) ?>
			<?php endif ?>
			<?= $this->form->button($t('save'), ['type' => 'submit', 'class' => 'large save']) ?>
		</div>
	<?=$this->form->end() ?>
</article>