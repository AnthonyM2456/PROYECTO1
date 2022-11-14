@extends('layouts.app')

@section('template_title')
    {{ $card->name ?? 'Show Card' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Card</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cards.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Card Number:</strong>
                            {{ $card->card_number }}
                        </div>
                        <div class="form-group">
                            <strong>Cardholder Name:</strong>
                            {{ $card->cardholder_name }}
                        </div>
                        <div class="form-group">
                            <strong>Expiration Date:</strong>
                            {{ $card->expiration_date }}
                        </div>
                        <div class="form-group">
                            <strong>Cvv:</strong>
                            {{ $card->CVV }}
                        </div>
                        <div class="form-group">
                            <strong>Balance:</strong>
                            {{ $card->Balance }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
