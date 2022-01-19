<template>
    <form action="" @submit='createFoto(foto)'>
        <h4 class="text-center font-weight-bold">Formulario de creación de foto</h4>
        <div class="form-group pt-1">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" onchange="cargarImg()">
        </div>
        <div class="form-group pt-1">
            <label for="evento">Evento:</label>

            <select name="evento" id="evento">
                <option value="">
                    
                </option>
            </select>
        </div>

    </form>
</template>