@extends('layouts.app')

@section('template_title')
    {{ $notification->name ?? 'Show Notification' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Notification</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('notifications.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $notification->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Destination Email:</strong>
                            {{ $notification->destination_email }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $notification->title }}
                        </div>
                        <div class="form-group">
                            <strong>Message:</strong>
                            {{ $notification->message }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
