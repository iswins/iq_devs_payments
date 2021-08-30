<?php
/**
 * Created by v.taneev.
 */


namespace App\Services;

use App\Jobs\IncomingJobInterface;
use Exception;
use App\Services\Interfaces\MessageHandlerInterface;
use App\Services\Interfaces\PaymentStrategyInterface;

class LaravelMessageHandler implements MessageHandlerInterface
{

    protected PaymentStrategyInterface $strategy;
    protected $answerQueue = null;

    public function __construct (PaymentStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @return PaymentStrategyInterface
     */
    public function getStrategy (): PaymentStrategyInterface
    {
        return $this->strategy;
    }


    public function handle($messageBody)
    {
        $data = $messageBody['data'];

        if (!$data) {
            throw new Exception("message is empty!");
        }

        $className = $data['commandName'];
        if (!class_exists($className)) {
            throw new Exception("Not found message class: {$className}");
        }

        /** @var IncomingJobInterface $instance */
        $request = unserialize($data['command']);
        if (!$request instanceof IncomingJobInterface) {
            throw new Exception("Invalid command class: {$className}");
        }

        $this->getStrategy()->run($request);

    }
}
