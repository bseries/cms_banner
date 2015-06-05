<?php

use lithium\g11n\Message;

$t = function($message, array $options = []) {
	return Message::translate($message, $options + ['scope' => 'cms_banner', 'default' => $message]);
};

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
							'class' => $locale === PROJECT_LOCALE ? 'use-for-title' : null,
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
						<?= $this->editor->field("i18n.body.{$locale}", [
							'label' => $t('Description') . ' (' . $this->g11n->name($locale) . ')',
							'size' => 'gamma',
							'features' => 'minimal',
							'value' => $value
						]) ?>
				<?php endforeach ?>
				<?php else: ?>
					<?= $this->editor->field('body', [
						'label' => $t('Description'),
						'size' => 'gamma',
						'features' => 'minimal'
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