<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getPayments()
    {
        $payments = Payment::all();
        return response()->json(['payments' => $payments]);
    }

    public function addPayment(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:100',
            'remarks' => 'nullable|string|max:255',
        ]);

        $payment = Payment::create([
            'patient_id' => $request->patient_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_method' => $request->payment_method,
            'remarks' => $request->remarks,
        ]);

        return response()->json(['message' => 'Payment added successfully!', 'payment' => $payment]);
    }

    public function editPayment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
            'payment_method' => 'required|string|max:100',
            'remarks' => 'nullable|string|max:255',
        ]);

        $payment->update([
            'patient_id' => $request->patient_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'payment_method' => $request->payment_method,
            'remarks' => $request->remarks,
        ]);

        return response()->json(['message' => 'Payment updated successfully!', 'payment' => $payment]);
    }

    public function deletePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully.']);
    }
}
