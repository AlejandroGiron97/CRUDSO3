@csrf
@include('dashboard.structure.validation-errors')
<div class="form-group">
    <input type="text" class="form-control" name="publication_name" id="publication_name"
        placeholder="Nombre de la publicaciones" value="{{old('publication_name',$post->publication_name)}}">
</div>
<div class="form-group">
    <textarea class="form-control" name="publication_description" id="publication_description"
    cols="30" rows="10" placeholder="contenido de la publicación">
    {{old('publication_description', $post->publication_description)}}</textarea>
</div>

<div class="form-group">
    <select class="form-control" name="choices" id="choices">
        <option value="">Publicado</option>
        <option value="">Rechazado</option>
        <option value="">En revision</option>
    </select>
</div>
<div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a class="btn btn-danger" href="{{URL::previous()}}">Cancelar</a>
</div>
