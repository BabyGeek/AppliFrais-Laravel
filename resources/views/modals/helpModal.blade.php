<div class="modal fade bs-example-modal-sm" tabindex="-1" id="helpModal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
                <h4 class="modal-title" id="helpModalLabel"> Besoin d&rsquo;aide ? </h4>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
