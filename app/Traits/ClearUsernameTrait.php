<?php

namespace App\Traits;

trait ClearUsernameTrait {

    public function clearUsername(string $username): string {

        if (!preg_match("/^[@]{1}[A-Za-z0-9_]+$/", $username)) {

            return $username;
            
        }
        
        return str_replace("@", "", $username);


    }

}
