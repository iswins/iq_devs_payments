<?php
/**
 * Created by v.taneev.
 */


namespace App\Services;

use App\Jobs\IncomingJobInterface;
use App\Services\Interfaces\AnswerTransportInterface;
use App\Services\Interfaces\PaymentStrategyInterface;

class SimplePaymentStrategy implements PaymentStrategyInterface
{
    const RESULT_DELAY = 15;

    protected AnswerTransportInterface $answerTransport;

    public function __construct (AnswerTransportInterface $answerTransport)
    {
        $this->answerTransport = $answerTransport;
    }

    /**
     * @return AnswerTransportInterface
     */
    public function getAnswerTransport (): AnswerTransportInterface
    {
        return $this->answerTransport;
    }


    public function run (IncomingJobInterface $request)
    {
        sleep(static::RESULT_DELAY);

        return $this->getAnswerTransport()
            ->answer($request->getRequestId());
    }
}
