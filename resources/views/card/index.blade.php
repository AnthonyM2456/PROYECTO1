@extends('layouts.app')

@section('template_title')
    Card
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Card') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cards.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Card Number</th>
										<th>Cardholder Name</th>
										<th>Expiration Date</th>
										<th>Cvv</th>
										<th>Balance</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cards as $card)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $card->card_number }}</td>
											<td>{{ $card->cardholder_name }}</td>
											<td>{{ $card->expiration_date }}</td>
											<td>{{ $card->CVV }}</td>
											<td>{{ $card->Balance }}</td>

                                            <td>
                                                <form action="{{ route('cards.destroy',$card->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cards.show',$card->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cards.edit',$card->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cards->links() !!}
            </div>
        </div>
    </div>
@endsection
