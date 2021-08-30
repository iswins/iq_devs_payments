<?php
/**
 * Created by v.taneev.
 */


namespace App\Services\Interfaces;


interface MessageHandlerInterface
{
    public function __construct(PaymentStrategyInterface $strategy);

    public function handle($messageBody);
}
