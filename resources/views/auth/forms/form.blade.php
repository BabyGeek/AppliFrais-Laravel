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
            <form action="{{ $action }}" class="form-horizontal form-label-left" method='POST'>
                @csrf()
                @if(isset($method))
                    @method($method)
                @endif
                <div class="form-group">
                        @component('components.select', ['label' => "Role du membre : ", 'name' => 'role', ])
                        <option value=""> {{ trans('-- Choisissez une option --') }} </option>
                                <?php   $roles = Enum\UserRole::choices(); ?>
                            @foreach ($roles as $key => $value)
                                <option value={{ $key }}
                                        @if (isset($user) && ($user()->role == $key))
                                            selected
                                        @endif
                                    >
                                    {{ $value }}
                                </option>
                            @endforeach
                        @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'text', 'label' => 'Nom', 'name' => 'first_name', 'model' => (isset($user)) ? $user : null, 'attrs' => ['placeholder' => 'Entrez le nom du membre', ], ])
                        Nom :
                    @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'text', 'label' => 'Prenom', 'name' => 'last_name', 'model' => (isset($user)) ? $user : null, 'attrs' => ['placeholder' => 'Entrez le prenom du membre', ], ])
                        Prenom :
                    @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'email', 'label' => 'Email', 'name' => 'email', 'model' => (isset($user)) ? $user : null, 'attrs' => ['placeholder' => 'Entrez l\'email du membre', ], ])
                        Email :
                    @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'password', 'label' => 'Mot de passe', 'name' => 'password', 'model' => (isset($user)) ? $user : null, 'attrs' => ['placeholder' => 'Entrez le mot de passe du membre', ], ])
                        Mot de passe :
                    @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'text', 'label' => 'Addresse', 'name' => 'address', 'model' => (isset($user)) ? $user : null, 'attrs' => ['placeholder' => 'Entrez l\'addresse du membre', ], ])
                        Addresse :
                    @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'text', 'label' => 'Code postal', 'name' => 'CP', 'model' => (isset($user)) ? $user : null, 'attrs' => ['placeholder' => 'Entrez le code postal du membre', ], ])
                        Code postal :
                    @endcomponent
                </div>
                <div class="form-group">
                    @component('components.field',[ 'type' => 'text', 'label' => 'Ville', 'name' => 'city', 'model' => (isset($user)) ? $user : null, 'attrs' => ['placeholder' => 'Entrez la ville du membre', ], ])
                        Ville :
                    @endcomponent
                </div>
                <div class="form-group row">
                    @component('components.label', ['label' => "Date d&apos;embauche : ", ])
                        Date d&apos;embauche :
                    @endcomponent
                    @component('components.inputData',['type' => 'text', 'name' => 'hiring_date', 'id' => 'date', 'value' => isset($user) ? $user->hiring_date : null, 'attrs' => ['placeholder' => "Selectionnez la date d'embauche du membre", 'data-input' => ''],  ])

                    @endcomponent
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success"> {{ $txtbtn ?? 'Sauvegarder' }} </button>
                        <button type="reset" class="btn btn-secondary"> Annuler </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
