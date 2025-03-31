<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'slide_image' => 'nullable',
            'slide_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sale_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'day_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $slideImages = [];
    
        // Check if slide_image is a single file
        if ($request->hasFile('slide_image')) {
            if (is_array($request->file('slide_image'))) {
                // If multiple images, store all
                foreach ($request->file('slide_image') as $file) {
                    $slideImages[] = $file->store('uploads', 'public');
                }
            } else {
                // If single image, store as a string
                $slideImages[] = $request->file('slide_image')->store('uploads', 'public');
            }
        }
    
        // Convert to JSON if multiple images, or store as a string if single
        $slideImageData = count($slideImages) > 1 ? json_encode($slideImages) : ($slideImages[0] ?? null);
    
        // Store other images
        $saleImage = $request->hasFile('sale_image') ? $request->file('sale_image')->store('uploads', 'public') : null;
        $dayImage = $request->hasFile('day_image') ? $request->file('day_image')->store('uploads', 'public') : null;
    
        // Save to database
        $image = Image::create([
            'slide_image' => $slideImageData,
            'sale_image' => $saleImage,
            'day_image' => $dayImage,
        ]);
    
        return response()->json([
            'message' => 'Images uploaded successfully!',
            'data' => $image
        ], 201);
    }
    
    public function index()
{
    $images = Image::all();

    return response()->json([
        'message' => 'Images retrieved successfully!',
        'data' => $images
    ], 200);
}

}
