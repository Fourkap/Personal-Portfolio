@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-9">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">{{ __('Editer la compétence') }}
            {{ $skill->getName()  }}</h4>
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
            <form method="post" action="{{ route('admin.skill.update', $skill->getId()) }}"
            class="form" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label class="col-lg-3 col-form-label form-control-label">{{ __('Nom') }}</label>

                <div class="col-lg-9">
                    <input class="form-control" name="name" type="text" placeholder="{{ __('Nom de la competence') }}" value="{{ $skill->getName() }}"
                    required>
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
