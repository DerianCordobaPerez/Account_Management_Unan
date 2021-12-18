<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Panel principal', route('home'));
});

// Users
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Gestión de usuarios', route('users.index'));
});

// Payments
Breadcrumbs::for('payments', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Payments', route('payments.index'));
});

