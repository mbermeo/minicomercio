

	<!-- Banner -->
	<section id="banner">

<a href="{{ url.getBaseUri() }}session/index" class="button">Ingresar al Admin</a>
	{{ form('method': 'post', 'id':'form-send', 'action': 'Index/pay') }}
		<h2>{{ t._('service_description') }}</h2>
		<p>{{ t._('unit_value') }} $2.000</p>
		<ul class="actions special">
			<input type="number" name="quantity" min="1" max="50">
		</ul>
		<ul class="actions special">
			<button type="submit" class="button primary">
				{{ t._('pay_submit') }}
			</button>
		</ul>				
	{{ end_form() }}
	{{error}}
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>
			