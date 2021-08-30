<?php
/**
 * Created by v.taneev.
 */


namespace App\Services\Interfaces;


use App\Jobs\IncomingJobInterface;

interface PaymentStrategyInterface
{
    public function __construct(AnswerTransportInterface $answerTransport);
    public function run(IncomingJobInterface $request);
}
