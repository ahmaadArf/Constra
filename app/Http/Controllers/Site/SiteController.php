<?php

namespace App\Http\Controllers\Site;

use App\Models\Fact;
use App\Models\Slider;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Image;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectDetait;
use App\Models\Question;
use App\Models\Team;
use App\Models\Testimonial;

class SiteController extends Controller
{
    public function index()
    {
        $siders=Slider::all();
        $services=Service::paginate(10);
        $facts=Fact::paginate(10);
        $projects=Project::all();
        $detials=ProjectDetait::all();
        $testimonials=Testimonial::where('type','testimonial')->get();
        $clients=Client::all();
        $posts=Post::paginate(3);
        return view('site.index',compact('posts','clients','siders','services','facts','projects','detials','testimonials'));

    }
    public function about()
    {
        $images=Image::where('type','service')->get();
        $teams=Team::all();
        return view('site.about',compact('images','teams'));
    }
    public function teams()
    {
        $teams=Team::all();

        return view('site.team',compact('teams'));
    }
    public function testimonials()
    {
        $testimonials=Testimonial::where('type','testimonial')->get();
        return view('site.testimonials',compact('testimonials'));
    }
    public function faqs()
    {
        $faqs=Question::where('type','faq')->get();
        $posts=Post::all();
        return view('site.faq',compact('faqs'));
    }
}
