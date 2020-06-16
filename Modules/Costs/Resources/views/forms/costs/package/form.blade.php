

<div class="col-lg col-md col-xs">
    <div class="x_panel">
        <div class="x_title">
            <h2> {{ $legend ?? ""}} </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form action="{{ $action }}" method='POST'>
                @csrf()
                @if(isset($method))
                    @method($method)
                @endif
                <div class="form-group">
                        @component('components.select', ['label' => "Type de forfait : ", 'name' => 'cost_id', ])
                        <option value=""> {{ trans('-- Choisissez une option --') }} </option>
                            @foreach ($costs as $cost)
                                <option value={{ $cost->id }}
                                        @if ((isset($package)) && ($package->cost_id == $cost->id))
                                            selected
                                        @endif
                                    >
                                    {{ Modules\Costs\Enum\CostType::create($cost->type) }}
                                </option>
                            @endforeach
                        @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'text', 'label' => 'Quantité', 'name' => 'value', 'model' => (isset($package)) ? $package : null, 'attrs' => ['placeholder' => 'Entrez la quantité de frais forfaits', 'class' => 'mb-4 form-control'], ])
                        Quantité :
                    @endcomponent
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success"> {{ $txtbtn ?? 'Ajouter' }} </button>
                        <button type="reset" class="btn btn-secondary"> Annuler </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
