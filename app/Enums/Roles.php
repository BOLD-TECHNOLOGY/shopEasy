<?php

namespace App\Enums;

enum Roles: string
{
    case User = 'user';
    case Admin = 'admin';
    case Blogger = 'blogger';
    case Customer = 'customer';
    case Vendor = 'vendor';
}
