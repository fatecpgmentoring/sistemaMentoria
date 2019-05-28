@extends('admin.layouts.plane')

@section('body')
 <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">SISCCON - ADMIN</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>

                                        <div>
                                        @include('admin.widgets.progress', array('animated'=> true,'class'=>'danger', 'value'=>'80'))
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>

                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url('/admin') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="{{ url('/admin') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li {{ (Request::is('admin') ? 'class="active"' : '') }}>
                            <a href="{{ route ('admin.home') }}"><i class="fa fa-home fa-fw"></i> Paginal Inicial Administrativa</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Profissões<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/profissao/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.profissao.create') }}"><i class="fa fa-plus fa-fw"></i>Cadastrar</a>
                                </li>
                                <li {{ (Request::is('/profissao') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.profissao.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-desktop fa-fw"></i> Carreiras<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/carreira/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.carreira.create') }}"><i class="fa fa-plus fa-fw"></i>Cadastrar</a>
                                </li>
                                <li {{ (Request::is('/admin/carreira') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.carreira.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-laptop fa-fw"></i> Assuntos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/assunto/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.assunto.create') }}"><i class="fa fa-plus fa-fw"></i>Cadastrar</a>
                                </li>
                                <li {{ (Request::is('admin/assunto') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.assunto.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-search-plus fa-fw"></i> Mentores<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/mentor/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.mentor.create') }}"><i class="fa fa-plus fa-fw"></i>Cadastrar</a>
                                </li>
                                <li {{ (Request::is('admin/mentor') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.mentor.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-search-minus fa-fw"></i> Mentorado<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/mentorado/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.mentorado.create') }}"><i class="fa fa-plus fa-fw"></i>Cadastrar</a>
                                </li>
                                <li {{ (Request::is('admin/mentorado') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.mentorado.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-comments fa-fw"></i> Comentarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/comentario') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.comentario.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-group fa-fw"></i> Conexões<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/conexao') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.conexao.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-linkedin-square fa-fw"></i> Contatos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/contatos') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.conexao.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-question fa-fw"></i> Inscritos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/inscrito') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.inscrito.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-plane fa-fw"></i> Eventos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/evento/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.evento.create') }}"><i class="fa fa-plus fa-fw"></i>Cadastrar</a>
                                </li>
                                <li {{ (Request::is('/admin/evento') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.evento.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Assuntos e Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('admin/usuario/assunto/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.usuario.assunto.create') }}"><i class="fa fa-plus fa-fw"></i>Cadastrar</a>
                                </li>
                                <li {{ (Request::is('admin/usuario/assunto') ? 'class="active"' : '') }}>
                                    <a href="{{ route('admin.usuario.assunto.index') }}"><i class="fa fa-wrench fa-fw"></i>Gerenciar</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">
				@yield('section')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop

