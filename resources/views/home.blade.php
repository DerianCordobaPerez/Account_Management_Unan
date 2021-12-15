@extends('layouts.app', ['title' => 'Panel principal'])

@section('content')

    <form class="d-flex justify-content-end">
        <div class="input-group m-4 w-25">
            <input type="email" class="form-control" placeholder="Barra de busqueda">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
            </span>
        </div>
    </form>

    <div class="container">
        <div class="row">
             <!-- card 1 -->
            
             <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        texto
                    </div>
                    <div class="card-body">
                        hola
                    </div>
                    <div class="card-footer">
                        hola
                    </div>
                </div>

                <!-- card 2 -->
                <div class="card shadow my-4    ">
                    <div class="card-header">
                        texto
                    </div>
                    <div class="card-body">
                        hola
                    </div>
                    <div class="card-footer">
                        hola
                    </div>
                </div>

            </div>
            
             

             <!-- card 3 -->
            
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="fw-bold"> Historial - {{auth()->user()->names}}</h5>
                    </div>
                    <div class="card-body">
                            <!-- Acordion -->
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                      <ul class="list-unstyled">
                                          <li class="fw-bold">
                                            26 Diciembre 2021 
                                          </li>
                                          <li>
                                            C$ 300.30
                                          </li>
                                      </ul>
                                      
                                    </button>
                                  </h2>
                                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                      Accordion Item #2
                                    </button>
                                  </h2>
                                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                      Accordion Item #3
                                    </button>
                                  </h2>
                                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                  </div>
                                </div>
                              </div>
                              <!-- end acordion -->                        
                    </div>
                    <div class="card-footer text-center">
                        <a href="#">Ver todas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
