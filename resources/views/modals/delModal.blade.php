<div class="modal fade bs-example-modal-sm" tabindex="-1" id="{{ $idModal }}" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="POST" class="float-right" action="{{ $action }}">
                @csrf() @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="delModalLabel">Voulez vous supprimer ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body"> {{ $slot }} </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">
                        Annuler
                    </button>
                    <button type="submit" class="btn btn-danger" title="Supprimer">
                        Supprimer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>