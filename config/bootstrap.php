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

Panes::register('cms_banner', 'banners', [
	'title' => $t('Banners'),
	'group' => Panes::GROUP_AUTHORING,
	'url' => ['controller' => 'banners', 'library' => 'cms_banner', 'admin' => true]
]);
Media::registerDependent('cms_banner\models\Banners', [
	'medium' => 'direct'
]);

?>