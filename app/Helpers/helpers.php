<?php

use Illuminate\Support\Str;


function userFullName()
{
    return auth()->user()->prenom . "" . auth()->user()->nom;
}

function setMenuOpen($route)
{
    $routeActuel = request()->route()->getName();

    if (contains($routeActuel, $route)) {
        return "menu-open";
    }
    return "";
}
function contains($container, $contenu)
{
    return Str::contains($container, $contenu);
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
