@if ($package->month == Carbon\Carbon::now()->format('mY'))
    <tr class="even pointer">

        <td class="text-center">{{ $package->id }}</td>
        <td class="">
                {{ Modules\Costs\Enum\CostType::create($package->cost->type) }}
        </td>
        <td class=" ">{{ $package->value }}</td>
        <td class="row">
            <a href="{{ route('module-costs.package.edit', ['user_id' => $package->user->id, 'id' => $package->id]) }}" class="btn btn-warning btn-circle btn-sm col-3" title="Modifier">
                <i class="fa fa-pencil"></i>
            </a>
            <a href="#" class="btn btn-danger btn-circle btn-sm col-3" title="Supprimer" data-toggle="modal" data-target="#delModal-{{ $package->id }}">
                <i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @component('modals.delModal', ['action'=> route('module-costs.package.destroy', ['user_id' => $package->user->id, 'id' => $package->id]),'idModal'=> 'delModal-'.$package->id])
    <strong>
        Etes-vous sur de vouloir supprimer le/la {{ Modules\Costs\Enum\CostType::create($package->cost->type) }} ?
    </strong>
    <div>
        <input type="checkbox" id="delete" name="accepted" value='1'>
        <label for="delete">Oui, je le veux</label>
    </div>
    @endcomponent
@endif
