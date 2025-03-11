<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Http\Requests\StoreJobOfferRequest; // Importa o Form Request
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:company'])->except(['index', 'show']);
        $this->middleware(['auth', 'role:student'])->only(['index', 'show']);
    }

    public function index()
    {
        $jobOffers = JobOffer::where('status', 'publish')
            ->where('expires_at', '>=', now())
            ->get();
        return view('students.job-offers.index', compact('jobOffers'));
    }

    public function show($id)
    {
        $jobOffer = JobOffer::where('status', 'publish')->findOrFail($id);
        return view('students.job-offers.show', compact('jobOffer'));
    }

    public function create()
    {
        return view('companies.job-offers.create');
    }

    public function store(StoreJobOfferRequest $request) // Usa o Form Request
    {
        JobOffer::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
            'keywords' => $request->keywords,
            'expires_at' => $request->expires_at,
            'location' => $request->location,
            'contract_type' => $request->contract_type,
            'status' => 'pending',
        ]);

        return redirect()->route('companies.dashboard')->with('success', 'Oferta criada e enviada para aprovação!');
    }

    public function edit($id)
    {
        $jobOffer = JobOffer::where('user_id', auth()->id())->findOrFail($id);
        return view('companies.job-offers.edit', compact('jobOffer'));
    }

    public function update(StoreJobOfferRequest $request, $id) // Usa o Form Request
    {
        $jobOffer = JobOffer::where('user_id', auth()->id())->findOrFail($id);

        $jobOffer->update($request->validated()); // Usa os dados validados

        return redirect()->route('companies.dashboard')->with('success', 'Oferta atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $jobOffer = JobOffer::where('user_id', auth()->id())->findOrFail($id);
        $jobOffer->delete();

        return redirect()->route('companies.dashboard')->with('success', 'Oferta excluída com sucesso!');
    }
}
