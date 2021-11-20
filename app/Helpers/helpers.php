<?php


function userFullName()
{
    return auth()->user()->prenom . "" . auth()->user()->nom;
}

function setMenuOpen(){

    if(request()->route()->name())
}

function getRolesName()
{
    $rolesName = "";
    $i = 0;
    foreach (auth()->user()->roles as $role) {
        $rolesName .= $role->nom;
        if ($i < sizeof(auth()->user()->roles) - 1) {
            $rolesName .= ",";
        }

        $i++;
    }
    return   $rolesName;
}
