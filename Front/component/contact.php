<div class="flex-container">
    <div class="row justify-content-center" style="padding-bottom:20px; padding-top:40px">
        <!-- Imagen y texto inicial -->
        <div class="containerTxtImg">
            <img class="imageTxtImg" src=src/media/imgTitulos/it2.webp alt="Image">       
            <!-- <img class="imageTxtImg" src=src/media/nosotros/nosotros.webp   width="100%" id="img_nosotros">        -->
            <h1 class="textTxtImg">CONTACTO</h1>
        </div>
    </div>
</div>
<div class="container">    
        <div class="row justify-content-center" style="margin-top: 40px">            
            <div class="col-md-6">
                <form id="contactForm" class="form-control">
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" placeholder="Juan ">
                    </div>
                    <div class="mb-3">
                        <label for="Apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="Apellido" placeholder="Perez">
                    </div>
                    <div class="mb-3">
                        <label for="Correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="Correo" placeholder="JuanPerez@correo.cl">
                    </div>
                    <div class="mb-3">
                        <label for="Servicio" class="form-label">Servicio</label>
                        <select class="form-select" id="Servicios" aria-label="Servicios">
                            <option selected disabled>Seleccione una opción</option>
                            <option value="1">Parcelas</option>
                            <option value="2">Casas Con Parcelas</option>
                            <option value="3">Solo Terreno</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="Mensaje" rows="3"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="agreeTerms">
                    <label class="form-check-label" for="agreeTerms">Estoy de acuerdo con los términos y condiciones</label>
                </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="simulateResponse">
                        <label class="form-check-label" for="simulateResponse">Simular respuesta deseada</label>
                    </div>
                    <button type="button" class="btn btn-outline-success"><i class="bi bi-send"></i> Enviar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                </form>
            </div>
            <div class="col-md-6">
                <map name="">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13304.168897091351!2d-70.68116115!3d-33.5262878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662db1d0355acf3%3A0xd62dfac41367b16a!2sClub%20Universidad%20de%20Chile!5e0!3m2!1ses-419!2scl!4v1715574692949!5m2!1ses-419!2scl" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </map>
            </div>
        </div>
    </div>