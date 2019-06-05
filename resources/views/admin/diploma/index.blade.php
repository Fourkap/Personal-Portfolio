@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row pr-3">
                            <div class="col"><h3>{{ __('Les diplômes') }}</h3></div>
                            <a href="{{ route('admin.diploma.create') }}" class="btn btn-success col-auto">Ajouter</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Sous-nom</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($diplomas as $diploma)
                            <tr>
                                <th scope="row">{{ $diploma->getId() }}</th>
                                <td>{{ $diploma->getName() }}</td>
                                <td>{{ $diploma->getSubname() }}</td>
                                <td class="row">
                                    <div class="col-auto">
                                        <a href="{{ route('admin.diploma.edit', $diploma->getId()) }}" class="btn btn-warning">Modifier</a>
                                    </div>

                                    <div class="col-auto">
                                        <form action="{{ route('admin.diploma.destroy', $diploma->getId()) }}"
                                         method="post">
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
