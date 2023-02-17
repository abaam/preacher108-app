<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Requests\Students\StudentRequest;
use App\Models\Student;
use App\Models\Tag;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StudentController extends BaseController
{

    protected $student = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->middleware('auth:api');
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        //var_dump(Auth::id());
        if(Auth::user()->type == 'admin'){
            $students = $this->student->latest()->with('category', 'tags')->paginate(10);
        }else{
            $students = $this->student->latest()->with('category', 'tags')->where('user_id', Auth::id())->paginate(10);
        }
        

        return $this->sendResponse($students, 'Student list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Students\StudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {

        $student = $this->student->create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'address' => $request->get('address'),
            'category_id' => $request->get('category_id'),
            'user_id' => $request->get('user_id'),
            'fb_link' => $request->get('fb_link'),
            'phone' => $request->get('phone'),
        ]);

        // update pivot table
        $tag_ids = [];
        foreach ($request->get('tags') as $tag) {
            $existingtag = Tag::whereName($tag['text'])->first();
            if ($existingtag) {
                $tag_ids[] = $existingtag->id;
            } else {
                $newtag = Tag::create([
                    'name' => $tag['text']
                ]);
                $tag_ids[] = $newtag->id;
            }
        }
        $student->tags()->sync($tag_ids);

        return $this->sendResponse($student, 'Student Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->student->with(['category', 'tags'])->findOrFail($id);

        return $this->sendResponse($student, 'Student Details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student = $this->student->findOrFail($id);

        $student->update($request->all());

        // update pivot table
        $tag_ids = [];
        foreach ($request->get('tags') as $tag) {
            $existingtag = Tag::whereName($tag['text'])->first();
            if ($existingtag) {
                $tag_ids[] = $existingtag->id;
            } else {
                $newtag = Tag::create([
                    'name' => $tag['text']
                ]);
                $tag_ids[] = $newtag->id;
            }
        }
        $student->tags()->sync($tag_ids);

        return $this->sendResponse($student, 'Student Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorize('isAdmin');

        $student = $this->student->findOrFail($id);

        $student->delete();

        return $this->sendResponse($student, 'Student has been Deleted');
    }

    public function upload(Request $request)
    {
        $fileName = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload'), $fileName);

        return response()->json(['success' => true]);
    }

    public function test(Request $request){
        $id = $request->segment(4);
        $student = $this->student->with(['category', 'tags'])->findOrFail($id);

        return $this->sendResponse($student, 'Student Details');
        
    }
}
