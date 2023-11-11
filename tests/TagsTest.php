<?php

use Dcblogdev\Tags\Facades\Tags;

test('[year] sets the year', function () {
    $year = date('Y');
    $response = Tags::get('[year]');

    expect($response)->toBe($year);
});

test('[appName] sets the name of the app', function () {
    $response = Tags::get('[appName]');

    expect($response)->toBe('Laravel');
});
