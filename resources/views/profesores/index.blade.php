@extends('layouts.app')

@section('content')
<div class="d-flex">
    <input type="checkbox" id="btn">
    <div class="sidebar-container bg-primary">
        <label id="minium-close" for="btn" class="check p-3"><i class="icon ion-navicon-round"></i></label>
        <div class="welcome">
            <a href="{{ url('/logout') }}">
                        <i class="ml-2 icon ion-close-round"></i> 
            </a>
            <span class="font-weight-bold">¡Hola, {{ Auth::user()->name }}!</span>
            
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
        </div>
        <div class="menu">
            @foreach ($materias as $materia)
                <a href="{{ url('profesorMateria/'.$materia) }}" class="d-block p-3 text-color-p"><i class="icon ion-android-book mr-2 lead"></i> {{ $materia }}</a>
            @endforeach
            <label id="close"for="btn" class="check p-3 text-color-p"><i class="icon ion-chevron-left mr-2 lead"></i> Cerrar</label>
        </div>
    </div>
</div>
<!-- hasta aqui va el navbar lateral -->

<!-- mensaje de bienvenida -->
    @if (isset($clear))
        <div class="bienvenida">
            <i class="icon ion-happy mr-2 lead" width="500px"></i>
            <h3>¡Que gusto tenerte de vuelta!</h3>
        </div>
    @else
        @include('profesores.mostrarMaterias')
    @endif
@endsection