@extends('layouts.home')

@section('content')
    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Bienvenue sur le meilleur portfolio!</div>
                <div class="intro-heading text-uppercase">{{ $portfolio->getUser()->getName() }}</div>
            </div>
        </div>
    </header>
    <!-- Services -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Compétences</h2>
                </div>
            </div>
            <div class="row text-center">
                @foreach($portfolio->getHomeSkills() as $skill)
                    <div class="col-md-3 col-sm-6 bg-white p-4">
                        <h5>{{ $skill->getName() }}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Portfolio Grid -->
    <section class="bg-light p-0" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Projets</h2>
                </div>
            </div>
            <div class="row row-eq-height">
                @foreach($portfolio->getProjects() as $project)
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a class="portfolio-link" href="{{ route('project.show', $project->getUrlName()) }}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('img/' . $project->getFirstPicture()->getPath()) }}" alt="{{ $project->getName() }}">
                        </a>
                        <div class="portfolio-caption">
                            <h4>{{ $project->getName() }}</h4>
                            <p class="text-muted">{{ $project->getType() }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Parcours</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        @php ($count = 0)
                        @foreach($portfolio->getExperiences() as $experience)
                            <li @if($count%2 == 0)class="timeline-inverted"@endif>
                                <div class="timeline-image">
                                    <img class="rounded-circle img-fluid" src="{{ asset('img/about/2.jpg') }}" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>{{ $experience->getStartedAtWithFormat('DD/MM/Y') }} - {{ $experience->getEndedAtWithFormat('DD/MM/Y') }}</h4>
                                        <h4 class="subheading">{{ $experience->getName() }}</h4>
                                        <h5 class="subheading">{{ $experience->getSubname() }}</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">{{ $experience->getDescription() }}</p>
                                    </div>
                                </div>
                            </li>
                            @php ($count++)
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
