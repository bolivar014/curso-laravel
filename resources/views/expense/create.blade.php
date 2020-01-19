@extends('layouts.base')
    @section('content')
        <div class="content">
            <div class="row">
                <div class="col">
                    <h1>New Expense</h1>
                </div>
            </div>
                
            <div class="row">
                <div class="col">
                    <a href="/expense_reports/{{ $report->id }}" class="btn btn-secondary">Back</a>
                </div>
            </div>    
    
            <div class="row">
                <div class="col">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            Error!..
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        
                    <form action="/expense_reports/{{ $report->id }}/expenses" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Description:</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="description" value="{{ old('description') }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Amount:</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="amount" value="{{ old('amount') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>       
                </div>
            </div>        
        </div>
    @endsection