<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Service;
use App\Models\Project;
use App\Models\Post;
use App\Models\User;
use App\Models\Option;
use App\Models\Apropos;
use App\Models\Client;
use App\Models\Reference;
use App\Models\Temoignage;
use App\Models\Contact;
use App\Models\Fichier;
use App\Models\Request as Demande;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard');
    }

    public function demandes(Request $request)
    {
        $demandes = Demande::paginate(8);
        return view('demandes', compact('demandes'));
    }

    public function delete_demande(Request $request, $id)
    {
        $errors = new MessageBag();

        $demande = Demande::find($id);

        if( !$demande ) {
            $errors->add('demande_not_exists', 'Le demande n\'existe pas ou a été supprimé');
        } else if( $demande->delete() ) {
            return redirect('dashboard/demandes')->with('success', 1);
        } else {
            $errors->add('demande_deleted_failed', 'Une erreur s\est produite');
        }
        return redirect('dashboard/demandes')->withErrors($errors);
    }

    public function services(Request $request)
    {
        $services = Service::paginate(8);
        return view('services', compact('services'));
    }
    public function add_service(Request $request)
    {
        return view('add-service', ['service' => []]);
    }
    public function store_service(Request $request, $id = 0)
    {
        $errors = new MessageBag();

        $update = !!$id;

        if( $update ) {
            $service = Service::find($id);

            if( !$service ) {
                $errors->add('service_not_exists', 'Le service n\'existe pas ou a été supprimé');
            }
        }

        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required_without:image_url']
        ],
        [
            'title.required' => 'Entrer le titre de service',
            'description.required' => 'Entrer la description de service',
            'image.required' => 'Selectionner l\'image de service'
        ]
        );

        if( $validated ) {
            $path = false;
            $uploadFile = function(Request $request) {
                return $request->file('image')->store('public');
            };
            if( $update ) {
                if( $request->hasFile('image') ) {
                    $path = "storage/app/{$uploadFile($request)}";
                } else {
                    $path = $request->image_url;
                }
            } else {
                $path = "storage/app/{$uploadFile($request)}";
            }

            if( !$path ) {
                $errors->add('upload_image_failed', 'Échec de l\'importation de l\'image');
            } else {
                $validated['image'] = $path;
                if( $update )
                    $service->update($validated);
                else
                    $service = Service::create($validated);
                if( !$service->save() )
                    $errors->add('service_create_failed', 'Une erreur s\est produite');

                return redirect("/dashboard/edit-service/{$service->ID}")->with('success', '1');
            }
        }

        return view('add-service', ['service' => []])->withErrors($errors);
    }
    public function edit_service(Request $request, $id)
    {
        $errors = new MessageBag();

        $service = Service::find($id);

        if( !$service ) {
            $errors->add('service_not_exists', 'Le service n\'existe pas ou a été supprimé');
        }

        return view('add-service', ['service' => $service?$service->toArray():[]])->withErrors($errors);
    }

    public function delete_service(Request $request, $id)
    {
        $errors = new MessageBag();

        $service = Service::find($id);

        if( !$service ) {
            $errors->add('service_not_exists', 'Le service n\'existe pas ou a été supprimé');
        } else if( $service->delete() ) {
            return redirect('dashboard/services')->with('success', 1);
        } else {
            $errors->add('service_deleted_failed', 'Une erreur s\est produite');
        }
        return redirect('dashboard/services')->withErrors($errors);
    }

    public function projects(Request $request)
    {
        $projects = Project::paginate(8);
        return view('projects', compact('projects'));
    }
    public function add_project(Request $request)
    {
        return view('add-project', ['project' => []]);
    }
    public function store_project(Request $request, $id = 0)
    {
        $errors = new MessageBag();

        $update = !!$id;

        if ($update) {
            $project = Project::find($id);

            if (!$project) {
                $errors->add('project_not_exists', 'Le projet n\'existe pas ou a été supprimé');
            }
        }
        $validated = $request->validate(
            [
                'title' => ['required'],
                'address' => ['required'],
                'images' => ['required_without:image_urls']
            ],
            [
                'title.required' => 'Entrer le titre de projet',
                'address.required' => 'Entrer la address de projet',
                'images.required' => 'Selectionner l\'image de projet'
            ]
        );

        if ($validated) {
            $path = false;
            $uploadFile = function (Request $request) {
                $urls = array();
                foreach ($request->file('images') as $image) {
                    $_file = $image->store('public');
                    $urls[] = "storage/app/{$_file}";
                }
                return implode(',', $urls);
            };
            if ($update) {
                if ($request->hasFile('images')) {
                    if ($project['image'] === "") {
                        $path = $uploadFile($request);
                    } else {
                        $path = $project['image'] . ',' . $uploadFile($request);
                    }
                } else {
                    $path = $request->image_urls;
                }
            } else {
                $path = $uploadFile($request);
            }

            if (!$path) {
                $errors->add('upload_image_failed', 'Échec de l\'importation de l\'image');
            } else {
                $validated['image'] = $path;

                if ($update)
                    $project->update($validated);
                else
                    $project = Project::create($validated);
                if (!$project->save())
                    $errors->add('project_create_failed', 'Une erreur s\'est produite');

                return redirect("/dashboard/edit-project/{$project->ID}")->with('success', '1');
            }
        }

        return view('add-project', ['project' => []])->withErrors($errors);

        if ($project['image'] === "") {
            $path = $uploadFile($request);
        } else {
            $path = $project['image'] . ',' . $uploadFile($request);
        }
    }

    public function edit_project(Request $request, $id)
    {
        $errors = new MessageBag();

        $project = Project::find($id);

        if( !$project ) {
            $errors->add('project_not_exists', 'Le projet n\'existe pas ou a été supprimé');
        }

        return view('add-project', ['project' => $project?$project->toArray():[]])->withErrors($errors);
    }

    public function delete_project(Request $request, $id)
    {
        $errors = new MessageBag();

        $project = Project::find($id);

        if( !$project ) {
            $errors->add('project_not_exists', 'Le project n\'existe pas ou a été supprimé');
        } else if( $project->delete() ) {
            return redirect('dashboard/projects')->with('success', 1);
        } else {
            $errors->add('project_deleted_failed', 'Une erreur s\est produite');
        }
        return redirect('dashboard/projects')->withErrors($errors);
    }
    public function posts(Request $request)
    {
        $posts = Post::paginate(8);
        return view('posts', compact('posts'));
    }
    public function add_post(Request $request)
    {
        return view('add-post', ['post' => []]);
    }
    public function store_post(Request $request, $id = 0)
    {
        $errors = new MessageBag();

        $update = !!$id;

        if( $update ) {
            $post = Post::find($id);

            if( !$post ) {
                $errors->add('project_not_exists', 'Le projet n\'existe pas ou a été supprimé');
            }
        }

        $validated = $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'image' => ['required_without:image_url']
        ],
        [
            'title.required' => 'Entrer le titre d\'article',
            'content.required' => 'Entrer la contenu d\'article',
            'image.required' => 'Selectionner l\'image d\'article'
        ]
        );

        if( $validated ) {
            $path = false;
            $uploadFile = function(Request $request) {
                return $request->file('image')->store('public');
            };
            if( $update ) {
                if( $request->hasFile('image') ) {
                    $path = "storage/app/{$uploadFile($request)}";
                } else {
                    $path = $request->image_url;
                }
            } else {
                $path = "storage/app/{$uploadFile($request)}";
            }

            if( !$path ) {
                $errors->add('upload_image_failed', 'Échec de l\'importation de l\'image');
            } else {
                $validated['image'] = $path;
                if( $update ) {
                    $post->update($validated);
                } else {
                    $validated['post_author'] = auth()->id();
                    $validated['slug'] = time();
                    $validated['date'] = time();
                    $post = Post::create($validated);
                }
                if( !$post->save() )
                    $errors->add('project_create_failed', 'Une erreur s\'est produite');

                return redirect("/dashboard/edit-post/{$post->ID}")->with('success', '1');
            }
        }

        return view('add-post', ['post' => []])->withErrors($errors);
    }
    public function edit_post(Request $request, $id)
    {
        $errors = new MessageBag();

        $post = Post::find($id);

        if( !$post ) {
            $errors->add('project_not_exists', 'L\'article n\'existe pas ou a été supprimé');
        }

        return view('add-post', ['post' => $post?$post->toArray():[]])->withErrors($errors);
    }
    public function delete_post(Request $request, $id)
    {
        $errors = new MessageBag();

        $post = Post::find($id);

        if( !$post ) {
            $errors->add('post_not_exists', 'Le post n\'existe pas ou a été supprimé');
        } else if( $post->delete() ) {
            return redirect('dashboard/posts')->with('success', 1);
        } else {
            $errors->add('post_deleted_failed', 'Une erreur s\est produite');
        }
        return redirect('dashboard/posts')->withErrors($errors);
    }
    public function requests(Request $request)
    {

    }
    public function admins(Request $request)
    {
        $users = User::paginate(8);
        return view('users', compact('users'));
    }
    public function add_admin(Request $request)
    {
        return view('add-user', ['user' => [], 'ID' => 0]);
    }
    public function edit_admin(Request $request, $id)
    {
        $errors = new MessageBag();

        $user = User::find($id);

        if( !$user ) {
            $errors->add('project_not_exists', 'Admin n\'existe pas ou a été supprimé');
        }

        return view('add-user', ['user' => $user?$user->toArray():[], 'ID' => $id])->withErrors($errors);
    }
    public function store_user(Request $request, $id = 0)
    {
        $errors = new MessageBag();

        $update = !!$id;

        if( $update ) {
            $user = User::where('username', $id)->first();

            if( !$user ) {
                $errors->add('project_not_exists', 'Admin n\'existe pas ou a été supprimé');
            }
        }

        $rules = [
            'name' => ['required'],
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'unique:users']
        ];

        if( !$update ) {
            $rules['password'] = ['required'];
        } else {
            unset(
                $rules['username'],
                $rules['email']
            );
        }

        $validated = $request->validate($rules,
        [
            'name.required' => 'Entrer le nom',
            'username.required' => 'Entrer le username',
            'username.unique' => 'Username deja exists',
            'email.required' => 'Entrer le email',
            'email.unique' => 'Email deja exists',
            'password.required' => 'Entrer le mot de pass',
        ]
        );


        if( $validated ) {

            if( $request->password ) {
                $validated['password'] = Hash::make($request->password);
            }

            if( $update ) {
                $user->update($validated);
            } else {
                $user = User::create($validated);
            }

            if( !$user->save() )
                $errors->add('project_create_failed', 'Une erreur s\'est produite');
            else
                return redirect("/dashboard/edit-admin/{$user->id}")->with('success', '1');
        }

        return view('add-user', ['user' => [], 'ID' => $id])->withErrors($errors);
    }

    public function settings(Request $request) {
        $options = Option::asArray();

        return view('settings', ['options' => $options]);
    }

    public function storeSettings(Request $request) {
        $errors = new MessageBag();

        $success = true;

        foreach ($request->all() as $key => $value) {
            //if( empty( $value ) )
                //continue;
            $option = Option::updateOrCreate(['option_key' => $key], ['option_value' => is_array($value) ? serialize($value) : $value]);

            $success = $option->save();

        }

        if( !$success )
            $errors->add('options_pudate_failed', 'Une erreur s\'est produite');
        else
            return redirect("/dashboard/settings")->with('success', '1');

        return view('settings', ['options' => []])->withErrors($errors);
    }

    public function apropos(Request $request) {
        $firstone = Apropos::first();

        if($firstone){
            $apropos = Apropos::where('ID',$firstone->ID)->first();
           }else{
            $apropos = null;
           }

        return view('apropos', ['apropos' => $apropos]);
    }
    public function storeapropos(Request $request) {

        $firstone = Apropos::first();

        $errors = new MessageBag();

        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required_without:image_url']
        ],
        [
            'title.required' => 'Entrer le titre d\'article',
            'description.required' => 'Entrer la contenu d\'article',
            'image.required' => 'Selectionner l\'image d\'article'
        ]
        );

        if( $validated ) {
            $path = false;
            $uploadFile = function(Request $request) {
                return $request->file('image')->store('public');
            };

                if( $request->hasFile('image') ) {
                    $path = "storage/app/{$uploadFile($request)}";
                } else {
                    $path = $request->image_url;
                }


            if( !$path ) {
                $errors->add('upload_image_failed', 'Échec de l\'importation de l\'image');
            } else {

                $validated['image'] = $path;
                if(!$firstone){
                    $apropos = new Apropos;
                    $apropos->title =  $request->title;
                    $apropos->sub_title1 = $request->sub_title1;
                    $apropos->sub_title2 = $request->sub_title2;
                    $apropos->description = $request->description;
                    $apropos->image = $path;
                    $apropos->save();
                }else{
                    Apropos::where('id', $firstone->ID)
                    ->update([
                    'title'=> $request->title,
                    'sub_title1'=> $request->sub_title1,
                    'sub_title2'=> $request->sub_title2,
                    'description'=> $request->description,
                    'image'=> $path,
                    ]);
                }


                return redirect("/dashboard/apropos")->with('success', '1');
            }
        }
    }

    public function reference(Request $request)
    {
        $references = Reference::paginate(8);
        return view('references', compact('references'));
    }
    public function add_reference(Request $request)
    {
        return view('add-reference', ['reference' => []]);
    }
    public function store_reference(Request $request, $id = 0)
    {
        $errors = new MessageBag();

        $update = !!$id;

        if( $update ) {
            $reference = Reference::find($id);

            if( !$reference ) {
                $errors->add('project_not_exists', 'Le projet n\'existe pas ou a été supprimé');
            }
        }

        $validated = $request->validate([
            'image' => ['required_without:image_url'],
            'description' => ['required']
        ],
        [
            'image.required' => 'Selectionner l\'image d\'article',
            'description.required' => 'Entrer la description',
        ]
        );

        if( $validated ) {
            $path = false;
            $uploadFile = function(Request $request) {
                return $request->file('image')->store('public');
            };
            if( $update ) {
                if( $request->hasFile('image') ) {
                    $path = "storage/app/{$uploadFile($request)}";
                } else {
                    $path = $request->image_url;
                }
            } else {
                $path = "storage/app/{$uploadFile($request)}";
            }

            if( !$path ) {
                $errors->add('upload_image_failed', 'Échec de l\'importation de l\'image');
            } else {
                $validated['image'] = $path;
                if( $update ) {
                    $reference->update($validated);
                } else {
                    $validated['post_author'] = auth()->id();
                    $validated['slug'] = time();
                    $validated['date'] = time();
                    $reference = Reference::create($validated);
                }
                if( !$reference->save() )
                    $errors->add('project_create_failed', 'Une erreur s\'est produite');

                return redirect("/dashboard/edit-reference/{$reference->ID}")->with('success', '1');
            }
        }

        return view('add-reference', ['post' => []])->withErrors($errors);
    }
    public function edit_reference(Request $request, $id)
    {
        $errors = new MessageBag();

        $reference = Reference::find($id);

        if( !$reference ) {
            $errors->add('project_not_exists', 'L\'article n\'existe pas ou a été supprimé');
        }

        return view('add-reference', ['reference' => $reference?$reference->toArray():[]])->withErrors($errors);
    }

    public function delete_reference(Request $request, $id)
    {
        $errors = new MessageBag();

        $reference = Reference::find($id);

        if( !$reference ) {
            $errors->add('reference_not_exists', 'Le reference n\'existe pas ou a été supprimé');
        } else if( $reference->delete() ) {
            return redirect('dashboard/reference')->with('success', 1);
        } else {
            $errors->add('reference_deleted_failed', 'Une erreur s\est produite');
        }
        return redirect('dashboard/reference')->withErrors($errors);
    }
    //
    public function temoignage(Request $request)
    {
        $temoignages = Temoignage::paginate(8);
        return view('temoignages', compact('temoignages'));
    }
    public function add_temoignage(Request $request)
    {
        return view('add-temoignage', ['temoignage' => []]);
    }
    public function store_temoignage(Request $request, $id = 0)
    {
        $errors = new MessageBag();

        $update = !!$id;

        if( $update ) {
            $temoignage = Temoignage::find($id);

            if( !$temoignage ) {
                $errors->add('project_not_exists', 'Le projet n\'existe pas ou a été supprimé');
            }
        }

        $validated = $request->validate([
            'nom' => ['required'],
            'fonction' => ['required'],
            'content' => ['required'],
            'image' => ['required_without:image_url']
        ],
        [
            'nom.required' => 'Ajouter un nom',
            'fonction.required' => 'Ajouter une fonction',
            'content.required' => 'Ajouter un contenu',
            'image.required' => 'Selectionner l\'image d\'article'
        ]
        );

        if( $validated ) {
            $path = false;
            $uploadFile = function(Request $request) {
                return $request->file('image')->store('public');
            };
            if( $update ) {
                if( $request->hasFile('image') ) {
                    $path = "storage/app/{$uploadFile($request)}";
                } else {
                    $path = $request->image_url;
                }
            } else {
                $path = "storage/app/{$uploadFile($request)}";
            }

            if( !$path ) {
                $errors->add('upload_image_failed', 'Échec de l\'importation de l\'image');
            } else {
                $validated['image'] = $path;
                if( $update ) {
                    $temoignage->update($validated);
                } else {
                    $temoignage = Temoignage::create($validated);
                }
                if( !$temoignage->save() )
                    $errors->add('project_create_failed', 'Une erreur s\'est produite');

                return redirect("/dashboard/edit-temoignage/{$temoignage->ID}")->with('success', '1');
            }
        }

        return view('add-temoignage', ['post' => []])->withErrors($errors);
    }
    public function edit_temoignage(Request $request, $id)
    {
        $errors = new MessageBag();

        $temoignage = Temoignage::find($id);

        if( !$temoignage ) {
            $errors->add('project_not_exists', 'L\'article n\'existe pas ou a été supprimé');
        }

        return view('add-temoignage', ['temoignage' => $temoignage?$temoignage->toArray():[]])->withErrors($errors);
    }

    public function delete_temoignage(Request $request, $id)
    {
        $errors = new MessageBag();

        $temoignage = Temoignage::find($id);

        if( !$temoignage ) {
            $errors->add('temoignage_not_exists', 'Le temoignage n\'existe pas ou a été supprimé');
        } else if( $temoignage->delete() ) {
            return redirect('dashboard/temoignage')->with('success', 1);
        } else {
            $errors->add('temoignage_deleted_failed', 'Une erreur s\est produite');
        }
        return redirect('dashboard/temoignage')->withErrors($errors);
    }

    public function contact(Request $request)
    {
        $contacts = Contact::paginate(8);
        return view('contacts', compact('contacts'));
    }
    public function delete_contact(Request $request, $id)
    {
        $errors = new MessageBag();
        $contact = Contact::find($id);

        if( !$contact ) {
            $errors->add('temoignage_not_exists', 'Le contact n\'existe pas ou a été supprimé');
        } else if( $contact->delete() ) {
            return redirect('dashboard/contact')->with('success', 1);
        } else {
            $errors->add('temoignage_deleted_failed', 'Une erreur s\est produite');
        }
        return redirect('dashboard/contact')->withErrors($errors);
    }

    //utilisateur :

    public function utilisateur() {
        $clients = Client::latest()->paginate(8);
        return view('utilisateur')->with([
            'clients' => $clients
        ]);
    }

    public function add_utilisateur () {
        return view('add-utilisateur');
    }

    public function store_utilisateur (Request $request) {
        $validate = $this->validate($request,[
            'information' => ['required'],
            'email' => ['required'],
            'pass' => ['required']
        ],
        [
            'information.required' => 'Ajouter un nom',
            'email.required' => 'Ajouter une email',
            'pass.required' => 'Ajouter un Mot de pass'
        ]
    );
        Client::create([
            'id' => $request->id,
            'information' => $request->information,
            'email' => $request->email,
            'pass' => $request->pass
        ]);
        return redirect()->route('dashboard.utilisateur')->with([
            'success' => 'Votre client ajouté avec succès'
        ]);
    }

    public function edit_utilisateur ($id) {
        $clients = Client::find($id);
        return view('edit-utilisateur')->with([
            'clients' => $clients
        ]);
    }

    public function update_utilisateur ($id, Request $request ) {
        $clients = Client::find($id);
        $validate = $this->validate($request,[
            'information' => ['required'],
            'email' => ['required'],
            'pass' => ['required']
        ],
        [
            'information.required' => 'Ajouter un nom',
            'email.required' => 'Ajouter une email',
            'pass.required' => 'Ajouter un Mot de pass'
        ]
    );
        $clients->update([
            'information' => $request->information,
            'email' => $request->email,
            'pass' => $request->pass
        ]);
        return redirect()->route('dashboard.utilisateur')->with([
            'success' => 'Votre client modifié avec succès'
        ]);
    }

    public function delete_utilisateur($id) {
        $clients = Client::find($id);
        $clients->delete();
        return redirect()->route('dashboard.utilisateur')->with([
            'success' => 'Votre client supprimé avec succès'
        ]);
    }

    public function show_utilisateur ($id) {
        $clients = Client::find($id);
        return view('show-utilisateur')->with([
            'clients' => $clients
        ]);
    }

    public function add_fichier_utilisateur ($id) {
        $clients = Client::find($id);
        return view('add-fichier-utli')->with([
            'clients' => $clients
        ]);
    }

    public function store_fichier_utilisateur (Request $request) {
        $validate = $this->validate($request,[
            'image' => ['required']
        ],
        [
            'image.required' => 'Ajouter une image',
        ]
    );
        if($request->has('image')){
            $file = $request->image;
            $imageName = time(). '_'. $file->getClientOriginalName();
            $file->move(public_path('uploads'), $imageName);
        }
        Fichier::create([
            'image' => $request->image,
            'client_id' => $request->clientId,
            'document' => $request->texte
        ]);
        return redirect()->route('dashboard.utilisateur')->with([
            'success' => 'Votre ligne ajouté avec succès'
        ]);
    }
}

