<?php


function userFullName()
{
    return auth()->user()->prenom . "" . auth()->user()->nom;
}
