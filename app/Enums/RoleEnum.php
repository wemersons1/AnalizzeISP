<?php
namespace App\Enums;

enum RoleEnum: int
{
    case MASTER = 1;
    case PROVEDOR = 2;
    case CLIENTE = 3;
}
