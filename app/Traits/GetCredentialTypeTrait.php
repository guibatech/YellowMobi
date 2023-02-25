<?php

namespace App\Traits;

trait GetCredentialTypeTrait {

    public function getCredentialType(string $value): string {

        if (preg_match("/^[A-Za-z0-9_.]+([@][A-Za-z0-9]+){1}([.]{1}[A-Za-z0-9]{2,4})+$/", $value)) {

            return "email";

        }
        
        if (preg_match("/^[@]{1}[A-Za-z0-9_]+$/", $value)) {

            return "username";

        }

        return "";

    }

}
