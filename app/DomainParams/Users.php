<?php
/**
 * Created by PhpStorm.
 * User: andriy
 * Date: 28.09.17
 * Time: 16:52
 */

namespace App\DomainParams;


class Users
{
    const ROLE_COMPANY          = 'company';
    const ROLE_RECRUTER         = 'recruiter';
    const ROLE_ANONYMOUS        = 'anonymous';
    const ROLE_CLIENT           = 'client';
    const DEFAULT_COUNT_PAGINATION = 3;
}