<?php
/**
 * CMS Banner
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 */

use base_core\extensions\cms\Panes;
use lithium\g11n\Message;

extract(Message::aliases());

Panes::register('authoring.banners', [
	'title' => $t('Banners'),
	'url' => ['controller' => 'banners', 'action' => 'index', 'library' => 'cms_banner', 'admin' => true]
]);

?>