<div>

    @if ($isBtnAddClicked)
    @include("livewire.utilisateurs.create")

    @else
    @include("livewire.utilisateurs.liste")
        @endif
</div>
