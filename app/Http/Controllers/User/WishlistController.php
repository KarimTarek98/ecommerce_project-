<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlistView()
    {
        return view('app.products.wishlist');
    }

    public function wishlistGetItems()
    {
        // get products through one to many relationship
        $items = Wishlist::with('products')->where('user_id', Auth::user()->id)
            ->latest()->get();

        return response()->json($items);
    }

    public function removeItem($id)
    {
        Wishlist::where('user_id', Auth::user()->id)
            ->where('id', $id)->delete();

        return response()->json([
            'success' => 'Product removed from your wishlist'
        ]);


    }
}
