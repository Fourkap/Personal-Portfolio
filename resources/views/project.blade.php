@extends('layouts.project')

@section('content')
    <section class="">
        <div class="row">
            <div class="col-lg-8 mx-auto shadow p-5">
                <div class="row">
                    <h2 class="text-uppercase col-12 text-center">{{ $project->getName() }}</h2>
                    <p class="text-muted col-12 text-center">{{ $project->getType() }}</p>
                    <div class="col-12">
                        <img class="img-fluid d-block mx-auto" src="{{ asset('img/' . $project->getFirstPicture()->getPath()) }}" alt="{{ $project->getName() }}">
                    </div>
                    <div class="col-md-8 col-sm-12 mx-auto text-center">
                        <p>{{ $project->getDescription() }}</p>
                    </div>
                    <ul class="list-inline col-12 text-center">
                        <li>Date de début : {{ $project->getStartedAtWithFormat() }}</li>
                        <li>Date de fin : {{ $project->getEndedAtWithFormat() }}</li>
                    </ul>
                    <div class="col-12 text-center">
                        @foreach($project->getProjectLinks()->get() as $projectLink)
                            <a href="{{ $projectLink->getLink()->first()->url }}">
                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                    <i class="{{ $projectLink->getLink()->first()->class_element }}"></i>
                                    {{ $projectLink->getLink()->first()->name }}</button>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
