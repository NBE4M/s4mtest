<?php

namespace App\Http\Controllers;

use Redirect;
use App\Author;
use Illuminate\Http\Request;
use DB;
use Session;
use Config;
use App\Right;
use Storage;
use Illuminate\Filesystem\Filesystem;
use App\Http\Requests;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Classes\FileTransfer;

class AuthorsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    private $rightObj;

    public function __construct() {
        $this->middleware('auth');
        $this->rightObj = new Right();
    }

    public function index() {
        //echo '$queryed' ;exit;

        /* Right mgmt start */
        $rightId = 9;
        if (!$this->rightObj->checkRightsIrrespectiveChannel($rightId))
            return redirect('/dashboard');
        /* Right mgmt end */


        if (isset($_GET['keyword'])) {
            $queryed = $_GET['keyword'];
            $posts = DB::table('authors')
                    ->select('authors.*', 'authors.name')
                    ->where('authors.author_type_id', '=', '4')
                    ->where('authors.name', 'LIKE', '%' . $queryed . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        } else if (isset($_GET['keywordemail'])) {
            $queryed = $_GET['keywordemail'];
            $posts = DB::table('authors')
                    ->select('authors.*', 'authors.email')
                    ->where('authors.author_type_id', '=', '4')
                    ->where('authors.valid', '=', '1')
                    ->where('authors.email', 'LIKE', '%' . $queryed . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        } else {
            $posts = DB::table('authors')
                    ->select('authors.*', 'authors.author_type_id')
                    ->where('authors.author_type_id', '=', '4')
                    ->where('authors.valid', '=', '1')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        }
        $columns = DB::table('columns')
                ->select('columns.*')
                ->get();

        return view('authors.add-edit-author', compact('posts', 'columns'));
    }

    /**
     * Show the form for guestauthor 
     *
     * @return show
     */
    public function gustauthor() {

        /* Right mgmt start */
        $rightId = 44;
        if (!$this->rightObj->checkRightsIrrespectiveChannel($rightId))
            return redirect('/dashboard');
        /* Right mgmt end */


        //echo $queryed ;exit;
        if (isset($_GET['keyword'])) {
            $queryed = $_GET['keyword'];
            $posts = DB::table('authors')
                    ->select('authors.*', 'authors.name')
                    ->where('authors.author_type_id', '=', '2')
                    ->where('authors.valid', '=', '1')
                    ->where('authors.name', 'LIKE', '%' . $queryed . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        } else if (isset($_GET['keywordemail'])) {
            $queryed = $_GET['keywordemail'];
            $posts = DB::table('authors')
                    ->select('authors.*', 'authors.email')
                    ->where('authors.author_type_id', '=', '2')
                    ->where('authors.valid', '=', '1')
                    ->where('authors.email', 'LIKE', '%' . $queryed . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        } else {
            $posts = DB::table('authors')
                    ->select('authors.*', 'authors.author_type_id')
                    ->where('authors.author_type_id', '=', '2')
                    ->where('authors.valid', '=', '1')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        }


        return view('authors.add-edit-guestauthor', compact('posts'));
    }

    public function bwreporters() {

        /* Right mgmt start */
        $rightId = 45;
        if (!$this->rightObj->checkRightsIrrespectiveChannel($rightId))
            return redirect('/dashboard');
        /* Right mgmt end */

        //echo $queryed ;exit;
        if (isset($_GET['keyword'])) {
            $queryed = $_GET['keyword'];
            $posts = DB::table('authors')
                    ->select('authors.*', 'authors.name')
                    ->where('authors.author_type_id', '=', '3')
                    ->where('authors.valid', '=', '1')
                    ->where('authors.name', 'LIKE', '%' . $queryed . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        } else if (isset($_GET['keywordemail'])) {
            $queryed = $_GET['keywordemail'];
            $posts = DB::table('authors')
                    ->select('authors.*', 'authors.email')
                    ->where('authors.author_type_id', '=', '3')
                    ->where('authors.valid', '=', '1')
                    ->where('authors.email', 'LIKE', '%' . $queryed . '%')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        } else {
            $posts = DB::table('authors')
                    ->select('authors.*', 'authors.author_type_id')
                    ->where('authors.author_type_id', '=', '3')
                    ->where('authors.valid', '=', '1')
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);
        }


        return view('authors.add-edit-bw-reporters', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($request) {
        //Save Request Tuple in Table - Validate First
        // ----- Not Being used for now ----//
        $author = new Author;

        $author->name = $request->name;
        $author->author_type_id = $request->author_type;
        $author->bio = $request->bio;
        $author->email = $request->email;
        $author->mobile = $request->mobile;
        $author->photo = $request->photo;
        $author->twitter = $request->twitter;

        //If columnd_id is not NULL then is_columnist is Set
        $isCol = 0;
        if ($request->column_id > 0) {
            $isCol = '1';
        } else {
            $isCol = 0;
        }
        $author->is_columnist = $isCol;
        $author->column_id = $request->column_id;
        $author->valid = '1';

        $author->save();

        return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        //Save Request Tuple in Table - Validate First
        // dd($request);
        // Validation //

        if ($request->author_type == 2) {//  Guest author
            $rightId = 44;
        } else if ($request->author_type == 3) { // Bw reporters 
            $rightId = 45;
        } else if ($request->author_type == 4) { //Columnist
            $rightId = 9;
        }

        if (!$this->rightObj->checkRightsIrrespectiveChannel($rightId))
            return redirect('cms/dashboard');




        $validation = Validator::make($request->all(), [
                    //'caption'     => 'required|regex:/^[A-Za-z ]+$/',
                    //'description' => 'required',
                    'photo' => 'image|mimes:jpeg,png|min:1|max:250'
        ]);


        $author = new Author;
        $fileTran = new FileTransfer();

        if ($request->qid) {
            $author = Author::find($request->qid);
            $imageurl = '';
            $authordetail = Author::where('author_id', $request->qid)->first();
            //print_r($authordetail->photo);exit;
            if ($request->file('photo')) { // echo 'test';exit;
                $file = $request->file('photo');
             
                $filename = str_random(6) . '_' . $request->file('photo')->getClientOriginalName();
                $name = $request->name;
                $destination_path = Config('constants.awauthordir');
                $fileTran->uploadFile($file, $destination_path, $filename);
                $imageurl = $filename;
                Storage::disk('album')->put(
                    $filename,
                    file_get_contents(Config('constants.UploadImg').Config('constants.awauthordir').$filename),
                    \Illuminate\Contracts\Filesystem\Filesystem::VISIBILITY_PUBLIC
                    );
                if (trim($authordetail->photo)) {
                    $fileTran->deleteFile($destination_path, $authordetail->photo);
                }
               
            }
            //echo 'e'; exit;
            $name = $request->name;
            $author_type_id = $request->author_type;
            $bio = $request->bio;
            $email = $request->email;
            $mobile = $request->mobile;
            $designation = $request->designation;
            if (!empty($imageurl)) {
                $photo = $imageurl;
            } else {
                $photo = $request->photoset;
            }
            //$author->photo = $request->photo;
            $twitter = $request->twitter;

            //If columnd_id is not NULL then is_columnist is Set
            $isCol = 0;
            if ($request->column_id > 0) {
                $isCol = '1';
            } else {
                $isCol = 0;
            }
            $is_columnist = $isCol;
            if (!empty($request->column_id)) {
                $column_id = $request->column_id;
            } else {
                $column_id = '0';
            }
            $valid = '1';
            $author->name = $name;
            $author->hindiName = $request->hindiName;
            $author->author_type_id = $author_type_id;
            $author->bio = $bio;
            $author->email = $email;
            $author->mobile = $mobile;
            $author->designation = $designation;
            $author->photo = $photo;
            $author->twitter = $twitter;
            $author->facebook = $request->facebook;
            $author->is_columnist = $is_columnist;
            $author->column_id = $column_id;
            $author->valid = $valid;

            $author->update();
            if ($request->isertedbybwreportersdata == 'isertedbybwreportersdata') {
                Session::flash('message', 'Your data has been successfully modify.');
                return Redirect::to('bwreporters/add-edit-bw-reporters');
            } else if ($request->isertedbyguestauthordata == 'isertedbyguestauthordata') {
                Session::flash('message', 'Your data has been successfully modify.');
                return Redirect::to('guestauthor/add-edit-gustauthor');
            } else if ($request->isertedbyauthordata == 'isertedbyauthordata') {
                Session::flash('message', 'Your data has been successfully modify.');
                return Redirect::to('article/add-edit-author');
            }
        } else {

            if ($author->where('email', trim($request->email))->count() == 0) {
                $imageurl = '';
                if ($request->file('photo')) {
                    $file = $request->file('photo');
                    $filename = $request->file('photo')->getClientOriginalName();
                    $destination_path = Config('constants.awauthordir');
                    $fileTran->uploadFile($file, $destination_path, $filename);
                    $imageurl = $filename;
                   Storage::disk('album')->put(
                    $filename,
                    file_get_contents(Config('constants.UploadImg').Config('constants.awauthordir').$filename),
                    \Illuminate\Contracts\Filesystem\Filesystem::VISIBILITY_PUBLIC
                    );
        
                }
                //echo 'e'; exit;
                $author->name = $request->name;
                $author->hindiName = $request->hindiName;
                $author->author_type_id = $request->author_type;
                $author->bio = $request->bio;
                $author->email = $request->email;
                $author->mobile = $request->mobile;
                $author->designation = $request->designation;
                $author->photo = $imageurl;
                if (!empty($imageurl)) {
                    $author->photo = $imageurl;
                } else {
                    $author->photo = $request->photoset;
                }
                //$author->photo = $request->photo;
                $author->twitter = $request->twitter;
                $author->facebook = $request->facebook;
                //If columnd_id is not NULL then is_columnist is Set
                $isCol = 0;
                if ($request->column_id > 0) {
                    $isCol = '1';
                } else {
                    $isCol = 0;
                }
                $author->is_columnist = $isCol;
                if (!empty($request->column_id)) {
                    $author->column_id = $request->column_id;
                }else {
                $author->column_id = '0';
                }
                $author->valid = '1';
                if (!empty($request->author_status)) {
                    $author->author_status = $request->author_status;
                }else {
                $author->author_status = '0';
                }
                $author->save();

                if ($request->isertedbybwreportersdata == 'isertedbybwreportersdata') {
                    Session::flash('message', 'Your data has been successfully modify.');
                    return Redirect::to('bwreporters/add-edit-bw-reporters');
                } else if ($request->isertedbyguestauthordata == 'isertedbyguestauthordata') {
                    Session::flash('message', 'Your data has been successfully modify.');
                    return Redirect::to('guestauthor/add-edit-gustauthor');
                } else if ($request->isertedbyauthordata == 'isertedbyauthordata') {
                    Session::flash('message', 'Your data has been successfully modify.');
                    return Redirect::to('article/add-edit-author');
                }
                $arr = array('status' => 'success');
            } else {
                if ($request->isertedbybwreportersdata == 'isertedbybwreportersdata'):
                    Session::flash('message', 'Email already registred.');
                    return Redirect::to('bwreporters/add-edit-bw-reporters');
                endif;
                if ($request->isertedbyguestauthordata == 'isertedbyguestauthordata'):
                    Session::flash('message', 'Email already registred.');
                    return Redirect::to('guestauthor/add-edit-gustauthor');
                endif;
                if ($request->isertedbyauthordata == 'isertedbyauthordata'):
                    Session::flash('allready', 'Email already registred.');
                    return Redirect::to('article/add-edit-author');
                endif;
                $arr = array('status' => 'error', 'msg' => 'Email already registred');
            }

            return $arr;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit() {
        //
        //$asd = fopen("/home/sudipta/log.log", 'a+');
        if (isset($_GET['option'])) {
            $id = $_GET['option'];
        }
        //fwrite($asd, " EDIT ID Passed ::" .$id  . "\n\n");
        $editAuthor = Author::where('author_id', $id)
                ->select('authors.*')
                ->get();
        //print_r($editAuthor);exit;

        echo json_encode(array($editAuthor));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy() {
        if (isset($_GET['option'])) {
            $id = $_GET['option'];
        }
        // echo $id; die;
        //fwrite($asd, " Del Ids: ".$id." \n\n");
        $delArr = explode(',', $id);
        //fwrite($asd, " Del Arr Count: ".count($delArr)." \n\n");
        foreach ($delArr as $d) {
            //fwrite($asd, " Delete Id : ".$d." \n\n");
            $valid = '0';
            $deleteAl = [

                'valid' => $valid
            ];
            DB::table('authors')
                    ->where('author_id', $d)
                    ->update($deleteAl);
        }
        return;
    }

    public function changeStatus() {
        $rightId = 45;
        if (!$this->rightObj->checkRightsIrrespectiveChannel($rightId))
            return response()->json(array('status' => '0', 'msg' => 'Permission Denied'));
        $author_id = $_GET['author_id'];
        $status = ($_GET['status'] == 0) ? 1 : 0;
        $updateVar = [

            'author_status' => $status
        ];
        if (DB::table('authors')->where('author_id', $author_id)->update($updateVar)) {
            if ($status == 0) {
                $msg = '<a href="javascript:void(0)" onclick="changeStatus(\'' . $status . '\',\'' . $author_id . '\')">Inactive</a>';
                return response()->json(array('status' => '1', 'msg' => $msg));
            } else {
                $msg = '<a href="javascript:void(0)" onclick="changeStatus(\'' . $status . '\',\'' . $author_id . '\')">Active</a>';
                return response()->json(array('status' => '1', 'msg' => $msg));
            }
        } else {
            return response()->json(array('status' => '0', 'msg' => 'Can\'t update try again'));
        }
    }

}
