<?php
!isset($permisos) && header("Location: /permisos");

session_start();
//$_SESSION["usuarioid_edit"] = $usuarios["id"];
$_SESSION["usuarioid_edit"] = $permisos["id"];

//var_dump($permisos["rol_id"]);
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<div class="h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50">

    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg p-8 m-4 max-w-xl w-full show-modal">
                <h2 class="text-2xl font-bold mb-8">Editar Permisos</h2>
                <form id="editPermisos" action="/permisos/update" method="post">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="correo">Correo:</label>
                        <input type="text" id="correo" name="correo" disabled value="<?= $permisos["correo"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Correo">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="rol_id">Rol:</label>
                        <div class="flex col-span-2 sm:col-span-1">
                            <input id="rol_id" name="" disabled value="<?= $permisos["rol_id"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Rol del Usuario">
                            
                            <select id="rolesUsuarios" name="rol_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value='' selected disabled>Seleccione un Rol</option>
                                <option value='1'>Administrador</option>
                                <option value='2'>Maestro</option>
                                <option value='3'>Alumno</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="estatus">Estatus:</label>
                        <div class="flex col-span-2 sm:col-span-1">
                            <input type="text" id="estatus" disabled name="" value="<?= $permisos["estatus"] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" placeholder="Estatus del Usuario">

                            <select id="estatusUsuarios" name="estatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value='' selected disabled>Seleccione un Estatus</option>
                                <option value='1'>Activo</option>
                                <option value='0'>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Guardar cambios
                        </button>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline close-modal">
                            <a href="/permisos">Cerrar</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Cambiando los roles del menú desplegable -->
<script type="text/javascript">
    // Actualizar el valor del input cuando cambia el valor del select
    document.getElementById('rolesUsuarios').addEventListener('change', function() {
        var valorSeleccionadoRol = this.value;
        document.getElementById('rol_id').value = valorSeleccionadoRol;
    });

    // Actualizar el valor del input cuando cambia el valor del select
    document.getElementById('estatusUsuarios').addEventListener('change', function() {
        var valorSeleccionadoEstatus = this.value;
        document.getElementById('estatus').value = valorSeleccionadoEstatus;
        //$permisos["rol_id"] = valorSeleccionado;
    });
</script>