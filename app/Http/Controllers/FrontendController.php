<?php

namespace App\Http\Controllers;

use App\About;
use App\Slider;
use App\Client;
use App\Contact;
use App\Message;
use App\Portfolio;
use App\Service;
use App\Team;
use App\Testimonial;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        $abouts = About::all();
        $sliders = Slider::all();
        $clients = Client::all();
        $contacts = Contact::all();
        $messages = Message::all();
        $portfolios = Portfolio::all();
        $services = Service::all();
        $teams = Team::all();
        $testimonials = Testimonial::all();
        $users = User::all();
        $categories = Category::all();
        return view('welcome', compact('sliders', 'abouts','services','clients','portfolios','testimonials','teams','contacts','categories'));
    }
}
