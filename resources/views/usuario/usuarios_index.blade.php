@extends('Layouts.Layouts')



@section('content')

<h1 style="text-align:center ;">Lista de Usuarios</h1>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
    <thead>
        <tr>
            <th>Nombre</th>
            <th>E-mail</th>
            <th>Rol de usuario</th>
            <th>Ver Usuario</th>
            <th>Editar Usuario</th>
            <th>Eliminar Usuario</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
        <tr>
            <td scope="row">{{ $user->name }}</td>
            <td>{{ $user->email}} </td>
            <td> </td>
                                                
            <td><a   class="btn btn-info" href="">Ver</a></td>
            <td><a   class="btn btn-success" href="">Editar</a></td>
            <td><a   class="btn btn-danger" href="">Eliminar</a></td>
                                                
                                                
         </tr>
         @empty
            <tr>
                <td colspan = "4">No hay Usuarios</td>
             </tr>

        @endforelse
     </tbody>                               
                                        
</table>




@endsection