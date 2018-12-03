<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;

class UploadController extends Controller
{

    public function uploadForm()
    {
        return view('upload');
    }

    public function uploadSubmit(UploadRequest $request)
    {
        $product = Product::create($request->all());
        foreach ($request->photos as $photo) {
            $filename = $photo->store('photos');
            ProductsPhoto::create([
                'product_id' => $product->id,
                'filename' => $filename
            ]);
        }
        return 'Upload successful!';
    }

}
