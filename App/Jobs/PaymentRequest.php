<?php
/**
 * Created by v.taneev.
 */


namespace App\Jobs;


class PaymentRequest implements IncomingJobInterface
{
    protected $inn;
    protected $amount;
    protected $requestId;

    public function __construct($inn, $amount, $requestId) {
        $this->inn = $inn;
        $this->amount = $amount;
        $this->requestId = $requestId;
    }


    public function getInn (): string
    {
        return $this->inn;
    }

    public function getAmount (): float
    {
        return $this->amount;
    }

    public function getRequestId ()
    {
        return $this->requestId;
    }
}
