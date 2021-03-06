@extends('layouts.base')
    @section('content')
        <div class="content">
            <div class="row">
                <div class="col">
                    <h1>New Report</h1>
                </div>
            </div>
                
            <div class="row">
                <div class="col">
                    <a href="/expense_reports" class="btn btn-secondary">Back</a>
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
                        
                    <form action="/expense_reports" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="type of title" value="{{ old('title') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>       
                </div>
            </div>        
        </div>
    @endsection