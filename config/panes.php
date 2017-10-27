<?php
/**
 * Copyright 2014 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
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