<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'attached' => 'required|max:4000|mimes:pdf'
            ]
        );
        Report::create([
            'attached' => request()->file('attached')->store('reports', 'public'),
            'user_id' => auth()->user()->id,
            'title' => request()->get('title'),
            'description' => request()->get('description'),
        ]);

        return redirect()->route('admin.reports.index')->with('flash', 'Tu Informe ha sido Publicado exitosamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete(); //Elimina el registro del reporte en la base de datos
        Storage::disk('public')->delete($report->attached); //Elimina el reporte almacenado
        return redirect()->route('admin.reports.index')->with('flash', 'El reporte ha sido eliminado.');
    }
}
