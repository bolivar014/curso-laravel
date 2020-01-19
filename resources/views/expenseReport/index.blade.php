@extends('layouts.base')
    @section('content')
        <div class="content">
            <div class="row">
                <div class="col">
                    <h1>Reports</h1>
                </div>
            </div>
                
            <div class="row">
                <div class="col">
                    <a href="/expense_reports/create" class="btn btn-primary">Create a New Report</a>
                </div>
            </div>    
    
            <div class="row">
                <div class="col">
                    <table class="table">
                        @foreach($expenseReports as $expenseReport)
                            <tr>
                                <td>{{ $expenseReport->title }}</td>
                                <td><a href="/expense_reports/{{ $expenseReport->id }}/edit">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>            
                </div>
            </div>        
        </div>
    @endsection