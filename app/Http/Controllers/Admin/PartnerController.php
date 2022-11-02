<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerValid;
use App\Models\Partner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{

    public function allPartners()
    {
        return view('admin.partners.all', ['partners' => Partner::latest()->get()]);
    }

    public function addPartnerView()
    {
        return view('admin.partners.add-new-partner');
    }

    public function storePartners(PartnerValid $request)
    {

        $partnerImg = $request->file('partner_img');

        $imgGenName = date('mdYHis') . hexdec(uniqid()) . '.' . $partnerImg->getClientOriginalExtension();
        $savePath = 'uploads/partners/' . $imgGenName;

        Partner::mkdir();
        Image::make($partnerImg)->resize(300, 300)->save('uploads/partners/' . $imgGenName);

        Partner::create([
            'partner_name_en' => $request->partner_name_en,
            'partner_name_ar' => $request->partner_name_ar,
            'partner_slug_en' => strtolower(str_replace(' ', '-', $request->partner_name_en)),
            'partner_slug_ar' => str_replace(' ', '-', $request->partner_name_ar),
            'partner_img' => $savePath
        ]);

        return redirect()->route('admin.all-partners')
            ->with('success', 'Partner Added Successfully');

    }

    public function editPartnerPage($id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
    }

    public function updatePartner(Request $request)
    {

        // validate request inputs
        $request->validate([
            'partner_name_en' => 'required|string|max:30',
            'partner_name_ar' => 'required|string|max:35',
            'partner_img' => 'image|mimes:png'
        ], [
            'partner_name_en.required' => 'You must insert partner name in English',
            'partner_name_en.string' => 'Partner Name should be string type',
            'partner_name_en.max' => 'Partner Name should be max of 30 character',
            'partner_name_ar.required' => 'You must insert partner name in Arabic',
            'partner_name_ar.string' => 'Partner Name should be string type',
            'partner_name_ar.max' => 'Partner Name should be max of 35 character',
            'partner_img.image' => 'Partner Image should be image only',
            'partner_img.mimes' => 'Partner Image should type of png only',
        ]);

        $partnerId = $request->partner_id;

        $partnerToUpdate = Partner::findOrFail($partnerId);

        // update with new image
        if ($request->hasFile('partner_img'))
        {
            // first thing delete old image
            unlink($partnerToUpdate->partner_img);

            $newImg = $request->file('partner_img');

            $imgGenName = date('mdYHis') . hexdec(uniqid()) . '.' . $newImg->getClientOriginalExtension();

            Image::make($newImg)->resize(300, 300)->save(public_path('uploads/partners/' . $imgGenName));

            $savePath = 'uploads/partners/' . $imgGenName;

            $partnerToUpdate->update([
                'partner_name_en' => $request->partner_name_en,
                'partner_name_ar' => $request->partner_name_ar,
                'partner_slug_en' => strtolower(str_replace(' ', '-', $request->partner_name_en)),
                'partner_slug_ar' => str_replace(' ', '-', $request->partner_name_ar),
                'partner_img' => $savePath
            ]);

            return redirect()->route('admin.all-partners')
                ->with('info', 'Partner Updated with new image');

        }
        // update with the same image
        else
        {
            $partnerToUpdate->update([
                'partner_name_en' => $request->partner_name_en,
                'partner_name_ar' => $request->partner_name_ar,
                'partner_slug_en' => strtolower(str_replace(' ', '-', $request->partner_name_en)),
                'partner_slug_ar' => str_replace(' ', '-', $request->partner_name_ar),
            ]);

            return redirect()->route('admin.all-partners')
                ->with('info', 'Partner Updated Successfully');
        }
    }

    public function deletePartner($id)
    {
        $partnerToDelete = Partner::findOrFail($id);

        // delete partner logo from public folder
        unlink($partnerToDelete->partner_img);

        $partnerToDelete->delete();

        return redirect()->route('admin.all-partners')
            ->with('error', 'Partner Deleted !');
    }
}
