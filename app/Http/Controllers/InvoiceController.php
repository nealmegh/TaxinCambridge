<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Invoice;
use App\Driver;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $drivers = Driver::all();
        $driverInvoices = null ;
        $invoices = array();
        if(!isset($_GET['driver_id']))
        {
            return view('Backend.Invoice.index', compact('drivers'));
        }

            if($_GET['start_date'] != "" && $_GET['end_date'] != "")
            {
                $invoices = Invoice::where('status', '=', 0)->whereDate('created_at', '>', $_GET['start_date'])->whereDate('created_at', '<', $_GET['end_date'])->get();
            }
            elseif ($_GET['start_date'] == "" && $_GET['end_date'] != "")
            {
                $invoices = Invoice::where('status', '=', 0)->whereDate('created_at', '<', $_GET['end_date'])->get();
            }
            elseif ($_GET['start_date'] != "" && $_GET['end_date'] == "")
            {
                $invoices = Invoice::where('status', '=', 0)->whereDate('created_at', '>', $_GET['start_date'])->get();
            }
            else
            {
                $invoices = Invoice::where('status', '=', 0)->get();
            }

        foreach ($invoices as $invoice)
            {
               if($invoice->booking->driver_id == $_GET['driver_id'])
               {
                   $driverInvoices [] = $invoice;
               }
            }

        return view('Backend.Invoice.invoice', compact('driverInvoices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = Invoice::find($request->invoice_id[0]);
        $driver = $invoice->booking->driver;
        $total_trip = count($request->invoice_id);
        $total_bill = 0;
        $total_commission = 0;
        $total_payable = 0;
        $bill = new Bill();


        $bill->total_bill = $total_bill;
        $bill->total_commission = $total_commission;
        $bill->total_payable = $total_payable;
        $bill->status = 0;
        $bill->save();
        foreach ($request->invoice_id as $invoiceID)
        {
            $invoice = Invoice::find($invoiceID);
            $total_bill += $invoice->total_amount;
            $total_commission += ($invoice->total_amount*$invoice->booking->driver->commission)/100;
            $invoice->bill_id = $bill->id;
            $invoice->status = 1;
            $invoice->save();
        }


        $bill->total_bill = $total_bill;
        $bill->total_commission = $total_commission;
        $bill->total_payable = $total_bill - $total_commission;
        $bill->save();


        return redirect()->route('bill.show', ['id' => $bill->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
