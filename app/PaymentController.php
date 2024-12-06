<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\View\View;

class PaymentController extends Controller
{
    
    public function index(): View
    {
        $payments = Payment::all();
        return view ('payments.index')->with('payments', $payments);
    }

   
    public function create(): View
    { 
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('payments.create', compact('enrollments'));
        
        
        //return view('batches.create');
    }

    
    public function store(Request $request): RedirectResponse
    {
        
        $input = $request->all();
        payment::create($input);
        return redirect('payments')->with('flash_message', 'payment Addedd!');
    }

  
    public function show(string $id): View
    {
        $payments = payment::find($id);
        return view('payments.show')->with('payments', $payments);
    }

    
    public function edit(string $id): View
    {
        $payments = payment::find($id);
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('payments.edit', compact('payments','enrollments'));
    }

   
    public function update(Request $request, string $id): RedirectResponse
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $payments->update($input);
        return redirect('payments')->with('flash_message', 'payment Updated!');
    }

  
    public function destroy(string $id): RedirectResponse
    {
        payment::destroy($id);
        return redirect('payments')->with('flash_message', 'payment deleted!'); 
    }
}
