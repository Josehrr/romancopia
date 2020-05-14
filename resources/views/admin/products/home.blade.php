@extends('admin.master')

@section('title','Productos')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{url('/admin/products')}}"><i class="fas fa-boxes"></i> Productos</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title">
                    <i class="fas fa-boxes"></i> Productos
                </h2>
            </div>
            <div class="inside">
                <div class="btns">
                    <a href="{{url('/admin/product/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar Producto</a>
                </div>

                <table class="table table-striped mtop16">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th></th>
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $p)
                            <tr @if($p->status == '0') class="table-danger" @else class="table-primary" @endif>
                                <th width="50px">{{$p->id}}</th>
                                <td width="64px">
                                    <a data-fancybox="gallery" href="{{url('/uploads/'.$p->file_path.'/t_'.$p->image)}}">
                                        <img src="{{url('/uploads/'.$p->file_path.'/t_'.$p->image)}}" alt="" width="64px">
                                    </a>
                                </td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->cat->name}}</td>
                                <td>{{$p->price}}</td>
                                <td>
                                    <div class="opts">
                                        <a href="{{url('/admin/product/'.$p->id.'/edit')}}" title="Editar" data-toggle="tooltip" data-placement="top"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('/admin/product/'.$p->id.'/delete')}}" title="Eliminar" data-toggle="tooltip" data-placement="top"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    <tr>
                        <td colspan="6">{!! $products->render() !!}</td>
                    </tr>
                    </tbody>
                </table>
                <!-- /.table -->
            </div>
            <!-- /.inside -->
        </div>
    </div>
@endsection
