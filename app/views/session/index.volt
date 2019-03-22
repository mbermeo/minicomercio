<section id="main" class="container medium">
    <header>
        <h2>Login</h2>
        <p>Ingrese usuario y clave para continuar</p>
    </header>
    <div class="box">
        {{ form('method': 'post', 'id':'form-login', 'action':'session/start') }}
            <div class="row gtr-50 gtr-uniform">
                <div class="col-6 col-12-mobilep">
                    <input type="text" name="username" id="username" placeholder="Usuario" />
                </div>
                <div class="col-6 col-12-mobilep">
                    <input type="password" name="password" id="password" placeholder="Clave" />
                </div>
                <div class="col-12">
                    <ul class="actions special">
                        <button type="submit" class="button">
                             {{ t._('login') }}
                        </button>
                    </ul>
                </div>
            </div>
        {{ end_form() }}
    </div>
</section>
