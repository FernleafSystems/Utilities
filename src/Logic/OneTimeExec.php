<?php

namespace FernleafSystems\Utilities\Logic;

trait OneTimeExec {

	private bool $hasExecuted = false;

	protected function canRun() :bool {
		return true;
	}

	public function execute() {
		if ( !$this->isAlreadyExecuted() && $this->canRun() ) {
			$this->hasExecuted = true;
			$this->run();
		}
	}

	protected function isAlreadyExecuted() :bool {
		return (bool)$this->hasExecuted;
	}

	public function resetExecution() :self {
		$this->hasExecuted = false;
		return $this;
	}

	protected function run() {
	}
}