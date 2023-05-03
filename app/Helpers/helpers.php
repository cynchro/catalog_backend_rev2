<?php

if (! function_exists('current_user')) {
    function current_user()
    {
        return auth()->user();
    }
}

function uploadImage($request)
{

    $image = $request->file('image');

    $imageName = time().'.'.$image->getClientOriginalExtension();

    $request->image->move(public_path('images'), $imageName);

    return $imageName;
}
