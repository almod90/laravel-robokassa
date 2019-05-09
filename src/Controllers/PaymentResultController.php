<?php

namespace Almod90\Robokassa\Controllers;

use App\Http\Controllers\Controller;
use Almod90\Robokassa\Events\PaymentAccepted;
use Almod90\Robokassa\Events\PaymentRejected;
use Almod90\Robokassa\Robokassa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentResultController extends Controller
{
    public function __invoke(Request $request)
    {
        $robokassa = new Robokassa;

        if ($robokassa->payment->validateResult($request->all(), false)) {
            event(new PaymentAccepted($robokassa->payment));

            return $robokassa->payment->getSuccessAnswer();
        }

        event(new PaymentRejected($robokassa->payment));
    }
}