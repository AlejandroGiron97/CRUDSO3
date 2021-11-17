@extends('dashboard.master')
@section('content')

    <div class="mb-3">
        <a href="{{ route('post.create') }}" class="btn btn-success btn-small mb-3">Crear publicación</a>
    </div>
    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>Código</th>
                <th>Publicación</th>
                <th>Contenido</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->publication_name }}</td>
                    <td>{{ $post->publication_description }}</td>
                    <td>{{ $post->choices }}</td>
                    <td>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-success btn-sm">Consultar</a>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-info btn-sm">Editar</a>
                        <a href="{{ route('post.destroy', $post->id) }}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" data-id="{{$post -> id}}">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $posts->links() }}
    </div>

@endsection


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Seguro deseas eliminar la publicación?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="deletePost" method="POST" action="{{ route('post.destroy', 0) }}"
                    data-action="{{ route('post.destroy', 0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">Eliminar publicación</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $('#exampleModal').on('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = $(event.relatedTarget)
            var id = button.data('id')
            action = $('#deletePost').attr('data-action').slice(0,-1)
            action += id
            console.log(action)
            $('#deletePost').attr('action', action)
            var modal = $(this)
            modal.find('.modal-title').text('Vas a eliminar la publicación: ' + id)
        })
    }
</script>
