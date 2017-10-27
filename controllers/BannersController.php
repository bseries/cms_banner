<?php
/**
 * Copyright 2014 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_banner\controllers;

use lithium\util\Set;
use cms_banner\models\Banners;

class BannersController extends \base_core\controllers\BaseController {

	use \base_core\controllers\AdminIndexOrderedTrait;

	use \base_core\controllers\AdminAddTrait;
	use \base_core\controllers\AdminEditTrait;
	use \base_core\controllers\AdminDeleteTrait;

	use \base_core\controllers\AdminOrderTrait;
	use \base_core\controllers\AdminPublishTrait;

	use \base_core\controllers\UsersTrait;

	protected function _selects($item = null) {
		$regions = Banners::find('all', [
			'fields' => ['DISTINCT region as region']
		]);
		$regions = Set::extract($regions->data(), '/region');

		return compact('regions');
	}
}

?>