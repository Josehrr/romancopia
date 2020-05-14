@extends('admin.master')

@section('title','Editar Usuario')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('/admin/users')}}"><i class="fas fa-house-damage"></i> Usuarios</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page_user">
            <div class="row">
            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="fas fa-user"></i> Información
                        </h2>
                    </div>
                    <div class="inside">
                        <div class="mini_profile">
                            @if(is_null($user->avatar))
                                <img src="{{url('/static/images/default_avatar.svg')}}" alt="" class="avatar">
                            @else:
                                <img src="{{url('/uploads/users/'.$user->id.'/'.$user->avatar)}}" alt="" class="avatar">
                            @endif
                                <div class="info">
                                    <span class="title"><i class="far fa-id-badge"></i> Nombre:</span>
                                    <span class="text">{{$user->name}} {{$user->lastname}}</span>
                                    <span class="title"><i class="far fa-envelope"></i> Correo Electrónico:</span>
                                    <span class="text">{{$user->email}}</span>
                                    <span class="title"><i class="far fa-calendar-alt"></i> Fecha de Registro:</span>
                                    <span class="text">{{$user->created_at}}</span>
                                    <span class="title"><i class="fas fa-user-tag"></i> Rol de Usuario:</span>
                                    <span class="text">{{getRoleUserArray(null, $user->role)}}</span>
                                    <span class="title"><i class="fas fa-user-shield"></i> Estado de Usuario:</span>
                                    <span class="text">{{getRoleUserStatusArray(null, $user->status)}}
                                        @if($user->status == '1') <i class="far fa-check-circle"></i>@endif
                                    </span>
                                </div>
                                @if($user->status == 100)
                                    <a href="{{url('/admin/user/'.$user->id.'/banned')}}" class="btn btn-success mtop16">Activar Usuario</a>
                                @else
                                    <a href="{{url('/admin/user/'.$user->id.'/banned')}}" class="btn btn-danger mtop16">Suspender Usuario</a>
                                @endif
                        </div>
                        <!-- /.mini_profile -->

                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->

            <div class="col-md-8">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="fas fa-user-edit"></i> Editar Información
                        </h2>
                    </div>
                    <div class="inside">

                    </div>
                </div>
            </div>
            <!-- /.col-md-4 -->
        </div>
        </div>
        <!-- /.page_user -->
    </div>
@endsection
