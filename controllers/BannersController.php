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