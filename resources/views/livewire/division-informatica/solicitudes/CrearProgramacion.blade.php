<!-- Modal -->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendar Asesoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
            
                    <div class="row">
                        <div class="col">

                            <label for="idMateria"class="block mb-2 text-sm font-bold text-gray-700 form-control">Estudiante</label>
                            <select id="idMateria" wire:model="idMateria"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="idMateria">
                                <option value="null">Selecciona una opción... </option>
                                <option value="Autorizada">Autorizada</option>
                                <option value="Rechazada">Rechazada</option>
                               
                            </select>

                        </div>
                        <div class="col">

                            <label for="idMateria"class="block mb-2 text-sm font-bold text-gray-700 form-control">Docente</label>
                            <select id="idMateria" wire:model="idMateria"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                name="idMateria">
                                <option value="null">Selecciona una opción... </option>
                                <option value="Autorizada">Autorizada</option>
                                <option value="Rechazada">Rechazada</option>
                               
                            </select>

                        </div>
                      </div>


    
                </form>
            </div>

                <div class="px-4 py-3 modal-footer bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">

                    <span class="flex w-full shadow-sm rounde-md sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="guardar()" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-white transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5 ">Guardar</button>
                    </span>

                    <span class="flex w-full shadow-sm rounde-md sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="cerrarModal2()" type="button"
                            class="inline-flex justify-center w-full px-4 py-2 text-white transition duration-150 ease-in-out bg-red-600 border border-transparent rounded-md focus:outline-none focus:border-green-700 focus:shadow-outline-green sm:text-sm sm:leading-5 ">Cancelar</button>
                    </span>
                </div>

        </div>
    </div>
</div>