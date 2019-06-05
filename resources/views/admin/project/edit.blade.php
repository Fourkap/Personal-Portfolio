@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">{{ __('Editer le projet ') }}{{ $project->getName() }}</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.project.update', $project->getId()) }}" class="form" role="form" autocomplete="off">
                            @csrf()
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('Nom') }}</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="name" type="text" placeholder="{{ __('Nom du projet') }}" value="{{ $project->getName() }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('Nom URL') }}</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="urlname" type="text" placeholder="{{ __('Nom dans l\'url') }}" value="{{ $project->getUrlName() }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('Description') }}</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="description" type="text" placeholder="{{ __('Description du projet') }}" required>{{ $project->getDescription() }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('Nature du projet') }}</label>
                                <div class="col-lg-9">
                                    <div class="custom-control custom-radio col-auto">
                                        <input name="type" type="radio" class="custom-control-input" value="academy" id="academyRadio" @if($project->getType() == 'academy') checked @endif required>
                                        <label class="custom-control-label" for="academyRadio">École</label>
                                    </div>
                                    <div class="custom-control custom-radio col-auto">
                                        <input name="type" type="radio" class="custom-control-input" value="professional" id="professionalRadio" @if($project->getType() == 'professional') checked @endif required>
                                        <label class="custom-control-label" for="professionalRadio">Entreprise</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('Date de début') }}</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="startedAt" type="date" value="{{ $project->getStartedAtWithFormat() }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">{{ __('Date de fin') }}</label>
                                <div class="col-lg-9">
                                    <input class="form-control" name="endedAt" type="date" value="{{ $project->getEndedAtWithFormat() }}" required>
                                </div>
                            </div>
                            <div class="form-group row text-right">
                                <div class="col">
                                    <input type="submit" class="btn btn-success" value="Enregistrer">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
