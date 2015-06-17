<?php

use lithium\g11n\Message;

$t = function($message, array $options = []) {
	return Message::translate($message, $options + ['scope' => 'cms_banner', 'default' => $message]);
};

$this->set([
	'page' => [
		'type' => 'multiple',
		'object' => $t('banners')
	]
]);

?>
<article>

	<div class="top-actions">
		<?= $this->html->link($t('banner'), ['action' => 'add', 'library' => 'cms_banner'], ['class' => 'button add']) ?>
	</div>

	<div class="help">
		<?= $t('Banners can be used as static banners or - when grouped - as a slideshow anywhere on your site. The name of the group gives you a hint about the location of the banner.') ?>
		<?= $t('You can set the order of the banners manually by dragging and dropping the rows in the table below.') ?>
	</div>

	<?php if ($data->count()): ?>
		<table>
			<thead>
				<tr>
					<td class="flag"><?= $t('publ.?') ?>
					<td class="media">
					<td class="emphasize"><?= $t('Title') ?>
					<td><?= $t('Group') ?>
					<td class="date modified"><?= $t('Modified') ?>
					<td class="actions">
			</thead>
			<tbody class="use-manual-sorting">
				<?php foreach ($data as $item): ?>
				<tr data-id="<?= $item->id ?>">
					<td class="flag"><i class="material-icons"><?= ($item->is_published ? 'done' : '') ?></i>
					<td class="media">
						<?php if (($media = $item->cover()) && ($version = $media->version('fix3admin'))): ?>
							<?= $this->media->image($version, [
								'data-media-id' => $media->id, 'alt' => 'preview'
							]) ?>
						<?php endif ?>
					<td class="emphasize"><?= $item->title ?: '–' ?>
					<td><?= $item->category ?>
					<td class="date modified">
						<time datetime="<?= $this->date->format($item->modified, 'w3c') ?>">
							<?= $this->date->format($item->modified, 'date') ?>
						</time>
					<td class="actions">
						<?= $this->html->link($t('delete'), ['id' => $item->id, 'action' => 'delete', 'library' => 'cms_banner'], ['class' => 'button delete']) ?>
						<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish', 'library' => 'cms_banner'], ['class' => 'button']) ?>
						<?= $this->html->link($t('open'), ['id' => $item->id, 'action' => 'edit', 'library' => 'cms_banner'], ['class' => 'button']) ?>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php else: ?>
		<div class="none-available"><?= $t('No items available, yet.') ?></div>
	<?php endif ?>
</article>