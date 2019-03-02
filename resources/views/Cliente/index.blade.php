@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Clientes</h3></div>
          
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>id</th>
               <th>Nombre</th>
               <th>Tipo</th>
               <th>Estatus</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($Clientes->count())  
              @foreach($Clientes as $Cliente)  
              <tr>
                <td>{{$Cliente->id}}</td>
                <td>{{$Cliente->nombre}}</td>
                <td>{{$Cliente->tipo}}</td>
                <td>{{$Cliente->estatus}}</td>              
                <td><a class="btn btn-primary btn-xs" href="{{action('ClienteController@edit', $Cliente->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('ClienteController@destroy', $Cliente->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
        <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('Cliente.create') }}" class="btn btn-info" >Añadir Cliente</a>
            </div>
          </div>
      </div>
      {{ $Clientes->links() }}
    </div>
  </div>
</section>

@endsection