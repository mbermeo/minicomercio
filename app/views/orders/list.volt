<a href="{{ url.getBaseUri() }}session/end">{{ t._('close') }}</a>

<table id="bootstrap-table" class="table table-hover" >
    <thead height="40px" >
        <th data-field="name" 
            data-sortable="false">
            {{ t._('num_order') }}
        </th>
        <th data-field="start_date" 
            data-sortable="false">
            {{ t._('description') }}
        </th>
        <th data-field="end_date" 
            data-sortable="false">
            {{ t._('status') }}
        </th>
        <th data-field="end_date" 
            data-sortable="false">
            {{ t._('expires_at') }}
        </th>
        <th data-field="actions" 
            class="td-actions text-center" 
            data-events="operateEvents" 
            data-formatter="operateFormatter">
            {{ t._('actions') }}
        </th>
    </thead>
    <tbody>
    {% for row in data %}
        <tr>
            
            <td>{{ row['idempotency_token'] }}</td>
            <td>{{ row['purchase_description'] }}</td>
            <td>{{ row['status'] }}</td>
            <td>{{ row['expires_at'] }}</td>
            <td>
                {% if row['status'] == 'paid' OR row['status'] == 'delivered' %}
                    <spam style="color: red;">
                    	<a href="{{ url.getBaseUri() }}order/revert/{{ row['token'] }}">{{ t._('revert') }}</a>
                    </spam>
                {% endif %}
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>

<br /><br />