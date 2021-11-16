<?php


function userFullName()
{
    return auth()->user()->prenom . "" . auth()->user()->nom;
}

function getRolesName()
{
    $rolesName = "";
    foreach (auth()->user()->roles as $role) {
        $rolesName += $role->nom;
        if ($i < sizeof(auth()->user()->roles) - 1) {
            $rolesName .= ",";
        }

        $i++;
    }
    return   $rolesName;
}
