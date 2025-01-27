<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wr;
use App\Models\stockcode;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Exports\WrExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class wrcontroller extends Controller
{
    public function index(): View
    {
        $role = Auth::user()->role;
        $wrQuery = Wr::query();
        $wr = wr::latest()->paginate(10);

        if ($role === 'supplier') {
            $wrQuery->where('wh', 'UTVH'); // Hanya data dengan WH = UTVH
        }

        if ($role === 'sm') {
            return view('adminDashboard', compact('wr'));
        } elseif ($role === 'supplier') {
            return view('supplierDashboard', compact('wr'));
        } else {
            return view('userDashboard', compact('wr'));
        }
    }
    public function create(): View
    {
        $stockCode = StockCode::all();
        return view('create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'creation_date' => 'required',
            'authsd_date' => 'required',
            'wo_desc' => 'required',
            'acuan_plan_service' => 'required',
            'componen_desc' => 'required',
            'egi' => 'required',
            'egi_eng' => 'required',
            'equip_no' => 'required',
            'plant_process' => 'required',
            'plant_activity' => 'required',
            'wr_no' => 'required',
            'wr_item' => 'required',
            'qty_req' => 'required',
            'stock_code' => 'required',
            'mnemonic' => 'required',
            'part_number' => 'required',
            'pn_global' => 'required',
            'item_name' => 'required',
            'stock_type_district' => 'required',
            'class' => 'required',
            'home_wh' => 'required',
            'uoi' => 'required',
            'issuing_price' => 'required',
            'price_code' => 'required',
            'notes' => 'nullable',
            'eta' => 'nullable',
            'status' => 'required',
        ]);
        return redirect()
            ->route('dashboard')
            ->with(['success' => 'Data Berhasil Ditambahkan!']);
    }
    public function edit(string $id): View
    {
        //get product by ID
        $wr = wr::findOrFail($id);

        //render view with product
        return view('edit', compact('wr'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'dstrc_ori' => 'required',
            'creation_date' => 'required',
            'authsd_date' => 'required',
            'acuan_plan_service' => 'required',
            'componen_desc' => 'required',
            'egi' => 'required',
            'egi_eng' => 'required',
            'equip_no' => 'required',
            'plant_process' => 'required',
            'plant_activity' => 'required',
            'wr_no' => 'required',
            'wr_item' => 'required',
            'qty_req' => 'required',
            'stock_code' => 'required',
            'mnemonic' => 'required',
            'part_number' => 'required',
            'pn_global' => 'required',
            'item_name' => 'required',
            'stock_type_district' => 'required',
            'class' => 'required',
            'home_wh' => 'required',
            'uoi' => 'required',
            'issuing_price' => 'required',
            'price_code' => 'required',
            'notes' => 'nullable',
            'eta' => 'nullable',
            'status' => 'required',
        ]);

        //get product by ID
        $wr = wr::findOrFail($id);
        $wr->update($request->all());
        return redirect()
            ->route('dashboard')
            ->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        // Get product by ID
        $wr = wr::findOrFail($id);

        // Delete product
        $wr->delete();

        // Redirect to the dashboard route
        return redirect()
            ->route('dashboard')
            ->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function export()
    {
        return Excel::download(new WrExport(), 'Data WR.xlsx');
    }
}
