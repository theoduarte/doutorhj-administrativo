@extends('layouts.base')

@section('title', 'Home - DoutorHJ')

@push('scripts')

@endpush

@section('content')
<div class="shell box-busca busca cell-xs-12">

            <form class="offset-top-10 offset-sm-top-30">
                <div class="group-sm group-top">

                    <div class="group-item element-fullwidth" style="max-width: 300px;">

                        <div class="form-group">
                            <select class="form-control" id="form-filter-location" name="location" data-minimum-results-for-search="Infinity">
                                        <option value="1">Selecione o tipo de atendimento</option>
                                        <option value="2">Consulta</option>
                                        <option value="4">Exames e procedimentos</option>
                                        <option value="4">Odontologia</option>
                                    </select>
                        </div>
                    </div>

                    <div class="group-item element-fullwidth" style="max-width: 300px;">
                        <div class="form-group">
                            <select class="form-control" id="form-filter-location" name="location" data-minimum-results-for-search="Infinity">
                                        <option value="1">Com</option>
                                        <option value="2">Clínica Médica</option>
                                        <option value="4">Ginecologia</option>
                                        <option value="4">Pediatria</option>
                                        <option value="3">Urologia</option>

                                      </select>
                        </div>
                    </div>

                    <div class="group-item element-fullwidth" style="max-width: 300px;">
                        <div class="form-group">

                            <select class="form-control" id="form-filter-location" name="location" data-minimum-results-for-search="Infinity">
                                        <option value="1">Local</option>
                                        <option value="2">Plano Piloto</option>
                                        <option value="4">Taguatinga</option>
                                        <option value="4">Ceilândia</option>
                                        <option value="3">Águas Claras</option>

                                      </select>
                        </div>
                    </div>
                    <div class="reveal-block reveal-lg-inline-block">
                        <button class="btn btn-primary element-fullwidth" type="button" style="max-width: 170px; min-width: 170px; min-height: 50px;">Buscar</button>
                    </div>
                </div>


            </form>
        </div>



        <!-- Section select-->

        <main class="page-content">
            <!-- Skills-->
            <section class="section-98 bg-azul" id="section-skills">
                <div class="shell-wide">
                    <div class="range range-xs-center">
                        <div class="cell-sm-10 cell-lg-12 branco como-funciona-icones">
                            <div class="range range-xs-center">


                                <div class="cell-md-2 cell-sm-5 wow fadeInUp" data-wow-delay="0.3s">
                                    <!-- Counter type 2-->
                                    <div class="counter-type-2"><span class="icon linearicons-select2 text-malibu"></span>

                                        <div class="text-uppercase text-spacing-60 offset-top-14">
                                            <h6>Selecione o tipo de atendimento</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-md-2 cell-sm-5 offset-top-66 offset-sm-top-0 wow fadeInUp" data-wow-delay="0.6s">
                                    <!-- Counter type 2-->
                                    <div class="counter-type-2"><span class="icon linearicons-map2 text-malibu"></span>

                                        <div class="h6 text-uppercase text-spacing-60 offset-top-14">
                                            <h6>Escolha a localidade</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-md-2 cell-sm-5 offset-top-66 offset-sm-top-0 wow fadeInUp" data-wow-delay="0.9s">
                                    <!-- Counter type 2-->
                                    <div class="counter-type-2"><span class="icon linearicons-calendar-check text-carrot"></span>
                                        <div class="offset-top-10">

                                        </div>
                                        <div class="h6 text-uppercase text-spacing-60 offset-top-14">
                                            <h6>Sugira dois dias e horários</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell-md-2 cell-sm-5 offset-top-66 offset-sm-top-0 wow fadeInUp" data-wow-delay="1.2s">
                                    <!-- Counter type 2-->
                                    <div class="counter-type-2"><span class="icon linearicons-cashier text-red"></span>

                                        <div class="h6 text-uppercase text-spacing-60 offset-top-14">
                                            <h6>Realize o pagamento</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Core features-->
            <section class="section-98 section-md-124" id="beneficios">
                <div class="shell-wide">
                    <h3><span class="big"> Benefícios </span></h3>
                    <hr class="divider bg-mantis">
                    <div class="offset-top-66 icones-beneficios">
                        <div class="range range-xs-center grid-group-md">
                            <div class="cell-xs-6 cell-sm-3 cell-md-4 cell-xl-4">
                                <div class="blurb-mini wow fadeInLeft" data-wow-delay="0.6s">
                                    <div class="img-wrap"><img src="/libs/home-template/img/landing/landing-46-40x40.png"></div>
                                    <h4>Mais opções</h4>
                                    <p class="caption icone-texto">Ampla rede credenciada no DF</p>
                                </div>
                            </div>
                            <div class="cell-xs-6 cell-sm-3 cell-md-4 cell-xl-4">
                                <div class="blurb-mini wow fadeInLeft" data-wow-delay="0.4s">
                                    <div class="img-wrap"><img src="/libs/home-template/img/landing/landing-48-40x40.png"></div>
                                    <h4>Economia</h4>
                                    <div class="caption icone-texto">Custos acessíveis para consultas e exames</div>
                                </div>
                            </div>
                            <div class="cell-xs-6 cell-sm-3 cell-md-4 cell-xl-4">
                                <div class="blurb-mini wow fadeInLeft" data-wow-delay="0.4s">
                                    <div class="img-wrap"><img src="/libs/home-template/img/landing/landing-180-40x40.png"></div>
                                    <h4>Liberdade</h4>
                                    <div class="caption icone-texto">Sem mensalidades ou taxa de adesão</div>
                                </div>
                            </div>
                            <div class="cell-xs-6 cell-sm-3 cell-md-4 cell-xl-4">
                                <div class="blurb-mini wow fadeInLeft" data-wow-delay="0.2s">
                                    <div class="img-wrap"><img src="/libs/home-template/img/landing/landing-47-38x47.png"></div>
                                    <h4>Escolha</h4>
                                    <div class="caption icone-texto">Mais de 100 mil médicos credenciados</div>
                                </div>
                            </div>
                            <div class="cell-xs-6 cell-sm-3 cell-md-4 cell-xl-4">
                                <div class="blurb-mini wow fadeInLeft">
                                    <div class="img-wrap"><img src="/libs/home-template/img/landing/landing-50-48x36.png"></div>
                                    <h4>Cobertura</h4>
                                    <div class="caption icone-texto">Mais de 20 mil clínicas credenciadas</div>
                                </div>
                            </div>
                            <div class="cell-xs-6 cell-sm-3 cell-md-4 cell-xl-4">
                                <div class="blurb-mini wow fadeInRight">
                                    <div class="img-wrap"><img src="/libs/home-template/img/landing/landing-49-41x41.png"></div>
                                    <h4>Versatilidade</h4>
                                    <div class="caption icone-texto">Várias opções para pagamento</div>
                                </div>
                            </div>
                            <div class="cell-xs-6 cell-sm-3 cell-md-4 cell-xl-4">
                                <div class="blurb-mini wow fadeInRight" data-wow-delay="0.2s">
                                    <div class="img-wrap"><img src="/libs/home-template/img/landing/landing-181-40x40.png"></div>
                                    <h4>Acolhimento</h4>
                                    <div class="caption icone-texto">Sem carência</div>
                                </div>
                            </div>
                            <div class="cell-xs-6 cell-sm-3 cell-md-4 cell-xl-4">
                                <div class="blurb-mini wow fadeInRight" data-wow-delay="0.2s">
                                    <div class="img-wrap"><img src="/libs/home-template/img/landing/landing-182-40x40.png"></div>
                                    <h4>Rapidez</h4>
                                    <div class="caption icone-texto">Comodidade no agendamento da sua consulta ou exame</div>
                                </div>
                            </div>
                            <div class="cell-xs-6 cell-sm-3 cell-md-4 cell-xl-4">
                                <div class="blurb-mini wow fadeInRight" data-wow-delay="0.2s">
                                    <div class="img-wrap"><img src="/libs/home-template/img/landing/landing-183-40x40.png"></div>
                                    <h4>Memória</h4>
                                    <div class="caption icone-texto">Acompanhamento de todo o seu histórico</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Buy Now-->


            <section>
                <!-- Call to action type 2-->
                <section class="section-66 bg-azul context-dark">
                    <div class="shell">
                        <div class="range range-xs-middle range-condensed">
                            <div class="cell-md-8 cell-lg-9 text-center text-md-left">
                                <h2><span class="big">Ficou mais fácil e rápido agendar uma consulta</span></h2>
                            </div>
                            <div class="cell-md-4 cell-lg-3 offset-top-41 offset-md-top-0"><a class="btn btn-icon btn-lg btn-default btn-anis-effect btn-icon-btn-icon-left" href="#">Agende uma consulta</a>
                            </div>
                        </div>
                    </div>
                </section>
            </section>



            <!-- Extremely Responsive and Retina-->
            <section class="section-66 bg-lighter">
                <div class="shell-wide">
                    <div class="range range-xs-center grid-group-md">
                        <div class="cell-sm-10 cell-md-6 cell-xl-7 reveal-sm-block"><img class="img-responsive wow fadeInLeft reveal-sm-inline-block" src="/libs/home-template/img/landing/mac-mockup.png" width="780" height="462" alt data-wow-delay="0.3s"></div>
                        <div class="cell-sm-8 cell-md-6 cell-xl-4 text-md-left offset-md-top-41">
                            <h1 class="vermelho-1">Marque a sua consulta <br class="veil reveal-lg-block">de qualquer lugar</h1>
                            <p>Seja na rua ou em casa você pode agendar seu <br class="veil reveal-lg-block"> atendimento de forma rápida e fácil</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="context-dark">
                <div class="parallax-container" data-parallax-img="/libs/home-template/img/intros/brasilia.jpg">
                    <div class="parallax-content">
                        <div class="shell section-98 section-sm-110">
                            <h1>Encontre especialidades em todos as cidades do Distrito Federal e Região</h1>
                            <div class="range range-xs-center offset-top-20">
                                <div class="cell-sm-10 cell-lg-12">
                                    <p>Com Doutor Hoje você encontra profissionais e clínicas em todo o Distrito Federal e também do Entorno de Brasília</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- eCommerce Ready-->
            <section class="section-top-66 section-xl-top-110">
                <div class="shell-wide">
                    <div class="range range-xs-center range-lg-bottom range-xl-right grid-group-md">
                        <div class="cell-sm-8 cell-lg-4 cell-xl-3 text-lg-left">
                            <div class="section-lg-bottom-66">
                                <h1 class="vermelho-1">Mais de 23 especialidades</h1>
                                <p>Disponíbilizamos exames de vários tipos e conectamos você a diversos médicos e terapeutas</p>
                                <ul class="list list-marked inset-left-30">
                                    <li>Clínica Médica</li>
                                    <li>Ortopedia</li>
                                    <li>Pediatria</li>
                                    <li>Ginecologia</li>
                                </ul>
                            </div>
                        </div>
                        <div class="cell-sm-10 cell-lg-8 cell-xl-7">
                            <div class="mock-up-3">
                                <div class="object object-1"><img class="shadow-drop-lg wow fadeInUp" src="/libs/home-template/img/landing/landing-111-492x358.png" width="492" height="358" alt></div>
                                <div class="object object-2"><img class="shadow-drop-lg wow fadeInUp" src="/libs/home-template/img/landing/landing-112-492x358.png" width="492" height="358" alt data-wow-delay="0.4s"></div>
                                <div class="object object-3"><img class="shadow-drop-lg wow fadeInUp" src="/libs/home-template/img/landing/landing-113-492x437.png" width="492" height="437" alt data-wow-delay="0.8s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Event Managing -->
            <section class="section-66 section-lg-top-85 section-lg-bottom-0 bg-blue-gray context-dark">
                <div class="shell-wide">
                    <div class="range range-xs-center grid-group-md">
                        <div class="cell-sm-6 cell-lg-7 cell-xl-5">
                            <div class="mock-up-4">
                                <div class="object"><img class="wow fadeInUp" src="/libs/home-template/img/landing/landing-114-676x485.png" width="676" height="485" alt></div>
                            </div>
                        </div>
                        <div class="cell-sm-8 cell-lg-5 cell-xl-3 text-lg-left">
                            <div class="inset-xl-left-50 section-lg-top-34">
                                <h1>Comodidade para você cuidar do que mais importa</h1>
                                <p>Nossa prioridade é ganhar tempo para você</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-66 bg-lighter">
                <div class="shell-wide">
                    <div class="range range-xs-center grid-group-md">

                        <div class="cell-sm-10 cell-md-4 cell-xl-3 reveal-sm-block">
                            <img class="img-responsive wow fadeInLeft reveal-sm-inline-block" src="/libs/home-template/img/iphone-app.png" alt data-wow-delay="0.3s">

                        </div>

                        <div class="cell-sm-8 cell-md-6 cell-xl-4 text-md-left offset-md-top-41 ">
                            <h1 class="wow fadeInUp azul-1">Baixe o nosso aplicativo <br class="veil reveal-lg-block">disponível na Play Store e também na Apple Store</h1>
                            <p class=" wow fadeInDown cinza-1">Seja na rua ou em casa você pode agendar seu <br class="veil reveal-lg-block"> atendimento de forma rápida e fácil</p>
                            <br/>
                            <img class="inset-xl-right-50  img-responsive wow fadeInLeft reveal-sm-inline-block" src="/libs/home-template/img/logo-google-play.png" width="190" alt data-wow-delay="0.3s">
                            <img class="img-responsive wow fadeInLeft reveal-sm-inline-block" src="/libs/home-template/img/logo-app-store.png" width="123" alt data-wow-delay="0.3s">




                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection
