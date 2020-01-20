<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use Illuminate\Http\Request;
use App\Mail\SummaryReport;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{
    public function __construct()
    {
        // Se utiliza middleware('auth') para protejer rutas
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('expenseReport.index', [
            'expenseReports' => ExpenseReport::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorno la vista Create expenseReport
        return view('expenseReport.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaData = $request->validate([
            'title' => 'required | min:3'
        ]);

        // Almaceno los datos recibidos desde el POST del formulario CREATE
        $report = new ExpenseReport();
        $report->title = $request->get('title');
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    public function show(ExpenseReport $expenseReport)
    {
        //
        return view('expenseReport.show', [
            'report' => $expenseReport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit', [
            'report' => $report
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $report = ExpenseReport::findOrFail($id);
        
        $report->title = $request->get('title');
        $report->save();

        return redirect('/expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $report = ExpenseReport::findOrFail($id);
        $report->delete();

        return redirect('/expense_reports');
    }

    public function confirmDelete($id)
    {
        // dd('confirmDelete' . $id);

        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.confirmDelete', [
            'report' => $report
        ]);
    }

    public function confirmSendEmail($id)
    {
        //
        $report = ExpenseReport::findOrFail($id);

        return view('expenseReport.confirmSendEmail', [
            'report' => $report
        ]);

    }
    
    public function SendEmail($id, Request $request)
    {
        // 
        $report = ExpenseReport::findOrFail($id);
        Mail::to($request->get('email'))->send(new SummaryReport($report));
        return redirect('/expense_reports/' . $id);
    }
}
