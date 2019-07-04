<tr class="even pointer">

    <td class="text-center">{{ $nonpackage->id}}</td>
    <td class="">
            {{ $nonpackage->label }}
    </td>
    <td class=" ">{{ $nonpackage->value }}</td>
    <td class=" ">{{ $nonpackage->justificates()->count() }}</td>
    <td class="">

        <a href="{{ route('module-costs.nonpackage.show', ['user_id' => $nonpackage->user->id, 'id' => $nonpackage->id]) }}" class="btn btn-info btn-circle btn-sm" title="Informations">
            <i class="fas fa-info"></i>
        </a>
        <a href="{{ route('module-costs.nonpackage.edit', ['user_id' => $nonpackage->user->id, 'id' => $nonpackage->id]) }}" class="btn btn-warning btn-circle btn-sm" title="Modifier">
            <i class="fas fa-pen"></i>
        </a>
        <a href="#" class="btn btn-danger btn-circle btn-sm" title="Supprimer" data-toggle="modal" data-target="#delModal-{{ $nonpackage->id }}">
            <i class="fas fa-trash"></i></a>
    </td>
</tr>
@component('modals.delModal', ['action'=> route('module-costs.nonpackage.destroy', ['user_id' => $nonpackage->user->id, 'id' => $nonpackage->id]),'idModal'=> 'delModal-'.$nonpackage->id])
<strong>
    Etes-vous sur de vouloir supprimer "{{ $nonpackage->label }}" ?
</strong>
<div>
    <input type="checkbox" id="delete" name="accepted" value='1'>
    <label for="delete">Oui, je le veux</label>
</div>
@endcomponent
