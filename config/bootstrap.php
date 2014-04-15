<?php
/**
 * Bureau Banner
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 */

use cms_core\extensions\cms\Panes;
use lithium\g11n\Message;
use cms_media\models\Media;

extract(Message::aliases());

$base = ['controller' => 'banners', 'library' => 'cms_banner', 'admin' => true];
Panes::registerActions('cms_banner', 'authoring', [
	$t('List Banners') => ['action' => 'index'] + $base,
	$t('New Banner') => ['action' => 'add'] + $base
]);

Media::registerDependent('cms_banner\models\Banners', [
	'medium' => 'direct'
]);

?>