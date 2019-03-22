

<body class="landing is-preload">
    <a href="{{ url.getBaseUri() }}session/end">Cerrar Sesión </a>
</body>


{% for row in data %}
<section class="box">
        <h4>{{ row['idempotency_token'] }}</h4>
        <blockquote>
            <b>{{ t._('description') }}:</b> {{ row['purchase_description'] }}<br />
            <b>{{ t._('status') }}:</b> {{ row['status'] }}<br />
            <b>{{ t._('expires_at') }}:</b> {{ row['expires_at'] }}<br />
            {% if row['status'] == 'paid' OR row['status'] == 'delivered' %}
                    <spam style="color: red;">
                        <a href="{{ url.getBaseUri() }}order/revert/{{ row['token'] }}">{{ t._('revert') }}</a>
                    </spam>
                {% endif %}
        </blockquote>
        </section>
{% endfor %}


<br /><br />