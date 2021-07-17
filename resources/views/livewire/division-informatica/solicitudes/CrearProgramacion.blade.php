<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog " style="max-width: 90%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendar Asesoría</h5>
                <a type="submit" class="close" href=" {{ url('/programacion-Asesoria') }}"><span
                        aria-hidden="true close-btn">×</span></a>
                {{--     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>--}}
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col">
                            <div class="mb-4">
                                <label for="nombre"
                                    class="block mb-2 text-sm font-bold text-gray-700">Estudiante</label>
                                <input type="text"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="nombre" wire:model="nombre" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-4">
                                <label for="idDocentes"
                                    class="block mb-2 text-sm font-bold text-gray-700">Docente</label>
                                <select id="idDocentes" wire:model="selectDocente"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="idDocentes">
                                    <option value="NULL" selected>Selecciona una Docente... </option>

                                    @foreach ($docentes as $do)
                                    <option value="{{ $do->idDocentes }}">{{ $do->nombre }} {{ $do->apellidos }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input id="prodId" name="prodId" type="hidden" value="xm234jq">


                    @if(!is_null($vistaDH))

                    <div class="row">
                        <div class="col">
                            <div class="mb-4">
                                <label for="HoraInicial"
                                    class="block mb-2 text-sm font-bold text-gray-700 ">HoraInicial</label>

                                <select id="HoraInicial" wire:model="HoraInicial"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="select">
                                    <option value=" ">Selecciona una hora... </option>

                                    @for ($i=7; $i <=20; $i++) <option value="{{$i}}:00:00">{{ $i }}</option>
                                        @endfor


                                </select>
                                @error('HoraInicial') <span style="color:red;" class="error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-4">
                                <label for="HoraFinal"
                                    class="block mb-2 text-sm font-bold text-gray-700 ">HoraFinal</label>

                                <select id="HoraFinal" wire:model="HoraFinal"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="select">
                                    <option value=" ">Selecciona una hora... </option>

                                    @for ($i=7; $i <=20; $i++) <option value="{{$i}}:00:00">{{ $i }}</option>
                                        @endfor


                                </select>
                                @error('HoraFinal') <span style="color:red;" class="error">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full shadow-sm rounde-md sm:ml-3 sm:w-auto">
                            <button wire:click.prevent="guardar()" data-dismiss="modal" type="button"
                                class="inline-flex justify-center w-full px-4 py-2 text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5 ">Guardar</button>
                        </span>
                        
                        <span class="flex w-full shadow-sm rounde-md sm:ml-3 sm:w-auto">
                            <a type="submit" style="text-decoration:none" 
                                class="inline-flex justify-center w-full px-4 py-2 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5 "
                                href=" {{ url('/programacion-Asesoria') }}"><span
                                    aria-hidden="true close-btn">Cancelar</span></a>
                        </span>

                    </div>
                </form>

                <div class="py-12">
                    <div class="mx-auto max-w-7x1 sm:px6 lg:px-8">
                        <p align="center"> Horario del Docente</p>
                        <table wire:model='selectHD' class="table table-condensed table-bordered table-responsive-sm">

                            <thead>

                                <tr class="text-white bg-green-600">
                                    <th class="px-4 py-2 uppercase cursor-pointer"> Matería </th>
                                    <th class="px-4 py-2 "> Lunes </th>
                                    <th class="px-4 py-2 "> Martes </th>
                                    <th class="px-4 py-2 "> Miercoles </th>
                                    <th class="px-4 py-2"> Jueves </th>
                                    <th class="px-4 py-2 "> viernes </th>
                                    <th class="px-4 py-2"> sábado </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vistaDH as $hora)
                                <tr>

                                    <td>{{$hora->materia}}</td>

                                    <td>{{$hora->Lunes}}</td>
                                    <td>{{$hora->Martes}}</td>
                                    <td>{{$hora->Miercoles}}</td>
                                    <td>{{$hora->Jueves}}</td>
                                    <td>{{$hora->Viernes}}</td>
                                    <td>{{$hora->Sabado}}</td>

                                </tr>
                                @endforeach



                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="py-12">
                    <div class="mx-auto max-w-7x1 sm:px6 lg:px-8">
                        <p align="center"> Horario del Alumno</p>

                        <table class="table table-condensed table-bordered table-responsive-sm">
                            <thead>

                                <tr class="text-white bg-green-600">
                                    <th class="px-4 py-2 uppercase cursor-pointer">
                                        Matería
                                    </th>

                                    <th class="px-4 py-2 ">

                                        Lunes

                                    </th>


                                    <th class="px-4 py-2 ">

                                        Martes

                                    </th>


                                    <th class="px-4 py-2 ">

                                        Miercoles

                                    </th>
                                    <th class="px-4 py-2">

                                        Jueves

                                    </th>
                                    <th class="px-4 py-2 ">

                                        viernes

                                    </th>

                                    <th class="px-4 py-2">
                                        sábado
                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($vista as $hor)
                                <tr>

                                    <td>{{$hor->materia}}</td>

                                    <td>{{$hor->Lunes}}</td>
                                    <td>{{$hor->Martes}}</td>
                                    <td>{{$hor->Miercoles}}</td>
                                    <td>{{$hor->Jueves}}</td>
                                    <td>{{$hor->Viernes}}</td>
                                    <td>{{$hor->Sabado}}</td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>

                @endif

            </div>
        </div>
    </div>
</div>