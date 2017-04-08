<?php
/**
 * CMS Banner
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * Licensed under the AD General Software License v1.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *
 * You should have received a copy of the AD General Software
 * License. If not, see https://atelierdisko.de/licenses.
 */

namespace cms_banner\config;

use base_core\extensions\cms\Panes;
use lithium\g11n\Message;

extract(Message::aliases());

Panes::register('cms.banners', [
	'title' => $t('Banners', ['scope' => 'cms_banner']),
	'url' => ['controller' => 'banners', 'action' => 'index', 'library' => 'cms_banner', 'admin' => true],
	'weight' => 50
]);

?>