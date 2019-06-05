@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">{{ __('Ajouter une compétence') }}</h4>
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
                    <form method="post" action="{{ route('admin.skill.store') }}"
                        class="form" role="form"
                        autocomplete="off">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">{{ __('Nom') }}</label>
                        <div class="col-lg-9">
                        <input class="form-control" name="name" type="text" placeholder="{{ __('Nom du diplôme') }}" value="{{ old('name') }}" required>
                        </div>
                        </div>

                        <div class="form-group row text-right">
                            <div class="col">
                                <input type="submit" class="btn btn-success" value="{{ __('Enregistrer') }}">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
