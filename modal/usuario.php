
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mx-auto" method="post" id="form_mascotas">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email:</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono:</label>
                        <input type="number" class="form-control" id="telefono" name="telefono">
                    </div>
                   
                    <div class="mb-3">
                        <label for="status" class="form-label">status:</label>
                        <select class="form-select" id="status" name="status">
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_roles" class="form-label">id_roles:</label>
                        <input type="number" class="form-control" id="id_roles" name="id_roles">
                    </div>
                    


            </div>
            <div class="modal-footer">

           

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        
            </form>
        </div>
    </div>
</div>

