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
Breadcrumbs::for('payments.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Pagos', route('payments.index'));
});