{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('about', 'About:') !!}
			{!! Form::textarea('about') !!}
		</li>
		<li>
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('facebook', 'Facebook:') !!}
			{!! Form::text('facebook') !!}
		</li>
		<li>
			{!! Form::label('twitter', 'Twitter:') !!}
			{!! Form::text('twitter') !!}
		</li>
		<li>
			{!! Form::label('instagram', 'Instagram:') !!}
			{!! Form::text('instagram') !!}
		</li>
		<li>
			{!! Form::label('youtube', 'Youtube:') !!}
			{!! Form::text('youtube') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}