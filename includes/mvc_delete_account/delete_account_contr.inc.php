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
