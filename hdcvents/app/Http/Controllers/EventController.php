<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;

class EventController extends Controller
{
    //Rota Principal da Aplicação
    public function index() {

        $search = request('search');
        
        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%'] 
            ])->get();

        } else {
            $events = Event::all();
        }
    
        return view('welcome',['events' => $events, 'search' => $search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

        $event = new Event;
        
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;
        
        //Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();
            /*ImageName é o que vai no BD*/
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension );

            /*Vai salvar a Img no Path com o nome que o usuário der*/
            $requestImage->move(public_path('img/events'), $imageName);

            /*Imagem que vai salvar no BD de fato*/
            $event->image = $imageName;
        }

        //Com isso é possivel preencher o campo user do BD
        $user = auth()->user();
        $event-> user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }
    
    public function dashboard() {
        $user = auth()->user();

        $events = $user->events;

        return view('events.dashboard', ['events' => $events]);

    }
}