@extends('layouts.appAdmin')

@section('template_title')
    Update Autor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Autor</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('autors.update', $autor->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('autor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
