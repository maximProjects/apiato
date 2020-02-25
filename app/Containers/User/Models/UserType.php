<?php

namespace App\Containers\User\Models;


use BenSampo\Enum\Enum;

final class UserType extends Enum{

    const UserTypeEmployee   = 0;
    const UserTypeManager   = 1;
    const UserTypeClient   = 2;

}