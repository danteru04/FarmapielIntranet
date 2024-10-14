@extends("layouts.template")

@section("Title", "Sobre Nosotros")
@section("Descripcion", "Conócenos")

@section("content")

    @if (session('Correcto'))
            <div class="alert alert-danger alert-dismissable fade show" role="alert">
            {{ session('Correcto') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('Incorrecto'))
            <div class="alert alert-danger alert-dismissable fade show" role="alert">
            {{ session('Incorrecto') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

    <div class = "fachada">
        <h1 class="h3 mt-3 mb-1 text-white blur">NOSOTROS</h1>
        <p class="mt-4 mb-4 text-justify text-white blur textoCentrado">FARMAPIEL CENTRO INTERNACIONAL DE COSMIATRÍA, S.A. DE C.V. es una empresa farmacéutica mexicana dedicada a la investigación, desarrollo, fabricación y comercialización de productos dermatológicos, con el objetivo de ofrecer soluciones innovadoras y eficaces para el cuidado de la piel se ha consolidado como un referente en el mercado gracias a su enfoque en la calidad y la seguridad de sus productos. Cuenta con más de 30 años brindando a la comunidad médica alternativas innovadoras y de calidad mundial, en beneficio de los pacientes con los más altos estándares de seguridad y calidad de sus productos y procesos.</p>
        <div>
            <p class="quote pr-5 blur-inline">Hacemos más con menos</p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card mt-3 black-shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubicación</h6>
                </div>
                <div class="card-body">
                    <p class="text-justify textoCentrado-100">
                        La planta de manufactura de FARMAPIEL está ubicada en <b> Eje Norte Sur No. 11, Colonia Nuevo Parque Industrial, 76809 San Juan del Río, Querétaro, México.</b>
                    </p>
                </div>
            </div>
            
        </div>
        <div class="col-lg-6">
            <div class="card mt-3">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Mapa</h6>
                </div>
                <div class="card-body">
                        Ubicación en el Mapa:
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.3203373818415!2d-99.97372582591792!3d20.36967788111984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d30b98f9094ad5%3A0xdc66784219c12840!2sEje%20Norte%20Sur%2011%2C%20Nuevo%20San%20Juan%2C%2076806%20San%20Juan%20del%20R%C3%ADo%2C%20Qro.!5e0!3m2!1ses!2smx!4v1727809728230!5m2!1ses!2smx" width="100%" height="300px" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                </div>
            </div>
            
        </div>
    </div>

    <div class="row mt-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Propósito de la Empresa</h6>
            </div>
            <div class="card-body proposito">
                <div class="col-lg-4">
                    <p class="m-1 m-1 text-justify textoCentrado-100 blur text-white">
                        Proporcionar alternativas terapéuticas en dermatología, que sean innovadoras y de calidad mundial, con la finalidad de brindar salud y bienestar a los pacientes, todo esto en beneficio de la Medicina y con un elevado compromiso con la educación médica continúa.
                    </p>
                </div>

                <div class= "col-lg-8">
                    <!--img class="img-proposito" src="/img/Imagenes Farmapiel/rsrc/blood-test-360.jpg" 
                        srcset="
                            /img/Imagenes Farmapiel/rsrc/blood-test-360.jpg 360w,
                            /img/Imagenes Farmapiel/rsrc/blood-test-640.jpg 768w,
                            /img/Imagenes Farmapiel/rsrc/blood-test-360.jpg 1366w,
                            /img/Imagenes Farmapiel/rsrc/blood-test-1920.jpg 1920w"
                        sizes="(max-width: 360px) 360px, 
                            (max-width: 768px) 768px, 
                            (max-width: 1366px) 1366px, 
                            1920px"
                        alt="Test de Sangre"-->
                </div>
            </div>
        </div>
    </div>
        
    <div class = "row card mt-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Sueño de la Empresa</h6>
        </div>
        <div class="card-body">
            <div class="col-lg-6">  

            </div>
            <div class="col-lg-6">
                <p class="m-1 m-1 text-justify textoCentrado-100">
                    Ser líderes en el mercado dermatológico, enfocados en exceder las expectativas de nuestros clientes, a través de un espíritu de servicio e innovación, buscando siempre la superación personal y profesional de nuestros colaboradores, bajo un marco de honestidad y congruencia.
                </p>
            </div>
        </div>
    </div>

@endsection