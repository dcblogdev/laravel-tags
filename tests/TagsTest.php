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

test('can embed youtube videos', function () {
    $response = Tags::get('[youtube https://www.youtube.com/watch?v=cAzwfFPmghY]');

    expect($response)
        ->toBe("<iframe width='560' height='360' src='//www.youtube.com/embed/cAzwfFPmghY' frameborder='0' allowfullscreen></iframe>");
});

test('can embed youtube videos with width and height', function () {
    $response = Tags::get('[youtube https://www.youtube.com/watch?v=cAzwfFPmghY width=100 height=100]');

    expect($response)
        ->toBe("<iframe width='100' height='100' src='//www.youtube.com/embed/cAzwfFPmghY' frameborder='0' allowfullscreen></iframe>");
});

test('can embed youtube videos with height', function () {
    $response = Tags::get('[youtube https://www.youtube.com/watch?v=cAzwfFPmghY height=100]');

    expect($response)
        ->toBe("<iframe width='560' height='100' src='//www.youtube.com/embed/cAzwfFPmghY' frameborder='0' allowfullscreen></iframe>");
});
