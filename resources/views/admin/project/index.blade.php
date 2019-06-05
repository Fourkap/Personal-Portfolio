@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row pr-3">
                            <div class="col"><h3>{{ __('Les Projets') }}</h3></div>
                            <a href="{{ route('admin.project.create') }}" class="btn btn-success col-auto">Ajouter</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->getId() }}</th>
                                <td>{{ $project->getName() }}</td>
                                <td class="row">
                                    <div class="col-auto">
                                        <a href="{{ route('admin.project.edit', $project->getId()) }}" class="btn btn-warning">Modifier</a>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ route('admin.project.destroy', $project->getId())}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">{{ __('Supprimer') }}</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
