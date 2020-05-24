@extends('admin.master')

@section('title','Categorias')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('/admin/categories')}}"><i class="far fa-folder-open"></i> Categorias</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="fas fa-plus"></i> Agregar Categoria
                        </h2>
                    </div>

                    <div class="inside">
                       {!! Form::open(['url' => '/admin/category/add']) !!}
                        <label for="name">Nombre de la Categoria:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-keyboard"></i>
                                </span>
                            </div>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <label for="module" class="mtop16">Módulo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-keyboard"></i>
                                </span>
                            </div>
                            {!! Form::select('module', getModulesArray(), 0, ['class' => 'custom-select']) !!}
                        </div>

                        <label for="icon" class="mtop16">Icono:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-keyboard"></i>
                                </span>
                            </div>
                            {!! Form::text('icon', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Guardar', ['class' => 'mtop16 btn btn-success']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-9">

                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title">
                            <i class="far fa-folder-open"></i> Categorias</a>
                        </h2>
                    </div>

                    <div class="inside">
                        <nav class="nav nav-pills nav-fill">
                            @foreach(getModulesArray() as $m => $k)
                                <a class=" nav-link" href="{{url('/admin/categories/'.$m)}}"><i class="fas fa-list"></i> {{$k}}</a>
                            @endforeach
                        </nav>

                        <table class="table mtop16">
                            <thead>
                            <tr>
                                <th width="32px"></th>
                                <th>Nombre</th>
                                <th width="140px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cats as $cat)
                                <tr>
                                    <td>{!! htmlspecialchars_decode($cat->icon) !!}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>
                                        <div class="opts">
                                            <a href="{{url('/admin/category/'.$cat->id.'/edit')}}" title="Editar" data-toggle="tooltip" data-placement="top"><i class="fas fa-edit"></i></a>
                                            <a href="{{url('/admin/category/'.$cat->id.'/delete')}}" title="Eliminar" data-toggle="tooltip" data-placement="top"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">{!! $cats->render() !!}</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
