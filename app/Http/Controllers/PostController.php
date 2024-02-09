<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{  
   public function create ():view
   {
	   return view('add-blog-post-form');
   }
   
   public function store(Request $request)
   {	
	   $validateData = $request->validate([
			   'title'=>'required',
			   'description'=>'required'
			],  [
			   'title.required'=>'Title field is required.',
			   'description.required' => 'Description field is required.',
			]);
			
	   $post = Post::create($validateData);	   
	   return back()->with('status','Blog Post Form Data Has Been Intsered');	  
   }
}
