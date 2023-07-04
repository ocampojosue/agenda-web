@extends('layouts.app')
@section('content')
<div class="container">
   <div class="agenda" id="agenda">
      Calendario
   </div>
</div>
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#event">
   Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="event" tabindex="-1" aria-labelledby="eventLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="eventLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="" id="form">
               {!! csrf_field() !!}
               <div class="form-group">
                  <label for="id">ID: </label>
                  <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                  @error('title')
                      <small id="helpId" class="form-text text-danger">Help text</small>
                  @enderror
               </div>
               <div class="form-group">
                  <label for="title">Título del Evento</label>
                  <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                     placeholder="Escribe el titulo del evento">
                  <small id="helpId" class="form-text text-muted">Help text</small>
               </div>
               <div class="form-group">
                  <label for="description">Descripción del Evento</label>
                  <textarea class="form-control" name="description" id="description" rows="3"
                     placeholder="Escribe la Descripción del Evento"></textarea>
               </div>
               <div class="form-group">
                  <label for="start">Start</label>
                  <input type="date" class="form-control" name="start" id="start" aria-describedby="helpId"
                     placeholder="">
                  <small id="helpId" class="form-text text-muted">Help text</small>
               </div>
               <div class="form-group">
                  <label for="end">End</label>
                  <input type="date" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Help text</small>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" id="btnGuardar" class="btn btn-success">Guardar</button>
            <button type="button" id="btnModificar" class="btn btn-warning">Modificar</button>
            <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
            <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
         </div>
      </div>
   </div>
</div>
@endsection