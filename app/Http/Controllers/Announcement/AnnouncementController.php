<?php

namespace App\Http\Controllers\Announcement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Announcement_Category;
use App\Models\Announcement_Type;
use App\Models\Announcement_Status;
use App\Models\Comment;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{

        public function uploadImage($folder,$image){

            $image->store('/',$folder);
            $filename=$image->hashName();
            $path='assets/img/'.$folder.'/'.$filename;
            return $path;

            }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $announcements=Announcement::get();
        $data=array();
        foreach($announcements as $announcement){
            if($announcement->created_at->diff(now())->d==3)
                array_push($data,$announcement);}

         dd($data);


        // dd($date);

    }

    public function getAnnouncementsByCategory($id)
    {

      $categ=Announcement_Category::find($id);
      $category=$categ->name;


        $announcements = Announcement::where('category_id',$id)->orderBy('id','DESC')->get();

        return view('announcements.index',compact('announcements','category'));

    }

    public function getExpiredAnnouncements($id)
    {


        $categ=Announcement_Category::find($id);
        $category=$categ->name;

        $anns = Announcement::where('category_id',$id)->orderBy('id','DESC')->get();

        $announcements=array();
        $settings=Settings::get()->first();
        foreach($anns as $announcement){
            if($announcement->created_at->diff(now())->d==$settings->announcement_expire_period)
                array_push($announcements,$announcement);}
        return view('announcements.index',compact('announcements','category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     //
    }

    public function createAnnouncement($category)
    {
        $types=Announcement_Type::get();
        return view('announcements.create',compact('category','types'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $details=json_encode($request->except("_token","category_id","user_id","type_id","place","description","photo"));

        $announcement= new Announcement();
        $announcement->user_id=Auth::user()->id;
        $announcement->type_id=$request['type_id'];
        $announcement->category_id=$request['category_id'];;
        $announcement->place=$request['place'];
        $announcement->description=$request['description'];
        $announcement->details=$details;

        $path="";
        if($request->has('photo')){
            $path= $this->uploadImage('announcements',$request->photo);
            $announcement->photo=$path;
            $announcement->save();
        }

        $announcement->save();

        return redirect()->route("annoucements.get",$request->category_id)
        ->with('success','تم انشاء البلاغ بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcement=Announcement::findOrFail($id);
        $category=$announcement->category_id;

        $types=Announcement_Type::get();
        $statuses=Announcement_Status::get();


        return view('announcements.edit',compact("announcement","category","types","statuses"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $announcement=Announcement::findOrFail($id);

        $details=json_encode($request->except("_token","category_id","user_id","type_id","status_id","place","description","photo"));

        $announcement->type_id=$request['type_id'];
        $announcement->place=$request['place'];
        $announcement->description=$request['description'];
        $announcement->status_id=$request['status_id'];
        $announcement->details=$details;

        if($request->has('photo')){
            $path= $this->uploadImage('announcements',$request->photo);
            $announcement->photo=$path;
        }

        $announcement->save();
        return redirect()->route("annoucements.get",$request->category_id)
        ->with('success','تم تعديل البلاغ بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement=Announcement::find($id);
        $announcement->delete();
    }

    public function eye($id)
    {

        $affected = Announcement::find($id);
        if ($affected->is_active == 1) {
            $affected->is_active = 0;
            $affected->save();
            echo ' <i style="color: red;" class="fa fa-eye-slash"></i>';
        } else {
            $affected->is_active = 1;
            $affected->save();
            echo '<i  class="fa fa-eye"></i>';
        }


    }

    public function getAnnouncementComments($id){
        $comments=Comment::where('announcement_id',$id)->get();
        return view('announcements.comments',compact('comments'));

    }
}
