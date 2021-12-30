<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolePrivilege extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait;
    protected $dates = ['deleted_at'];
    protected $softCascade = ['roles', 'privileges'];
    protected $table = 'role_privileges';

}
