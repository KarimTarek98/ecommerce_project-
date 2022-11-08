<?php

namespace App\Services;
use App\Models\Partner;
use Intervention\Image\Facades\Image;

class PartnerService
{
    public function uploadImage($request)
    {
        $partnerImg = $request->file('partner_img');

        $imgGenName = date('mdYHis') . hexdec(uniqid()) . '.' . $partnerImg->getClientOriginalExtension();
        $savePath = 'uploads/partners/' . $imgGenName;

        Partner::mkdir();
        Image::make($partnerImg)->resize(300, 300)->save('uploads/partners/' . $imgGenName);
        return $savePath;
    }

    public function update($request)
    {
        $partnerToUpdate = Partner::findOrFail($request->partner_id);

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

            return redirect('admin/partners')
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

            return redirect('admin/partners')
                ->with('info', 'Partner Updated Successfully');
        }
    }

    public function delete($partner)
    {
        unlink($partner->partner_img);

        $partner->delete();

        return back()
            ->with('error', 'Partner Deleted !');
    }
}
