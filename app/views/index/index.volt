{{ form('method': 'post', 'id':'form-send', 'action': 'Index/pay') }}
	<b>{{ t._('service_description') }}</b><br />
	<b>{{ t._('unit_value') }} $2.000</b><br />
	<b>{{ t._('cantidad') }}</b></b><input type="text" name="quantity"><br />
	<button type="submit">
		{{ t._('pay_submit') }}
	</button>
{{ end_form() }}

<br /><br /><br />
{{error}}