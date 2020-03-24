

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
            <form action="{{ $action }}" class="form-horizontal form-label-left" method='POST' enctype="multipart/form-data">
                @csrf()
                @if(isset($method))
                    @method($method)
                @endif
                <div class="form-group row">
                    @component('components.label', ['label' => "Date : ", ])
                        Date :
                    @endcomponent
                    @component('components.inputData',['type' => 'text', 'name' => 'date', 'id' => 'date', 'value' => isset($nonpackage) ? $nonpackage->date : null, 'attrs' => ['placeholder' => "Selectionnez la date de début", 'data-input' => ''],  ])

                    @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'text', 'label' => 'Libelle', 'name' => 'label', 'model' => (isset($nonpackage)) ? $nonpackage : null, 'attrs' => ['placeholder' => 'Entrez le libellé du frais hors forfaits', ], ])
                        Libellé :
                    @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'text', 'label' => 'Quantité', 'name' => 'value', 'model' => (isset($nonpackage)) ? $nonpackage : null, 'attrs' => ['placeholder' => 'Entrez le montant du frais hors forfaits', ], ])
                        Montant (en €) :
                    @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'file', 'label' => 'Justificatif', 'name' => 'justificate', 'model' => (isset($nonpackage)) ? $nonpackage : null, 'attrs' => ['titlz' => 'Seulement les extensions .pdf, .jpg et .png sont accéptées', 'class' => 'custom-file-input', 'multiple' => null, ], 'attrsLabel' => ['class' => 'custom-file-label', ] ])
                        Justificatif :
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
