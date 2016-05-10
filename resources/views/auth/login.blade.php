@extends('layouts.main1')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Login or click here to go<a href="/"> Back</a></strong></div>
				<div class="panel-body">
					<section id="signin-form">
        <h1>I have an account</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count(Session::get('errors')) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach (Session::get('errors')->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            <p>
                {!! Html::image('img/email.gif', 'Email Address') !!}
                {!! Form::text('email') !!}
            </p>
            <p>
                {!!Html::image('img/password.gif', 'Password') !!}
                {!! Form::password('password') !!}
            </p>
            
            {!!Form::button('Sign In', array('type'=>'submit', 'class'=>'secondary-cart-btn')) !!}
            <br>
            <p></p><a href="/password/email">Forgot Your Password?</a>
        {!! Form::close() !!}
        
             
    </section><!-- end signin-form -->
    <section id="signup">
        <h2>I'm a new customer</h2>
        <h3>You can create an account in just a few simple steps.<br>
            Click below to begin.</h3>

        {!! Html::link('auth/register', 'CREATE NEW ACCOUNT', array('class'=>'default-btn')) !!}
    </section><!--- end signup -->
			</div>
		</div>
	</div>
</div>
@endsection
