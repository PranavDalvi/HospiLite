<?php
declare(strict_types=1);

function check_unpaid_fees(string $userStatus){
    if($userStatus === "unpaid"){
        return true;
    } else{
        return false;
    }
}