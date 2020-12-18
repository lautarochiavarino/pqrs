@extends('layouts.front')

@section('content')

<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Formulario de presentación PQRS</div>
        <div class="card-body">
            <p>Tenga en cuenta las siguientes definiciones al momento de ingresar su PQRS</p>

            <p><b>Petición:</b> Es una solicitud que hace una parte interesada a la organización por motivos de interés general o particular, para obtener información, consulta o apoyo. También incluye denuncia sobre actos de terceros sobre activos de la Compañia.</p>

            <p><b>Queja:</b> Manifestación de insatisfacción generada por comportamientos o actuaciones de un funcionario o contratista de la compañia, ya sean de caracter administrativo o conductas inapropiadas.</p>

            <p><b>Reclamo:</b> Manifestación de insatisfacción hecha por una parte interesada sobre el incumplimiento, irregularidad o eventuales afectaciones asociadas con los servicios, gestión y operación de la entidad.</p>

            <p><b>Sugerencia:</b> Es un consejo, propuesta, idea o indicación en pro de mejora que formula una parte interesada con relacion a los servicios, gestión y operación de la Entidad.</p>

            <a class="btn btn-primary btn-block" href="nuevocontacto">Iniciar Formulario</a>
            <a class="btn btn-primary btn-block" href="seguimiento">Seguimiento PQRS</a>
        </div>
    </div>
</div>

@stop