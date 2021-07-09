<div>
    <ul class="nav justify-content-end">
        <li>
            <div class="btn-group dropleft">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-bell" data-toggle="modal"> <span class="badge badge-success navbar-badge">
                            {{ $notif->count() }}</span></span>
                </button>
                <div class="dropdown-menu">
                    <div class="card" style="width: 40rem;">
                        @if ($notif->count() == 0)
                        <div class="card-body">
                            <center>
                                <p>No hay notificaciones nuevas</p>
                            </center>
                        </div>

                        @else

                        <ul class="list-group list-group-flush">
                            @foreach ($notificacion as $not)
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-tools">
                                            <button wire:click=" notifydelete({{ $not->idnotif }})" type="button"
                                                class=" btn-outline-danger btn-sm">x</button>
                                        </div>
                                        <h3 class="card-title">
                                            <p>El alumno {{$not->estudiante}} a realizado una {{$not->tipo}} de asesoría
                                            </p>
                                            <span class="text-xs text-gray-500" tyle=" size: 10px;">fecha:
                                                {{ $not->Fecha }}</span>
                                        </h3>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                        @endif
                    </div>

                </div>
            </div>
        </li>
    </ul>

    <div class="py-12">
        <div class="mx-auto max-w-7x1 sm:px6 lg:px-8">
            <div class="px-4 py-4 overflow-auto bg-white shadow-xl sm:rounded-lg">


                @if (session()->has('message'))
                <div class="px-4 py-4 my-3 text-teal-900 bg-teal-100 rounded shadow-md -b" role="alert">
                    <div class="flex">
                        <div>
                            <h4> {{ session('message') }}</h4>

                        </div>
                    </div>
                </div>
                @endif



                <!--  <button wire:click='crear()'
                    class="px-4 py-2 my-3 font-bold text-white bg-green-600 hover:bg-green-600">Nuevo</button>-->

                @if ($modal == true)
                @include('livewire.division-informatica.solicitudes.update')
                @endif

                @if ($visualizar == true)
                @include('livewire.division-informatica.solicitudes.view')
                @endif

                <table class="table table-condensed table-bordered table-responsive-sm">
                    <thead>
                        <tr class="text-white bg-green-600">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Estudiante</th>

                            <th class="px-4 py-2">Materia Solicitada</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acciones</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($vistaRE as $item)

                        <tr>


                            <td class="px-2 py-2 border">{{ $item->idSolicitud }}</td>
                            <td class="px-2 py-2 border">{{ $item->estudiante }}</td>
                            <td class="px-2 py-2 border">{{ $item->materiaSolicitada }}</td>
                            <td class="px-2 py-2 border">

                                @if ($item->estado == 'revisión')
                                <span class="badge bg-warning ">En revisión</span>
                                @endif
                                @if ($item->estado == 'Autorizada')
                                <span class="badge badge-success">Autorizada</span>
                                @endif
                                @if ($item->estado == 'Rechazada')
                                <span class="badge badge-danger">Rechazada</span>
                                @endif
                            </td>

                            <td class="px-4 py-2 border">

                                <button wire:click="editar({{ $item->idSolicitud }})"
                                    class="px-2 py-2 font-bold text-white bg-blue-500 hover:bg-blue-600"><span
                                        class="fas fa-edit" data-toggle="modal"
                                        data-target="#exampleModal"></span><button>
                                        <button wire:click="view({{ $item->idSolicitud }})"
                                            class="px-2 py-2 font-bold text-white bg-green-500 hover:bg-green-700"
                                            data-toggle="modal" data-target="#exampleModal"><span
                                                class="fas fa-eye"></span></button>

                            </td>

                        </tr>
                        @endforeach
                        <div wire:loading wire:target="quantity">
                            Updating quantity...
                        </div>
                    </tbody>
                </table>

                {{ $vistaRE->links() }}
            </div>
        </div>
    </div>

</div>