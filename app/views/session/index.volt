<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
            {{ form('method': 'post', 'id':'form-login', 'action':'session/start') }}
                <div class="card card-hidden">
                    <div class="header text-center">{{ t._('login_title') }}</div>
                    <div class="content">
                        <div class="form-group">
                            <input type="text" name="username" />
                        </div>
                        <div class="form-group">
                        	<input type="password" name="password" />
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit">
							{{ t._('login') }}
						</button>
                    </div>
                </div>
            {{ end_form() }}
        </div>
    </div>
</div>
