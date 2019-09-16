<?php declare(strict_types=1);

namespace OCP\Broadcast\Events;

use JsonSerializable;

/**
 * @since 18.0.0
 */
interface IBroadcastEvent {

	/**
	 * @since 18.0.0
	 * @return string the name of the event
	 */
	public function getName(): string;

	/**
	 * @since 18.0.0
	 * @return string[]
	 */
	public function getChannels(): array;

	/**
	 * @since 18.0.0
	 * @return JsonSerializable the data to be sent to the client
	 */
	public function getPayload(): JsonSerializable;

}
