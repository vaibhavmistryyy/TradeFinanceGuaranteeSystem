<?php

namespace App\Http\Controllers;

use App\Services\GuaranteeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuaranteeController extends Controller
{
    protected $guaranteeService;

    public function __construct(GuaranteeService $guaranteeService)
    {
        $this->guaranteeService = $guaranteeService;
    }

    public function index()
    {
        $guarantees = $this->guaranteeService->getAllGuarantees();
        return view('guarantees.index', compact('guarantees'));
    }

    public function show($id)
    {
        $guarantee = $this->guaranteeService->getGuaranteeById($id);
        return view('guarantees.show', compact('guarantee'));
    }

    // Create Guarantee (show form)
    public function create()
    {
        return view('guarantees.create');
    }

    // Store Guarantee (validate and save)
    public function store(Request $request)
    {
        // Define validation rules
        $validatedData = $request->validate([
            'corporate_reference_number' => 'required|unique:guarantees,corporate_reference_number',
            'guarantee_type' => 'required|in:Bank,Bid Bond,Insurance,Surety',
            'nominal_amount' => 'required|numeric|min:1',
            'nominal_amount_currency' => 'required|string|max:3',
            'expiry_date' => 'required|date|after:today',
            'applicant_name' => 'required|string|max:255',
            'applicant_address' => 'required|string|max:255',
            'beneficiary_name' => 'required|string|max:255',
            'beneficiary_address' => 'required|string|max:255',
        ]);

        // Pass validated data to the service layer to create the guarantee
        $this->guaranteeService->createGuarantee($validatedData);

        // Redirect to guarantees index page
        return redirect()->route('guarantees.index')->with('success', 'Guarantee created successfully!');
    }

    // Update Guarantee (validate and save)
    public function update(Request $request, $id)
    {
        // Define validation rules
        $validatedData = $request->validate([
            'corporate_reference_number' => 'required|unique:guarantees,corporate_reference_number,' . $id,
            'guarantee_type' => 'required|in:Bank,Bid Bond,Insurance,Surety',
            'nominal_amount' => 'required|numeric|min:1',
            'nominal_amount_currency' => 'required|string|max:3',
            'expiry_date' => 'required|date|after:today',
            'applicant_name' => 'required|string|max:255',
            'applicant_address' => 'required|string|max:255',
            'beneficiary_name' => 'required|string|max:255',
            'beneficiary_address' => 'required|string|max:255',
        ]);

        // Pass validated data to the service layer to update the guarantee
        $this->guaranteeService->updateGuarantee($id, $validatedData);

        // Redirect to guarantees index page
        return redirect()->route('guarantees.index')->with('success', 'Guarantee updated successfully!');
    }

    // Delete Guarantee
    public function destroy($id)
    {
        $this->guaranteeService->deleteGuarantee($id);
        return redirect()->route('guarantees.index')->with('success', 'Guarantee deleted successfully!');
    }
}
