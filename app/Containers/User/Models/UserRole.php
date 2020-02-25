<?php

namespace App\Containers\User\Models;


use BenSampo\Enum\Enum;

final class UserRole extends Enum{

    const Admin   = 'admin';
    const Manager   = 'manager';
    const Employee   = 'employee';
    const Client   = 'client';
}