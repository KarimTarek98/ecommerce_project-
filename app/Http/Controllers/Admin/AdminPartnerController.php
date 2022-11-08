<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerValid;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use App\Services\PartnerService;


class AdminPartnerController extends Controller
{

    public function __construct(public PartnerService $partner)
    {

    }
    public function index()
    {
        return view('admin.partners.index', ['partners' => Partner::latest()->get()]);
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(PartnerValid $request)
    {
        Partner::create([
            'partner_name_en' => $request->partner_name_en,
            'partner_name_ar' => $request->partner_name_ar,
            'partner_slug_en' => strtolower(str_replace(' ', '-', $request->partner_name_en)),
            'partner_slug_ar' => str_replace(' ', '-', $request->partner_name_ar),
            'partner_img' => $this->partner->uploadImage($request)
        ]);

        return redirect('admin/partners')
            ->with('success', 'Partner Added Successfully');

    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', ['partner' => $partner]);
    }

    public function update(UpdatePartnerRequest $request)
    {

        return $this->partner->update($request);
    }

    public function destroy(Partner $partner)
    {
        return $this->partner->delete($partner);
    }
}
