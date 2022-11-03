@extends('layouts.appAdmin')

@section('template_title')
    Create Promotion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Promotion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('promotions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('promotion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
