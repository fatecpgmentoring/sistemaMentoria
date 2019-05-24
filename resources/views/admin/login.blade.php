@extends ('admin.layouts.plane')
@section ('body')
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
               @section ('login_panel_title','Entrar')
               @section ('login_panel_body')
                        <form role="form" action="{{route('login.admin')}}" method="POST">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">Logar</button>
                            </fieldset>
                        </form>

                @endsection
                @include('admin.widgets.panel', array('as'=>'login', 'header'=>true))
            </div>
        </div>
    </div>
@stop
