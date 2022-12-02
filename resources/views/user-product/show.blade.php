@extends('layouts.app')

@section('template_title')
    {{ $userProduct->name ?? 'Show User Product' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('userproduct.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $userProduct->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $userProduct->product_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
