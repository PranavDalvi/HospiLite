<?php

declare(strict_types=1);

function is_only_one_admin_remaining(int $rowCount)
{
    if ($rowCount == 1) {
        return true;
    } else {
        return false;
    }
}

function is_pwd_invalid(string $pwd, string $hashedPwd)
{
    if (!password_verify($pwd, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}