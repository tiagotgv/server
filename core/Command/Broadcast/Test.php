<?php declare(strict_types=1);

namespace OC\Core\Command\Broadcast;

use OCP\EventDispatcher\ABroadcastedEvent;
use OCP\EventDispatcher\IEventDispatcher;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Test extends Command {

	/** @var IEventDispatcher */
	private $eventDispatcher;

	public function __construct(IEventDispatcher $eventDispatcher) {
		parent::__construct();
		$this->eventDispatcher = $eventDispatcher;
	}

	protected function configure(): void {
		$this
			->setName('broadcast:test')
			->setDescription('test the SSE broadcaster')
			->addArgument(
				'channel',
				InputArgument::OPTIONAL,
				'the channel to broadcast to',
				'test'
			);
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$channel = $input->getArgument('channel');

		$event = new class($channel) extends ABroadcastedEvent {
			/** @var string */
			private $channel;

			public function __construct(string $channel) {
				parent::__construct();
				$this->channel = $channel;
			}

			public function getChannels(): array {
				return [
					$this->channel,
				];
			}

			public function jsonSerialize() {
				return [
					'test' => 'yay',
				];
			}
		};

		$this->eventDispatcher->dispatch('broadcasttest', $event);

		return 0;
	}

}
