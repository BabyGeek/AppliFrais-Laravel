
    <tr class="even pointer">

            <td class="text-center">{{ $nonpackage->id }}</td>
            <td class="">
                @if ($nonpackage->label)
                    {{ $nonpackage->label }}
                @else
                    {{ Modules\Costs\Enum\CostType::create($nonpackage->cost->type) }}
                @endif
            </td>
            <td class=" ">{{ $nonpackage->value }}</td>
            <td class=" ">{{ $nonpackage->date->format('m-Y') }}</td>
            <td class=" ">{{ Modules\Costs\Enum\CostState::create($nonpackage->state) }}</td>
            <td class="">
    
                <a href="{{ route('module-costs.nonpackage.edit', ['user_id' => $nonpackage->user->id, 'id' => $nonpackage->id]) }}" class="btn btn-warning btn-circle btn-sm" title="Modifier">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="#" class="btn btn-danger btn-circle btn-sm" title="Supprimer" data-toggle="modal" data-target="#delModal-{{ $nonpackage->id }}">
                    <i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @component('modals.delModal', ['action'=> route('module-costs.nonpackage.destroy', ['user_id' => $nonpackage->user->id, 'id' => $nonpackage->id]),'idModal'=> 'delModal-'.$nonpackage->id])
        <strong>
            Etes-vous sur de vouloir supprimer le frais ?
        </strong>
        <div>
            <input type="checkbox" id="delete" name="accepted" value='1'>
            <label for="delete">Oui, je le veux</label>
        </div>
        @endcomponent
    