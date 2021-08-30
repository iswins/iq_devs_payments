<?php
/**
 * Created by v.taneev.
 */


namespace App\Jobs;


class PaymentResult implements OutgoingJobInterface
{
    protected $requestId;

    public function setRequestId ($requestId): static
    {
        $this->requestId = $requestId;
        return $this;
    }
}
