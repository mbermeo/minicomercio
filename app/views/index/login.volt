<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
            {{ form('method': 'post', 'id':'form-login', 'action':'session/start') }}
            <!--   if you want to have the card without animation please remove the ".card-hidden" class   -->
                <div class="card card-hidden">
                    <div class="header text-center">{{ t._('login_title') }}</div>
                    <div class="content">
                        <div class="form-group">
                            {{ form.label('username') }}
                            {{ form.render('username') }}
                        </div>
                        <div class="form-group">
                            {{ form.label('password') }}
                            {{ form.render('password') }}
                        </div>
                        <div class="form-group">
                            <label class="checkbox">
                                <input type="checkbox" data-toggle="checkbox" value="">
                                <a href="{{ url.getBaseUri() }}session/recover">{{ t._('forgot_password') }}</a>
                            </label>
                        </div>
                    </div>
                    <div class="footer text-center">
                        {{ form.render("save") }}
                    </div>
                </div>
            {{ end_form() }}
        </div>
    </div>
</div>

<script type="text/javascript">
    $().ready(function(){
        $('#form-login').validate();
    });
</script>