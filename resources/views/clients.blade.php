{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('blood_type_id', 'Blood_type_id:') !!}
			{!! Form::text('blood_type_id') !!}
		</li>
		<li>
			{!! Form::label('last_donation_date', 'Last_donation_date:') !!}
			{!! Form::text('last_donation_date') !!}
		</li>
		<li>
			{!! Form::label('city_id', 'City_id:') !!}
			{!! Form::text('city_id') !!}
		</li>
		<li>
			{!! Form::label('pin_code', 'Pin_code:') !!}
			{!! Form::text('pin_code') !!}
		</li>
		<li>
			{!! Form::label('date_of_birth', 'Date_of_birth:') !!}
			{!! Form::text('date_of_birth') !!}
		</li>
		<li>
			{!! Form::label('client_id', 'Client_id:') !!}
			{!! Form::text('client_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}