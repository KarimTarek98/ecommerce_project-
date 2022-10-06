<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function allPartners()
    {
        $partners = Partner::latest()->get();
        return view('admin.partners.all', compact('partners'));
    }

    public function addPartnerView()
    {
        return view('admin.partners.add-new-partner');
    }

    public function storePartners(Request $request)
    {
        
    }
}
