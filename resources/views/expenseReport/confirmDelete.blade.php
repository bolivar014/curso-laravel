@extends('layouts.base')
    @section('content')
        <div class="content">
            <div class="row">
                <div class="col">
                    <h1>Delete Report {{ $report->id }}</h1>
                </div>
            </div>
                
            <div class="row">
                <div class="col">
                    <a href="/expense_reports" class="btn btn-secondary">Back</a>
                </div>
            </div>    
    
            <div class="row">
                <div class="col">
                    <form action="/expense_reports/{{ $report->id }}" method="POST">
                        {{ csrf_field() }}
                        @method('delete')
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>       
                </div>
            </div>        
        </div>
    @endsection