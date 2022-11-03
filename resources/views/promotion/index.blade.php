@extends('layouts.appAdmin')

@section('template_title')
    Promotion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Promotion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('promotions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Start Date</th>
										<th>End Date</th>
										<th>Discount</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($promotions as $promotion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $promotion->start_date }}</td>
											<td>{{ $promotion->end_date }}</td>
											<td>{{ $promotion->discount }}</td>

                                            <td>
                                                <form action="{{ route('promotions.destroy',$promotion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('promotions.show',$promotion->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('promotions.edit',$promotion->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $promotions->links() !!}
            </div>
        </div>
    </div>
@endsection
