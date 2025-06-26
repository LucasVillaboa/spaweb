@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-xl font-bold">Bienvenido, {{ Auth::user()->name }} 👋</h2>
    <h2 class="text-center text-teal mb-4">Solicitar Turno</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form id="form-tarjeta" action="{{ route('cliente.turno.solicitar') }}" method="POST" class="mx-auto" style="max-width: 600px;">
        @csrf

        <!-- Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <!-- Email -->
        <!--<div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div> -->

        <!-- Teléfono -->
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" name="telefono" id="telefono" class="form-control" required>
        </div>

        <!-- Servicios -->
        <div class="mb-3">
            <label for="servicios" class="form-label">Seleccioná uno o más servicios</label>
            <select name="servicios[]" id="servicios" class="form-select" multiple required>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" data-precio="{{ $servicio->precio }}">
                        {{ $servicio->nombre }} - ${{ number_format($servicio->precio, 2, ',', '.') }}
                    </option>
                @endforeach
            </select>

        </div>

        <!-- Total estimado -->
        <div class="mt-3">
            <strong>Total estimado:</strong> $<span id="total">0.00</span>
        </div>
<div id="descuentoAviso" class="text-success mt-2" style="display: none;">
    ¡Descuento aplicado del 15% por pagar con débito dentro de las 48 hs! 🎉
</div>
        <!-- Profesional -->
        <div class="mb-3">
            <label for="profesional_id" class="form-label">Profesional</label>
            <select name="profesional_id" id="profesional_id" class="form-select" required>
                <option value="">Seleccioná un profesional</option>
                @foreach($profesionales as $profesional)
                    <!--<option value="{{ $profesional->id }}">{{ $profesional->name }}</option>-->
                      <option value="{{ $profesional->id }}">{{ $profesional->name }}</option>

                @endforeach
            </select>
        </div> 
       <!--
        <div class="mb-3">
    <label for="profesional_id" class="form-label">Profesional</label>
    <select name="profesional_id" id="profesional_id" class="form-select" required>
        <option value="">-- Seleccionar --</option>
        @foreach ($profesionales as $profesional)
            <option value="{{ $profesional->id }}">{{ $profesional->name }}</option>
        @endforeach
    </select>
</div> -->

        <!-- Fecha y hora -->
        <div class="mb-3">
            <label for="fecha_hora" class="form-label">Fecha y Hora del Turno</label>
            <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control" required>

             @error('fecha_hora')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
        </div>

        <!-- Medio de pago -->
        <div class="mb-3">
            <label for="medio_pago" class="form-label">Medio de Pago</label>
            <select name="medio_pago" id="medio_pago" class="form-select" required>
                <option value="">Seleccioná un medio de pago</option>
                <option value="debito">Tarjeta de Débito (15% de descuento si se paga antes de 48 hs)</option>
                <option value="credito">Tarjeta de Crédito</option>
                <option value="efectivo">Efectivo</option>
            </select>
        </div>

        <!-- Tarjeta visual -->
        <div id="tarjetaVisual" class="tarjeta-visual mb-4" style="display: none;">
            <img id="logoMarca" src="" alt="" class="logo-tarjeta" />
            <div class="numero" id="numPreview">•••• •••• •••• ••••</div>
            <div class="nombre" id="nombrePreview">NOMBRE DEL TITULAR</div>
            <div class="vencimiento" id="vencPreview">MM/AA</div>
        </div>

        <!-- Datos de tarjeta -->
        <div id="datos-tarjeta" class="mb-3" style="display: none;">
            <div class="mb-2">
                <label for="numero_tarjeta" class="form-label">Número de tarjeta</label>
                <input type="text" name="numero_tarjeta" id="numero_tarjeta" class="form-control" maxlength="19" inputmode="numeric" pattern="\d*">
            </div>
            <div class="mb-2">
                <label for="nombre_titular" class="form-label">Nombre del titular</label>
                <input type="text" name="nombre_titular" id="nombre_titular" class="form-control">
            </div>
            <div class="row">
                <div class="col mb-2">
                    <label for="vencimiento" class="form-label">Vencimiento</label>
                    <input type="text" name="vencimiento" id="vencimiento" class="form-control" placeholder="MM/AA" maxlength="5">
                </div>
                <div class="col mb-2">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" name="cvv" id="cvv" class="form-control" maxlength="4" inputmode="numeric" pattern="\d*">
                </div>
            </div>
        </div>

        <!-- Comentarios -->
        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios (opcional)</label>
            <textarea name="comentarios" id="comentarios" class="form-control" rows="3"></textarea>
        </div>

        <!-- Botón enviar -->
        <div class="text-center">
            <button type="submit" class="btn btn-teal px-4">Solicitar</button>
        </div>

        <!-- WhatsApp alternativa -->
        <div class="mt-5 p-4 bg-light border rounded text-center shadow-sm">
            <h5 class="mb-3">¿Preferís pedir tu turno por WhatsApp?</h5>
            <p class="mb-4">También podés enviar un mensaje al siguiente número y coordinar tu turno de forma rápida:</p>
            <a href="https://wa.me/5493624123456?text=Hola%2C%20quiero%20un%20turno%20para..." target="_blank" class="btn btn-success btn-lg">
                <i class="bi bi-whatsapp me-2"></i> Pedir turno por WhatsApp
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<!-- Choices.js -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- Cleave.js -->
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>

<script>
// VALIDACIONES VISUALES TELÉFONO, TARJETA Y CVV

// Teléfono: solo números, entre 7 y 15 dígitos
const telefonoInput = document.getElementById('telefono');
telefonoInput.addEventListener('blur', () => {
    const valor = telefonoInput.value.trim();
    if (!/^\d{7,15}$/.test(valor)) {
        mostrarError(telefonoInput, 'Ingresá un teléfono válido (solo números, entre 7 y 15 dígitos)');
    } else {
        ocultarError(telefonoInput);
    }
});
telefonoInput.addEventListener('input', () => ocultarError(telefonoInput));

// Número de tarjeta: solo dígitos, entre 13 y 19 caracteres
const numeroTarjetaInput = document.getElementById('numero_tarjeta');
numeroTarjetaInput.addEventListener('blur', () => {
    const valor = numeroTarjetaInput.value.replace(/\s+/g, '');
    if (valor.length < 13 || valor.length > 19 || !/^\d+$/.test(valor)) {
        mostrarError(numeroTarjetaInput, 'Ingresá un número de tarjeta válido (13 a 19 dígitos)');
    } else {
        ocultarError(numeroTarjetaInput);
    }
});
numeroTarjetaInput.addEventListener('input', () => ocultarError(numeroTarjetaInput));

// CVV: 3 o 4 dígitos numéricos
const cvvInput = document.getElementById('cvv');
cvvInput.addEventListener('blur', () => {
    const valor = cvvInput.value.trim();
    if (!/^\d{3,4}$/.test(valor)) {
        mostrarError(cvvInput, 'Ingresá un CVV válido (3 o 4 dígitos)');
    } else {
        ocultarError(cvvInput);
    }
});
cvvInput.addEventListener('input', () => ocultarError(cvvInput));

// Funciones reutilizables
function mostrarError(inputElem, mensaje) {
    let errorElem = inputElem.parentNode.querySelector('.error-msg');
    if (!errorElem) {
        errorElem = document.createElement('div');
        errorElem.className = 'error-msg';
        errorElem.style.color = 'red';
        errorElem.style.marginTop = '4px';
        inputElem.parentNode.appendChild(errorElem);
    }
    errorElem.textContent = mensaje;
}

function ocultarError(inputElem) {
    const errorElem = inputElem.parentNode.querySelector('.error-msg');
    if (errorElem) errorElem.remove();
}


document.addEventListener('DOMContentLoaded', function () {
    // Inicialización Choices.js
    new Choices('#servicios', { removeItemButton: true, searchEnabled: true, shouldSort: false });
    new Choices('#profesional_id', { searchEnabled: false, shouldSort: false });
    const medioPago = new Choices('#medio_pago', { searchEnabled: false, shouldSort: false });

    const datosTarjeta = document.getElementById('datos-tarjeta');
    const tarjetaVisual = document.getElementById('tarjetaVisual');
    const vencimientoInput = document.getElementById('vencimiento');

    function toggleCamposTarjeta() {
        const valor = medioPago.getValue(true);
        const mostrar = (valor === 'debito' || valor === 'credito');
        datosTarjeta.style.display = mostrar ? 'block' : 'none';
        tarjetaVisual.style.display = mostrar ? 'block' : 'none';

        if (mostrar && vencimientoInput && !vencimientoInput.dataset.cleave) {
            new Cleave(vencimientoInput, {
                date: true,
                datePattern: ['m', 'y'],
                delimiter: '/'
            });
            vencimientoInput.dataset.cleave = true;

          
        }
    }vencimientoInput.addEventListener('blur', function () {
    const [mes, anio] = vencimientoInput.value.split('/');
    const ahora = new Date();
    const mesActual = ahora.getMonth() + 1;
    const anioActual = ahora.getFullYear() % 100;

    if (!mes || !anio || isNaN(mes) || isNaN(anio) || +mes < 1 || +mes > 12 || +anio < anioActual || (+anio == anioActual && +mes < mesActual)) {
        // En vez de alert, mostrar error visible
        mostrarErrorVencimiento('Ingresá una fecha de vencimiento válida (MM/AA)');
    } else {
        ocultarErrorVencimiento();
    }
});
vencimientoInput.addEventListener('input', ocultarErrorVencimiento);


function mostrarErrorVencimiento(mensaje) {
    let errorElem = document.getElementById('error-vencimiento');
    if (!errorElem) {
        errorElem = document.createElement('div');
        errorElem.id = 'error-vencimiento';
        errorElem.style.color = 'red';
        errorElem.style.marginTop = '4px';
        vencimientoInput.parentNode.appendChild(errorElem);
    }
    errorElem.textContent = mensaje;
}

function ocultarErrorVencimiento() {
    const errorElem = document.getElementById('error-vencimiento');
    if (errorElem) errorElem.remove();
}


    document.getElementById('medio_pago').addEventListener('change', toggleCamposTarjeta);
    toggleCamposTarjeta();

    // Visualización dinámica tarjeta
    const numeroInput = document.getElementById('numero_tarjeta');
    const nombreInput = document.getElementById('nombre_titular');
    const vencInput = document.getElementById('vencimiento');

    numeroInput.addEventListener('input', function () {
        const valor = numeroInput.value.replace(/\D/g, '').slice(0, 16);
        const formateado = valor.replace(/(.{4})/g, '$1 ').trim();
        document.getElementById('numPreview').textContent = formateado.padEnd(19, '•');

        const logo = document.getElementById('logoMarca');
        if (valor.startsWith('4')) {
            logo.src = '/images/visa-logo.png';
        } else if (valor.startsWith('5')) {
            logo.src = '/images/mastercard-logo.png';
        } else {
            logo.src = '';
        }
    });

    nombreInput.addEventListener('input', () => {
        document.getElementById('nombrePreview').textContent = nombreInput.value.toUpperCase() || 'NOMBRE DEL TITULAR';
    });

    vencInput.addEventListener('input', () => {
        document.getElementById('vencPreview').textContent = vencInput.value || 'MM/AA';
    });

    // Cálculo total y validaciones
    const serviciosSelect = document.getElementById('servicios');
    const fechaHoraInput = document.getElementById('fecha_hora');
    const medioPagoSelect = document.getElementById('medio_pago');
    const totalSpan = document.getElementById('total');
    const descuentoAviso = document.getElementById('descuentoAviso');

    function calcularTotal() {
        let total = 0;
        const opcionesSeleccionadas = serviciosSelect.selectedOptions;

        // Sumar precios
        Array.from(opcionesSeleccionadas).forEach(opcion => {
            total += parseFloat(opcion.dataset.precio);
        });

        const fechaHoraSeleccionada = new Date(fechaHoraInput.value);
        const ahora = new Date();
        const diferenciaEnHoras = (fechaHoraSeleccionada - ahora) / (1000 * 60 * 60);
        const medio = medioPagoSelect.value;

        // Mostrar mensaje de descuento y aplicar descuento si corresponde
        if (medio === 'debito' && diferenciaEnHoras > 0 && diferenciaEnHoras <= 48) {
            total *= 0.85;
            descuentoAviso.style.display = 'block';
        } else {
            descuentoAviso.style.display = 'none';
        }

        totalSpan.textContent = total.toLocaleString('es-AR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Validación: fecha mínima 48 hs antes
    fechaHoraInput.addEventListener('change', function () {
        const seleccionada = new Date(this.value);
        const ahora = new Date();
        const dentroDe48Horas = new Date(ahora.getTime() + 48 * 60 * 60 * 1000);

        if (seleccionada < dentroDe48Horas) {
            alert('La fecha del turno debe ser al menos 48 horas desde ahora.');
            this.value = '';
        }

        calcularTotal(); // actualizar total si cambió
    });

    serviciosSelect.addEventListener('change', calcularTotal);
    medioPagoSelect.addEventListener('change', calcularTotal);
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const profesionalSelect = document.getElementById('profesional_id');
    const fechaHoraInput = document.getElementById('fecha_hora');

    async function bloquearHorarios() {
        const profesionalId = profesionalSelect.value;
        const fechaCompleta = fechaHoraInput.value;

        if (!profesionalId || !fechaCompleta) return;

        const fecha = fechaCompleta.split('T')[0]; // sacamos solo la fecha YYYY-MM-DD

        try {
            const response = await fetch(`/api/turnos-ocupados?profesional_id=${profesionalId}&fecha=${fecha}`);
            const horasOcupadas = await response.json();

            const horaSeleccionada = fechaCompleta.split('T')[1]; // HH:MM

            if (horasOcupadas.includes(horaSeleccionada + ":00")) {
                alert('Ese horario ya está ocupado. Por favor, elegí otro.');
                fechaHoraInput.value = ''; // borra selección
            }

        } catch (error) {
            console.error('Error al obtener turnos ocupados', error);
        }
    }

    fechaHoraInput.addEventListener('change', bloquearHorarios);
});
</script>

@endpush


