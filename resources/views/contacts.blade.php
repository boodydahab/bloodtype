{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('message', 'Message:') !!}
			{!! Form::textarea('message') !!}
		</li>
		<li>
			{!! Form::label('client_id', 'Client_id:') !!}
			{!! Form::text('client_id') !!}
		</li>
		<li>
			{!! Form::label('subject', 'Subject:') !!}
			{!! Form::text('subject') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}