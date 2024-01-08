<?php
namespace App\Enums;

enum UserStatusesEnum: int
{
    case NOVO = 1;
    case ADIMPLENTE = 2;
    case INADIMPLENTE = 3;
    case DESISTENTE = 4;
    case INATIVO = 5;
    case CANCELADO = 6;
    case RENOVACAO = 7;
}
