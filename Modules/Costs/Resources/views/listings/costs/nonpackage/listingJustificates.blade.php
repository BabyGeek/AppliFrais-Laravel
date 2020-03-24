<p class="row">
    <a href="/storage/{{ $justificate->path }}" target="_blank" class='mr-4'>
        {{ $justificate->name }}
    </a>
    <a href="/storage/{{ $justificate->path }}" class="btn btn-info btn-circle btn-sm" target="_blank" title="Ouvrir">
        <i class="fas fa-info"></i>
    </a>
    <a href="#" class="btn btn-danger btn-circle btn-sm" title="Supprimer" data-toggle="modal" data-target="#delModal-{{ $justificate->id }}">
        <i class="fas fa-trash"></i>
    </a>
</p>

@component('modals.delModal', ['action'=> route('module-costs.nonpackage.justificate.destroy', ['user_id' => $justificate->justificable->user->id, 'non_package_id' => $justificate->justificable->id, 'id' => $justificate->id, ]),'idModal'=> 'delModal-'.$justificate->id])
<strong>
    Etes-vous sur de vouloir supprimer le justificatif : "{{ $justificate->name }}" ?
</strong>
<div>
    <input type="checkbox" id="delete" name="accepted" value='1'>
    <label for="delete">Oui, je le veux</label>
</div>
@endcomponent
<hr>
