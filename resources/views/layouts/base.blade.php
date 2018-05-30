<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <link rel="shortcut icon" href="/libs/comvex-template/img/favicon.ico">
    <meta name="description" content="Comvex">
    <meta name="keywords" content="doutorhj saúde consulta médico sus plano de saúde">
    <meta name="author" content="Theogenes Ferreira Duarte">
  
    <title>@yield('title', 'Doctor HJ')</title>

    @push('style')
    
    	<!-- Google fonts -->
    	<link href="https://fonts.googleapis.com/css?family=Exo:400,400i,500,500i,700,900" rel="stylesheet">
    	
    	<!-- Template css -->
        <link type="text/css" rel="stylesheet" href="/libs/home-template/css/style.css" />
        <link type="text/css" rel="stylesheet" href="/libs/home-template/css/my-style.css" />
    	    	
    	<!-- DoutorHJ Reset CSS -->
    	<link rel="stylesheet" href="/css/doutorhj.style.css">
    	
    	<!--[if lt IE 10]>
        <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="/libs/home-template/img/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
        <script src="js/html5shiv.min.js"></script>
		<![endif]-->
    	
    	<script src="/libs/comvex-template/js/jquery.min.js"></script>
    	
    	<!-- modernizr script -->
    	<script src="/libs/comvex-template/js/modernizr.min.js"></script>
    	
    	
    @endpush
    
    @stack('style')
</head>

<body>

	<div class="page text-center">
		
        <div class="page-loader page-loader-variant-1">
            <div><img class='img-responsive' style='margin-top: -20px;margin-left: -18px;' width='330' height='67' src='/libs/home-template/img/logos/logo-doutor-hoje-vertical.svg' alt='' />
                <div class="offset-top-41 text-center">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
        
        <header class="page-head slider-menu-position">

            <!-- RD Navbar Transparent-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-default rd-navbar-transparent" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" data-lg-auto-height="true" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-stick-up="true">
                    <div class="rd-navbar-inner">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap"><span></span></button>
                            <!--Navbar Brand-->
                            <div class="rd-navbar-brand"><a href="index.html"><img style='margin-top: -5px;margin-left: -15px;' width='200' src='/libs/home-template/img/logos/logo-doutorhj-branco.svg' alt='Doutor Hoje'/></a></div>
                        </div>
                        <div class="rd-navbar-menu-wrap">
                            <div class="rd-navbar-nav-wrap">
                                <div class="rd-navbar-mobile-scroll">
                                    <!--Navbar Brand Mobile-->
                                    <div class="rd-navbar-mobile-brand"><a href="index.html"><img style='margin-top: -5px;margin-left: -15px;' width='138' src='/libs/home-template/img/logos/logo-doutorhj-branco.svg' alt='Doutor Hoje'/></a></div>

                                    <!-- RD Navbar Nav-->
                                    <ul class="rd-navbar-nav">
                                        <li class="active"><a href="index.html"><span>Início</span></a></li>
                                        <li><a href="#"><span>Como funciona</span></a></li>
                                        <li><a href="#beneficios"><span>Benefícios</span></a></li>
                                        <li><a href="#"><span>Agendamento</span></a></li>
                                    </ul>

                                </div>
                            </div>

                            <!-- BOTÕES-->
                            <div class="rd-navbar-btn-wrap">
                                <a class="btn btn-primary btn-anis-effect" href="#"><span class="btn-text">Sou profissional de Saúde</span></a>
                            </div>
                            <div class="rd-navbar-btn-wrap">
                                <a class="btn btn-primary btn-anis-effect" href="#"><span class="btn-text">Sou profissional de Saúde</span></a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>


            <!--Swiper-->
            <div class="swiper-container swiper-slider" data-loop="true" data-autoplay="true" data-height="100vh" data-dragable="false" data-min-height="480px">
                <div class="swiper-wrapper text-center">
                    <div class="swiper-slide" id="page-loader" data-slide-bg="/libs/home-template/img/intros/banner-01.jpg" data-preview-bg="/libs/home-template/img/intros/banner-01-mini.jpg">
                        <div class="swiper-caption swiper-parallax">
                            <div class="swiper-slide-caption">
                                <div class="shell">
                                    <div class="range range-lg-center">
                                        <div class="cell-lg-12">
                                            <h1><span class="chamada-banner-01 azul-1 big text-md-left" data-caption-animate="fadeIn" data-caption-delay="700">Conheça a nova maneira de cuidar da sua saúde</span></h1>
                                        </div>
                                        <div class="cell-lg-10 offset-top-30">
                                            <h4 class="hidden reveal-sm-block text-light texto-banner" data-caption-animate="fadeIn" data-caption-delay="900">
                                                Com o Doutor Hoje você pode pesquisar horários disponíveis para marcar sua consulta
                                            </h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-slide-bg="/libs/home-template/img/intros/banner-02.jpg" data-preview-bg="/libs/home-template/img/intros/banner-02-mini.jpg">
                        <div class="swiper-caption swiper-parallax">
                            <div class="swiper-slide-caption">
                                <div class="shell">
                                    <div class="range range-lg-center">
                                        <div class="cell-lg-12">
                                            <h1><span class="big chamada-banner-02" data-caption-animate="fadeIn" data-caption-delay="700">Preços acessíveis com a qualidade de um plano particular</span></h1>
                                        </div>
                                        <div class="cell-lg-10 offset-top-30">
                                            <h4 class="hidden reveal-sm-block text-light offset-bottom-0 texto-banner" data-caption-animate="fadeIn" data-caption-delay="900">
                                                Com o Doutor Hoje você tem acesso ao que há de melhor para cuidar da sua saúde.
                                            </h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-slide-bg="/libs/home-template/img/intros/banner-03.jpg" data-preview-bg="/libs/home-template/img/intros/banner-03-mini.jpg">
                        <div class="swiper-caption swiper-parallax">
                            <div class="swiper-slide-caption">
                                <div class="shell">
                                    <div class="range range-lg-center">
                                        <div class="cell-lg-12">
                                            <h1><span class="big " data-caption-animate="fadeIn" data-caption-delay="700">Ajudar a cuidar de quem você ama é nosso proposito</span></h1>
                                        </div>
                                        <div class="cell-lg-10 offset-top-30">
                                            <h4 class="hidden reveal-sm-block text-light offset-bottom-0 texto-banner" data-caption-animate="fadeIn" data-caption-delay="900">
                                                Encontre médicos que se importam com a saúde da sua família
                                            </h4>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-button swiper-button-prev swiper-parallax">
                    <div class="preview">
                        <div class="preview__img preview__img-3"></div>
                        <div class="preview__img preview__img-2"></div>
                        <div class="preview__img preview__img-1"></div>
                    </div>
                </div>
                <div class="swiper-button swiper-button-next swiper-parallax">
                    <div class="preview">
                        <div class="preview__img preview__img-1"></div>
                        <div class="preview__img preview__img-2"></div>
                        <div class="preview__img preview__img-3"></div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>


            </div>

        </header>

        @yield('content')
        
        <footer class="section-relative section-top-66 section-bottom-34 page-footer bg-gray-darkest">
            <div class="shell">
                <div class="range range-sm-center text-md-left">
                    <div class="cell-sm-8 cell-md-12">
                        <div class="range range-xs-center">
                            <div class="cell-xs-2 cell-md-3 offset-top-50 offset-md-top-0 cell-md-push-3 text-xs-left">
                                <h6 class="text-uppercase text-spacing-60 font-default text-white">Contato</h6>
                                <div class="reveal-block">
                                    <div class="reveal-inline-block rodape">
                                        <span>Horário de atendimento das 9h às 18h, de segunda à sexta-feira, excetos feriados.  <br class="veil reveal-lg-block"> 0800 040 803 </span>
                                    </div>
                                    <ul class="list-inline list-inline-sm reveal-inline-block offset-top-34 post-meta text-dark list-inline-primary">
                                        <li><a href="#"><span class="icon icon-xxs fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="icon icon-xxs fa-twitter"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cell-xs-4 cell-md-2 offset-top-50 offset-md-top-0 cell-md-push-3 text-xs-left">
                                <h6 class="text-uppercase text-spacing-60 font-default text-white">Sobre Nós</h6>
                                <div class="reveal-block">
                                    <div class="reveal-inline-block">
                                        <ul class="list list-unstyled list-inline-primary cvx-list-inline">
                                            <li class="text-primary"><a href="#">Quem Somos</a></li>
                                            <li class="text-primary"><a href="#">Como Funciona</a></li>
                                            <li class="text-primary"><a href="#">Política de Privacidade</a></li>
                                            <li class="text-primary"><a href="#">Termos de Uso</a></li>
                                            <li class="text-primary"><a href="#">Trabalhe Conosco</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cell-xs-4 cell-md-2 offset-top-50 offset-md-top-0 cell-md-push-3 text-xs-left">
                                <h6 class="text-uppercase text-spacing-60 font-default text-white">Usuários</h6>
                                <div class="reveal-block">
                                    <div class="reveal-inline-block">
                                        <ul class="list list-unstyled list-inline-primary cvx-list-inline">
                                            <li class="text-primary"><a href="#">Seja Cliente</a></li>
                                            <li class="text-primary"><a href="#">Área Restrita</a></li>
                                            <li class="text-primary"><a href="#">Agende Consulta</a></li>
                                            <li class="text-primary"><a href="#">Agende Exame</a></li>
                                            <li class="text-primary"><a href="#">Benefícios</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cell-xs-4 cell-md-2 offset-top-50 offset-md-top-0 cell-md-push-3 text-xs-left">
                                <h6 class="text-uppercase text-spacing-60 font-default text-white">Profissionais</h6>
                                <div class="reveal-block">
                                    <div class="reveal-inline-block">
                                        <ul class="list list-unstyled list-inline-primary cvx-list-inline">
                                            <li class="text-primary"><a href="#">Área Restrita</a></li>
                                            <li class="text-primary"><a href="#">Vantagens de Ser Parceiro</a></li>
                                            <li class="text-primary"><a href="#">Doutor Hoje</a></li>
                                            <li class="text-primary"><a href="#">Seja um Parceiro</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cell-md-3 offset-top-50 offset-md-top-0 cell-md-push-1">
                                <!-- Footer brand-->
                                <br/>
                                <div class="footer-brand"><a href="index.html"><img width='160'   src='/libs/home-template/img/logos/logo-doutor-hoje-vertical-branco.svg' alt='Doutor Hoje'/></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Global RD Mailform Output-->
        <div class="snackbars" id="form-output-global"></div>
        <!-- PhotoSwipe Gallery-->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @push('scripts')
    	<script>
    		var laravel_token = '{{ csrf_token() }}';
    		var resizefunc = [];
    	</script>
    	
        <script src="/libs/home-template/js/core.min.js"></script>
    	<script src="/libs/home-template/js/script.js"></script>
        
        <script type="text/javascript">
           
        </script>
    @endpush
    
    @stack('scripts')
    
</body>
</html>
