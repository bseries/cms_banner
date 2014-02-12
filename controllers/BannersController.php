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

namespace cms_banner\controllers;

use cms_banner\models\Banners;
use lithium\g11n\Message;
use li3_flash_message\extensions\storage\FlashMessage;

class BannersController extends \lithium\action\Controller {

	public function admin_index() {
		$data = Banners::find('all', [
			'with' => 'CoverMedia',
			'order' => ['order' => 'DESC']
		]);
		return compact('data');
	}

	public function admin_add() {
		extract(Message::aliases());

		$item = Banners::create(['group' => 'default']);

		if ($this->request->data) {
			if ($item->save($this->request->data)) {
				FlashMessage::write($t('Successfully saved.'));
				return $this->redirect(['action' => 'index', 'library' => 'cms_banner']);
			} else {
				FlashMessage::write($t('Failed to save.'));
			}
		}
		$this->_render['template'] = 'admin_form';
		return compact('item');
	}

	public function admin_edit() {
		extract(Message::aliases());

		$item = Banners::find($this->request->id);

		if ($this->request->data) {
			if ($item->save($this->request->data)) {
				FlashMessage::write($t('Successfully saved.'));
				return $this->redirect(['action' => 'index', 'library' => 'cms_banner']);
			} else {
				FlashMessage::write($t('Failed to save.'));
			}
		}
		$this->_render['template'] = 'admin_form';
		return compact('item');
	}

	public function admin_delete() {
		extract(Message::aliases());

		$item = Banners::find($this->request->id);
		$item->delete();
		FlashMessage::write($t('Successfully deleted.'));

		return $this->redirect(['action' => 'index', 'library' => 'cms_banner']);
	}

	public function admin_publish() {
		extract(Message::aliases());

		$item = Banners::find($this->request->id);
		$item->save(['is_published' => true]);
		FlashMessage::write($t('Successfully published.'));

		return $this->redirect(['action' => 'index', 'library' => 'cms_banner']);
	}

	public function admin_unpublish() {
		extract(Message::aliases());

		$item = Banners::find($this->request->id);
		$item->save(['is_published' => false]);
		FlashMessage::write($t('Successfully unpublished.'));

		return $this->redirect(['action' => 'index', 'library' => 'cms_banner']);
	}

	public function admin_order() {
		extract(Message::aliases());

		$ids = $this->request->data['ids'];

		Banners::weightSequence($ids);
		FlashMessage::write($t('Successfully updated order.'));

		return $this->redirect(['action' => 'index', 'library' => 'cms_banner']);
	}
}

?>