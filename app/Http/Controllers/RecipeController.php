<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecipeAddedMail;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::latest()->get();

        return view('home', compact('recipes'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'ingredients' => 'required',
        'process' => 'required',
        'origin' => 'required',
        'rating' => 'required'
    ]);

    $imageName = time().'.'.$request->image->extension();

    $request->image->move(public_path('images'), $imageName);

    Recipe::create([
        'title' => $request->title,
        'description' => $request->description,
        'ingredients' => $request->ingredients,
        'process' => $request->process,
        'origin' => $request->origin,
        'rating' => $request->rating,
        'image' => $imageName
    ]);
     
    // EMAIL SEND
    Mail::to('pathaniadeepti05@gmail.com')
    ->send(new RecipeAddedMail($request->title));

    return redirect('/')
        ->with('success', 'Recipe Added Successfully');
}
public function show($id)
{
    $recipe = Recipe::find($id);

    return view('show', compact('recipe'));
}

public function edit($id){
    $recipe = Recipe::find($id);
    return view('edit', compact('recipe'));
}


public function update(Request $request, $id){
    $recipe = Recipe::find($id);

    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'ingredients' => 'required',
        'process' => 'required',
        'origin' => 'required',
        'rating' => 'required'
    ]);

    if($request->hasFile('image'))
    {
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $recipe->image = $imageName;
    }

    $recipe->title = $request->title;
    $recipe->description = $request->description;
    $recipe->ingredients = $request->ingredients;
    $recipe->process = $request->process;
    $recipe->origin = $request->origin;
    $recipe->rating = $request->rating;

    $recipe->save();

    return redirect('/')
        ->with('success', 'Recipe Updated Successfully');
}

    public function destroy($id)
{
    $recipe = Recipe::find($id);

    if($recipe)
    {
        $recipe->delete();
    }

    return redirect('/')
        ->with('success', 'Recipe Deleted Successfully');
}
    public function sort($origin)
{
    $recipes = Recipe::where('origin', $origin)->get();

    return view('home', compact('recipes'));
}
}