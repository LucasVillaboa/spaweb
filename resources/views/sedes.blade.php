@extends('layouts.app')

@section('content')
<section id="sedes" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center text-teal mb-4">Nuestras Sedes</h2>
    <p class="lead text-center text-muted mb-5">Conocé dónde encontrarnos y nuestros horarios de atención.</p>

    <div class="row">
      <!-- Sede 1 -->
      <div class="col-md-6 mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <h5 class="card-title text-teal">Sede Chaco</h5>
            <p class="card-text">
              Dirección: Av. Sarmiento 123, Resistencia, Chaco<br>
              Horarios: Lun a Vie de 9 a 20 hs
            </p>
            <div class="ratio ratio-16x9">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.621413597555!2d-58.98819282525203!3d-27.44990701586183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94450cf447953873%3A0xfd2dad8a1cf52713!2sAv.%20Sarmiento%20123%2C%20H3502EPH%20Resistencia%2C%20Chaco!5e0!3m2!1ses!2sar!4v1745378253236!5m2!1ses!2sar"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
              </iframe>
            </div>
          </div>
        </div>
      </div>

      <!-- Sede 2 -->
      <div class="col-md-6 mb-4">
        <div class="card shadow h-100">
          <div class="card-body">
            <h5 class="card-title text-teal">Sede Corrientes</h5>
            <p class="card-text">
              Dirección: Hipólito Yrigoyen 325, Corrientes<br>
              Horarios: Lun a Vie de 9 a 20 hs 
            </p>
            <div class="ratio ratio-16x9">
              <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0474397646226!2d-58.849034525251206!3d-27.46778241662329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456cb97e5134c7%3A0x376404882c8ad72a!2sHip%C3%B3lito%20Yrigoyen%20325%2C%20W3400ASJ%20Corrientes!5e0!3m2!1ses!2sar!4v1745378651864!5m2!1ses!2sar" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
              </iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection