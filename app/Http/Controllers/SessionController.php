<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all(); // Get all subjects
        $teachers = User::where('role_id', 2)->get();
        if(Auth::user()->isAdmin() || Auth::user()->isTeacher()){
            $sessions = Session::where('created_by', Auth::user()->id)->get();
        }else{
            return redirect('home');
        }
        return view('sessions.index',compact('sessions', 'subjects','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all(); // Get all subjects

        return view('sessions.create-edit', compact('subjects'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSessionRequest $request)
    {

            $session = new Session;
            $session->title = $request->title;
            $session->session_code = $this->generateUniqueCode();
            $session->summary = $request->summary ?? '';
            $session->starts_at = $request->starts_at; // Handle as time only, adjust if needed
            $session->ends_at = $request->ends_at ?? ''; // Handle as time only, adjust if needed
            $session->subject_id = $request->subject_id;
            if (!Auth::user()->isTeacher()) {
                $session->teacher_id = $request->teacher_id;  // Set teacher from the form
            } else {
                $session->teacher_id = Auth::user()->id;  // Set the teacher as the authenticated user
            }
            $session->created_by = Auth::user()->id;
            $session->active = 1;
            $session->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Session created successfully!',
                'session' => ''
            ], 200);



    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSessionRequest $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function session($code)
    {
        $session = Session::where('code', $code)->first();
        if($session->canAccess(Auth::user())){
            return view('sessions.session',compact('session'));
        }else{
            return back()->withErrors(['message' => __('Não tem permissão para aceder a esta página')]);
        }
    }
    public function destroy(Session $session)
    {
        //
    }
    //Gerar códigos
    public function generateUniqueCode(): string
    {
        do {
            $code = Str::random(20);  // Generates a random string of 10 characters
        } while (Session::where('session_code', $code)->exists());

        return $code;
    }
}
