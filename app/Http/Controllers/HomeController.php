<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Request as Demande;
use App\Models\Service;
use App\Models\Post;
use App\Models\Project;
use App\Models\Option;
use App\Models\Apropos;
use App\Models\Reference;
use App\Models\Temoignage;
use App\Models\Contact;
use App\Models\Client;
use App\Models\Fichier;
use Session;

class HomeController extends Controller
{
	public function pluck(...$args) {
        $options = Option::asArray();
		$services_plucked = Service::limit(4)->get();
		return @$args[0] + compact('options', 'services_plucked');
	}

    public function index(Request $request)
    {
    	$services = Service::limit(3)->get();
    	$posts = Post::limit(3)->get();
    	$projects = Project::limit(6)->get();
        $apropos = Apropos::first();
        $references = Reference::limit(4)->get();
        $temoignages = Temoignage::all();
    	return view('welcome', $this->pluck(compact( 'services', 'posts', 'projects','apropos','references','temoignages' )));
    }
    public function contact(Request $request)
    {
       $services = Service::limit(3)->get();
    	return view('contact', $this->pluck(compact( 'services')));
    }


    public function demande(Request $request) {
        $errors = new MessageBag();
        //except()
        $demande = Demande::create($request->all());

        if( !$demande || !$demande->save() )
            $errors->add('request_failed', 'Une erreur s\'est produite');
        else
            return redirect("/")->with('success', '1');

        return view('welcome')->withErrors($errors);
    }

    public function references(Request $request)
    {
        $references = Reference::paginate(16);
        return view('references-page', $this->pluck(compact('references')));
    }

    public function services(Request $request)
    {
    	$services = Service::paginate(6);
    	return view('services-page', $this->pluck(compact('services')));
    }

    public function projects(Request $request)
    {
    	$projects = Project::paginate(6);
    	return view('projects-page', $this->pluck(compact('projects')));
    }

    public function posts(Request $request)
    {
    	$posts = Post::paginate(6);
    	return view('posts-page', $this->pluck(compact('posts')));
    }

    public function post(Request $request, $id)
    {
    	$post = Post::find($id);
    	$services = Service::limit(8)->get();
    	$posts = Post::limit(4)->whereNotIn('ID', [$id])->get();
    	return view('post-single', $this->pluck(compact('post', 'posts', 'services')));
    }

    public function service(Request $request, $id)
    {
    	$service = Service::find($id);
    	$services = Service::limit(8)->get();
    	$posts = Post::limit(4)->get();
    	return view('service-single', $this->pluck(compact('service', 'posts', 'services')));
    }

    public function saveContact(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'sujet' => 'required',
            'service_id' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->sujet = $request->sujet;
        $contact->service_id = $request->service_id;
        $contact->message = $request->message;

        $contact->save();

        return back()->with('success', 'Merci de nous contacter!');

    }

    //Espace client :

    public function espace () {
        return view('espace');
    }

    public function check (Request $request) {
        $validate = $this->validate($request,[
            'email' => ['required'],
            'pass' => ['required']
        ],
        [
            'email.required' => 'Ajouter une email',
            'pass.required' => 'Ajouter un Mot de pass'
        ]);

        $client = Client::where('email','=',$request->email)->first();
        if ($client) {
            if ($request->pass === $client->pass) {
                $request->Session()->put('clientId', $client->id);
                return view('client', compact('client'));
            }else {
                return back()->with('fail','mot de pass incorrecte');
            }
        }else{
            return back()->with('fail',"votre email n'est pas existe");
        }
    }

    public function logOut () {
        if (Session::has('clientId')) {
            Session::pull('clientId');
            return redirect()->route('espace');
        }
    }
}
