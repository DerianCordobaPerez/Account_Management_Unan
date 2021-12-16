<div class="card shadow">
    <div class="card-header">
        <h5 class="fw-bold text-center text-blue">
            Historial de facturas - {{ auth()->user()->names }}
        </h5>
    </div>
    <div class="card-body">
        <!-- Acordion -->
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed text-blue" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Diciembre 2021

                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body d-flex justify-content-between">
                        <div >
                            <ul class="list-unstyled">
                                <li class="fw-bold">
                                    29 Diciembre 2021
                                </li>
                                <li>
                                    C$ 390.09
                                </li>
                            </ul>
                        </div>
                        <div>
                            <a href="#" class="text-info"> <i class="bi bi-download"></i> Ver factura</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed text-blue" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Noviembre 2021
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body d-flex justify-content-between">
                        <div >
                            <ul class="list-unstyled">
                                <li class="fw-bold">
                                    23 Noviembre 2021
                                </li>
                                <li>
                                    C$ 460.50
                                </li>
                            </ul>
                        </div>
                        <div>
                            <a href="#" class="text-info"> <i class="bi bi-download"></i> Ver factura</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed text-blue" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Septiembre 2021
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body d-flex justify-content-between">
                        <div >
                            <ul class="list-unstyled">
                                <li class="fw-bold">
                                    27 Septiembre 2021
                                </li>
                                <li>
                                    C$ 290.30
                                </li>
                            </ul>
                        </div>
                        <div>
                            <a href="#" class="text-info"> <i class="bi bi-download"></i> Ver factura</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end acordion -->
    </div>
    <div class="card-footer text-center">
        <a href="#">Ver todas</a>
    </div>
</div>
