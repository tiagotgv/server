<?php declare(strict_types=1);

namespace OCP\EventDispatcher;

use JsonSerializable;

/**
 * @since 18.0.0
 */
abstract class ABroadcastedEvent extends Event implements JsonSerializable {

	/**
	 * @return string[]
	 * @since 18.0.0
	 */
	abstract public function getChannels(): array;

}
