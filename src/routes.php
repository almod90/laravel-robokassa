<?php

namespace Almod90\Robokassa\Controllers;

use Illuminate\Support\Facades\Route;

$config = config('robokassa');
$uri = $config['uri'];
$action = $config['action'];

Route::prefix($config['prefix'])->group(function () use ($action, $uri) {
    Route::match(['get', 'post'], $uri['result'], $action['result'])->name('robokassa.payment.result');
    Route::match(['get', 'post'], $uri['success'], $action['success'])->name('robokassa.payment.success');
    Route::match(['get', 'post'], $uri['fail'], $action['fail'])->name('robokassa.payment.fail');
});