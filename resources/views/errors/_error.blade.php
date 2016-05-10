
@if(Session::get('errors'))
		<div id="form-errors">
			<p>The following errors have occurred:</p>

			<ul>
				@foreach(Session::get('errors')->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
