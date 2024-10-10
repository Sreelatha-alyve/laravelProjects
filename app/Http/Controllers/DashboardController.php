<?php

namespace App\Http\Controllers;

use App\Models\idea;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class DashboardController extends Controller
{
    //
    
    public function index()
    {
        $idea = new idea(); //creating the idea model object here
        // updating the fillables aka user input that is content and likes
        $idea->content = "test4"; 
        $idea->likes = 0; 
        //$idea = new idea(['content'=>'test2','likes'=>0]);
        $idea->save(); //saves the model object to the database.
        return view('dashboard');
    }
}
