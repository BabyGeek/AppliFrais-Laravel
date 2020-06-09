<!DOCTYPE html>
<html lang="fr">

@include('layouts.partials.head')

  <body class="login">
    <div>
            {!! //laraflash()->render() !!}
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <h1 class="text-center"><i class="fa fa-check-square-o"></i> <span> AppliFrais </h1>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <h1>Connexion</h1>
              <div class="form-group">
                @component('components.inputLogin', ['type' => 'text', 'name' => 'login', 'attrs' => ['placeholder' => 'Identifiant']])
                @endcomponent
              </div>
              <div class="form-group">
                @component('components.inputLogin', ['type' => 'password', 'name' => 'password', 'attrs' => ['placeholder' => 'Mot de passe']])
                @endcomponent
              <div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" old('remember') ? 'checked' : ''>

                    <label class="form-check-label"for="remember">
                        {{ trans('Se souvenir de moi') }}
                    </label>
                </div>
                <button class="btn btn-default submit" type="submit">{{ trans('Connexion') }}</button>
                <a class="reset_pass" href="{{ route('password.request') }}">{{ trans('Mot de passe oublié ?') }}</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br>

                <div>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

</body>
</html>
