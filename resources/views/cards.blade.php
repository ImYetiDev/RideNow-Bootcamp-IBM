 <!-- Sale & Revenue Start -->

 <div class="container-fluid pt-4 px-4">
     <div class="row g-4">
         <div class="col-sm-6 col-xl-3" onclick="location.href='{{ route('Alquilar.index') }} '">
             <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2"
                 id="alquiler">
                 <i class="bi bi-bicycle fa-3x text-success"
                     id="alquilerIcon"></i>
                 <div class="ms-3 w-50">
                     <p class="mb-2"
                         id="alquilerText">Alquilar</p>
                     <h6 class="mb-0">Bicicleta</h6>
                 </div>
             </div>
         </div>

         <div class="col-sm-6 col-xl-3" onclick="location.href='{{ route('Evento.index') }} '">
             <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2"
                 id="evento">
                 <i class="bi bi-bicycle fa-3x text-success"
                     id="eventoIcon"></i>
                 <div class="ms-3 w-50">
                     <p class="mb-2"
                         id="eventoText">Revisar</p>
                     <h6 class="mb-0">Eventos</h6>
                 </div>
             </div>
         </div>

         <!-- <div class="col-sm-6 col-xl-3" onclick="location.href='{{ route('bicicletas.map') }}'">
             <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2"
                 id="bloque">
                 <i class="bi bi-map fa-3x text-success"
                     id="biciIcon"></i>
                 <div class="ms-3 w-50">
                     <p class="mb-2"
                         id="bloqueText">Mirar</p>
                     <h6 class="mb-0">Mapa</h6>
                 </div>
             </div>
         </div> -->

         <div class="col-sm-6 col-xl-3" onclick="location.href='{{ route('bicicletas.maps') }}'">
             <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-2"
                 id="bloque">
                 <i class="bi bi-map fa-3x text-success"
                     id="biciIcon"></i>
                 <div class="ms-3 w-50">
                     <p class="mb-2"
                         id="bloqueText">Mirar</p>
                     <h6 class="mb-0">Mapa</h6>
                 </div>
             </div>
         </div>
     </div>
 </div>