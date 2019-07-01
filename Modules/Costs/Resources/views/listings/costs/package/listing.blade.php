<tr class="even pointer">

    <td class="text-center">{{ $package->id}}</td>
    <td class="">
        <a href="{{ route('module-costs.package.show', ['user_id' => $package->user->id, 'id' => $package->id]) }}">
            {{ Modules\Costs\Enum\CostType::create($package->cost->type)}}
        </a>
    </td>
    <td class=" ">{{ $package->value}}</td>
    <td class="">
        <a href="{{ route('module-costs.package.show', ['user_id' => $package->user->id, 'id' => $package->id]) }}" class="btn btn-info btn-circle btn-sm" title="Détails">
            <i class="fas fa-info-circle"></i>
        </a>
        <a href="{{ route('module-costs.package.edit', ['user_id' => $package->user->id, 'id' => $package->id]) }}" class="btn btn-warning btn-circle btn-sm" title="Modifier">
            <i class="fas fa-pen"></i>
        </a>
        <a href="#" class="btn btn-danger btn-circle btn-sm" title="Supprimer" data-toggle="modal" data-target="#delModal-{{ $package->id }}">
            <i class="fas fa-trash"></i></a>
    </td>
</tr>
@component('modals.delModal', ['action'=> route('module-costs.package.destroy', ['user_id' => $package->user->id, 'id' => $package->id]),'idModal'=> 'delModal-'.$package->id])
<strong>
    Etes-vous sur de vouloir le supprimer ?
</strong>
<div>
    <input type="checkbox" id="delete" name="accepted" value='1'>
    <label for="delete">Oui, je le veux</label>
</div>
@endcomponent
