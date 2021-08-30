<?php
/**
 * Created by v.taneev.
 */


namespace App\Jobs;


interface OutgoingJobInterface
{
    public function setRequestId($requestId) : static;
}
