<?php

namespace App\Http\Controllers\API\V1;


use App\Http\Requests\Events\EventRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EventController extends BaseController
{
    protected $event = '';

    public function __construct(Event $event)
    {
        $this->middleware('auth:api');
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        if(Auth::user()->type == 'admin'){
            $events = $this->event->latest()->with('student')->paginate(10);
        }else{
            $events = $this->event->latest()->with('student')->where('user_id', Auth::id())
            ->paginate(10);
            // $events = $this->event->latest()->where('user_id', Auth::id())->paginate(10);
        }
        
        return $this->sendResponse($events, 'Event List');
    }

    public function studentList(){
       
        $students = Student::get(['name', 'id'])->where('user_id', Auth::id());

        return $this->sendResponse($students, 'Student list');
    }

    public function teacherEvents(){
        
        if(Auth::user()->type == 'admin'){
            $events = Event::latest()->paginate(10);
        }else{
            $events = Event::latest()->where('user_id', Auth::id())->paginate(10);
        };

        return $this->sendResponse($events, 'Event List');
    }
}
