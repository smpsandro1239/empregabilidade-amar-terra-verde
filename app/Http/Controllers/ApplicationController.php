<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:company'])->only(['index']);
        $this->middleware(['auth', 'role:student'])->only(['studentIndex']);
    }

    public function index()
    {
        $applications = Application::whereIn('job_offer_id', auth()->user()->jobOffers->pluck('id'))
            ->with('user', 'jobOffer')
            ->get();
        return view('companies.applications.index', compact('applications'));
    }

    public function studentIndex()
    {
        $applications = auth()->user()->applications()->with('jobOffer')->get();
        return view('students.applications.index', compact('applications'));
    }
}
