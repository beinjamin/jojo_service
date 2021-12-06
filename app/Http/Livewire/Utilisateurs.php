<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;



class Utilisateurs extends Component
{
    use WithPagination;


    protected $paginationTheme = "bootstrap";


    public $isBtnAddClicked = false;




    public $newUser = [];




    protected $rules = [


        'newUser.nom' => 'required',
        'newUser.prenom' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
        'newUser.telephone1' => 'required|numeric',
        'newUser.pieceIdentite' => 'required',
        'newUser.sexe' => 'required',
        'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',

    ];


    /* protected $messages = [
        'newUser.nom.required' => "le nom de l'utilisateur est oubligatoir",

    ];
 */

    public function render()
    {
        return view('livewire.utilisateurs.index', [
            "users" => User::latest()->paginate(10)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }
    public function goToAddUser()
    {
        $this->isBtnAddClicked = true;
    }
    public function goToListUser()
    {
        $this->isBtnAddClicked = false;
    }
    public function addUser()
    {

        //Verification si les formation son correct dans la mesure ou c'est pas le cas cela revoir une erreur
        $validationAttributes = $this->validate();
        $validationAttributes["newUser"]["password"] = "password";
        User::create($validationAttributes["newUser"]);




        //Ajout d'un new utilisateur

        $this->newUser = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Utilisateur a ete cree avec success"]);
    }
    public function confirmDelete($name)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => "Vous etez sur le point de supprimer $name la liste des utilisateur .voulez vous continuer"]);
    }
}
