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

namespace cms_banner\models;

use lithium\g11n\Message;

class Banners extends \base_core\models\Base {

	public $belongsTo = [
		'CoverMedia' => [
			'to' => 'base_media\models\Media',
			'key' => 'cover_media_id'
		]
	];

	protected static $_actsAs = [
		'base_core\extensions\data\behavior\Ownable',
		'base_media\extensions\data\behavior\Coupler' => [
			'bindings' => [
				'cover' => [
					'type' => 'direct',
					'to' => 'cover_media_id'
				]
			]
		],
		'base_core\extensions\data\behavior\Timestamp',
		'base_core\extensions\data\behavior\Sortable' => [
			'field' => 'order',
			'cluster' => []
		],
		'base_core\extensions\data\behavior\Searchable' => [
			'fields' => [
				'title',
				'category',
				'modified'
			]
		]
	];

	public static function init() {
		extract(Message::aliases());
		$model = static::_object();

		$model->validates['cover_media_id'] = [
			[
				'notEmpty',
				'on' => ['create', 'update'],
				'message' => $t('You must select on medium.', ['scope' => 'cms_banner'])
			]
		];
		$model->validates['category'] = [
			[
				'notEmpty',
				'on' => ['create', 'update'],
				'message' => $t('Need a category.', ['scope' => 'cms_banner'])
			]
		];

		if (PROJECT_LOCALE !== PROJECT_LOCALES) {
			static::bindBehavior('li3_translate\extensions\data\behavior\Translatable', [
				'fields' => ['title', 'body'],
				'locale' => PROJECT_LOCALE,
				'locales' => explode(' ', PROJECT_LOCALES),
				'strategy' => 'inline'
			]);
		}
	}
}

Banners::init();

?>