<?php

$dateFormatter = new IntlDateFormatter(
	'de_DE',
	IntlDateFormatter::SHORT,
	IntlDateFormatter::SHORT
);

?>
<article class="view-<?= $this->_config['controller'] . '-' . $this->_config['template'] ?>">
	<h1 class="alpha"><?= $t('Banners') ?></h1>

	<nav class="actions">
		<?= $this->html->link($t('new banner'), ['action' => 'add', 'library' => 'cms_banner'], ['class' => 'button']) ?>
	</nav>

	<?php if ($data->count()): ?>
		<table>
			<thead>
				<tr>
					<td><?= $t('publ.?') ?>
					<td>
					<td><?= $t('Title') ?>
					<td><?= $t('Group') ?>
					<td><?= $t('Created') ?>
					<td><?= $t('Modified') ?>
					<td>
			</thead>
			<tbody class="use-manual-sorting">
				<?php foreach ($data as $item): ?>
				<tr data-id="<?= $item->id ?>">
					<td>
						<?= ($item->is_published ? '✓' : '╳') ?>
					<td>
						<?php if (($media = $item->cover()) && ($version = $media->version('fix3'))): ?>
							<?= $this->media->image($version->url('http'), ['class' => 'media']) ?>
						<?php endif ?>
					<td><?= $item->title ?>
					<td><?= $item->group ?>
					<td>
						<?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $item->created, new DateTimeZone('Europe/Berlin')) ?>
						<time datetime="<?= $date->format(DateTime::W3C) ?>"><?= $dateFormatter->format($date) ?></time>
					<td>
						<?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $item->modified, new DateTimeZone('Europe/Berlin')) ?>
						<time datetime="<?= $date->format(DateTime::W3C) ?>"><?= $dateFormatter->format($date) ?></time>
					<td>
						<nav class="actions">
							<?= $this->html->link($t('delete'), ['id' => $item->id, 'action' => 'delete', 'library' => 'cms_banner'], ['class' => 'button']) ?>
							<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish', 'library' => 'cms_banner'], ['class' => 'button']) ?>
							<?= $this->html->link($t('edit'), ['id' => $item->id, 'action' => 'edit', 'library' => 'cms_banner'], ['class' => 'button']) ?>
						</nav>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php else: ?>
		<div class="none-available"><?= $t('No banners available, yet.') ?></div>
	<?php endif ?>
</article>