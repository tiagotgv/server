<?php declare(strict_types=1);

namespace OC\Broadcast\Events;

use JsonSerializable;
use OCP\Broadcast\Events\IBroadcastEvent;
use OCP\EventDispatcher\ABroadcastedEvent;
use OCP\EventDispatcher\Event;

class BroadcastEvent extends Event implements IBroadcastEvent {

	/** @var string */
	private $name;

	/** @var ABroadcastedEvent */
	private $event;

	public function __construct(string $name,
								ABroadcastedEvent $event) {
		parent::__construct();

		$this->name = $name;
		$this->event = $event;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getChannels(): array {
		return $this->event->getChannels();
	}

	public function getPayload(): JsonSerializable {
		return $this->event;
	}

}
