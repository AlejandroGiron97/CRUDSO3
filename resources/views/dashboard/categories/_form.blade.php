@csrf
@include('dashboard.structure.validation-errors')
<div class="form-group">
    <input type="text" class="form-control" name="category" id="category"
        value="{{old('category',$category->category)}}">
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
    <a class="btn btn-danger btn-sm" href="{{URL::previous()}}">Cancelar</a>
</div>
