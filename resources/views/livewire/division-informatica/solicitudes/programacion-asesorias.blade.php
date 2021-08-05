

@foreach ($vistaRE as $item)

@if($item->estado == 'Autorizada')
<div class="py-12">
    <div class="mx-auto max-w-7x1 sm:px6 lg:px-8">
        <div class="px-4 py-4 overflow-auto bg-white shadow-xl sm:rounded-lg">
            <h2 align='center'>Asesorías Autorizadas</h2>

            @if (session()->has('message'))
            <div class="px-4 py-4 my-3 text-teal-900 bg-teal-100 rounded shadow-md -b" role="alert">
                <div class="flex">
                    <div>
                        <h4> {{ session('message') }}</h4>
                    </div>
                </div>
            </div>
            @endif

            @if ($programacion == true)
            @include('livewire.division-informatica.solicitudes.CrearProgramacion')
            @endif


            @if (Session::has('Mensaje'))
            <div class="alert alert-success" role="alert">
                {{    Session::get('Mensaje') }}
            </div>

            @endif



            <div class="row">
                <div class="col-sm-4">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><STRONG>Estado:</STRONG> <span
                                    class="badge badge-success">Autorizada</span></h3>
                        </div>
                        <div class="card-body">

                            <STRONG> Estudiante: </STRONG>{{ $item->estudiante }}
                            <br>
                            <STRONG>Materia Solicitada:</STRONG> {{ $item->materiaSolicitada }}
                            <br>
                            <STRONG>Justificación:</STRONG> {{ $item->justificacion }}
                            <STRONG>Fecha:</STRONG> {{ $item->updated_at }}

                            <br>

                        </div>
                        <div class="card-footer">


                            <button wire:click="editar({{ $item->idSolicitud }})" type="button" class="btn btn-primary"
                                data-toggle="modal" data-target="#exampleModal">
                                <span class="fas fa-list-alt">
                                    Programar Asesoría
                                </span>
                            </button>


                            <button wire:click="crear()" type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">
                                <span class="fas fa-eye">
                                </span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif



@if($item->estado == 'Programada')
<div class="py-12">
    <div class="mx-auto max-w-7x1 sm:px6 lg:px-8">
        <div class="px-4 py-4 overflow-auto bg-white shadow-xl sm:rounded-lg">
            <h2 align='center'>Asesorías Programadas</h2>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><STRONG>Estado:</STRONG> <span class="badge badge-primary">Asesoría
                                    Programada</span></h3>
                        </div>
                        <div class="card-body">

                            <STRONG> Estudiante: </STRONG>{{ $item->estudiante }}
                            <br>
                            <STRONG>Materia Solicitada:</STRONG> {{ $item->materiaSolicitada }}
                            <br>
                            <STRONG>Justificación:</STRONG> {{ $item->justificacion }}
                            <STRONG>Fecha:</STRONG> {{ $item->updated_at }}

                            <br>

                        </div>
                        <div class="card-footer">



                            <button wire:click="crear()" type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#exampleModal">
                                <span class="fas fa-eye">
                                </span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endif
@endforeach