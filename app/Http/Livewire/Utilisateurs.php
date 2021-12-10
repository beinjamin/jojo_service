<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;



class Utilisateurs extends Component
{
    use WithPagination;


    protected $paginationTheme = "bootstrap";



    public $currentPage = "PAGELIST";




    public $newUser = [];
    public $editUser = [];




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
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditUser($id)
    {
        $this->editUser = User::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;

        $this->populateRolePermissions();
    }






    public function goToListUser()
    {
        $this->currentPage = PAGELIST;
        $this->editUser = [];
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

    public function updateUser()
    {
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();


        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Utilisateur mis à jour avec succès!"]);
    }
    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des utilisateurs. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "user_id" => $id
            ]
        ]]);
    }
    public function deleteUser($id)
    {
        User::destory($id);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "utilisateur cree avec succes!"]);
    }
}
