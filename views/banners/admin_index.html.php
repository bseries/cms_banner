<?php

$this->set([
	'page' => [
		'type' => 'multiple',
		'object' => $t('banners')
	]
]);

?>
<article class="view-<?= $this->_config['controller'] . '-' . $this->_config['template'] ?>">

	<div class="top-actions">
		<?= $this->html->link($t('new banner'), ['action' => 'add', 'library' => 'cms_banner'], ['class' => 'button add']) ?>
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
					<td class="date created"><?= $t('Created') ?>
					<td class="actions">
			</thead>
			<tbody class="use-manual-sorting">
				<?php foreach ($data as $item): ?>
				<tr data-id="<?= $item->id ?>">
					<td class="flag"><?= ($item->is_published ? '✓' : '×') ?>
					<td class="media">
						<?php if (($media = $item->cover()) && ($version = $media->version('fix3admin'))): ?>
							<?= $this->media->image($version, [
								'data-media-id' => $media->id, 'alt' => 'preview'
							]) ?>
						<?php endif ?>
					<td class="emphasize"><?= $item->title ?: '–' ?>
					<td><?= $item->category ?>
					<td class="date created">
						<time datetime="<?= $this->date->format($item->created, 'w3c') ?>">
							<?= $this->date->format($item->created, 'date') ?>
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