<?php

namespace App\Http\Controllers;

use App\Models\forum_post;
use App\Models\forum_post_like;
use App\Models\forum_post_favorite;
use App\Models\forum_post_comment;
use App\Models\forum_post_view;
use App\Models\forum_event;
use App\Models\forum_event_response;
use App\Models\tutorial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;

class ForumController extends Controller
{
    public function forum(Request $request){
        $posts = forum_post::orderBy('created_at', 'desc')->paginate(3);

        // if ($request->ajax()) {
        //     $view = view('forum.layouts.post.forum_postList', compact('posts'))->render();
        //     return response()->json(['html' => $view]);
        // }

        return view('forum.layouts.forum',compact('posts'));
    }

    public function add_post(Request $request){

        $validator = Validator::make($request->all(), [
            'description' => 'required'
        ], [
            'description.required' => 'Description Field Is Required.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidPostAdd', 'Invalid Update');
        }else{
            $filename = '';
            if ($request->hasFile('post_image')){

                $file = $request->file('post_image');
                if ($file->isValid()) {
                    $filename = "f_p_" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('forum/post', $filename);
                }
            }
            forum_post::create([
                'u_doc_id' => auth()->user()->id,
                'post_type' => 1,
                'description' => $request->description,
                'post_img' => $filename
            ]);
            return back()->with('success','Post Added Successfully!');
        }
    }

    public function update_post(Request $request){

        $validator = Validator::make($request->all(), [
            'u_description' => 'required'
        ], [
            'u_description.required' => 'Description Field Is Required.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidPostUP', 'Invalid Update');
        }else{
            $post = forum_post::find($request->post_id);
            $post_filename = $post->post_img;

            if ($request->hasFile('u_post_image')) {
                $destination = 'uploads/forum/post/' . $post->post_img;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('u_post_image');
                if ($file->isValid()) {
                    $post_filename = "f_p_" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('forum/post', $post_filename);
                }
            }
            forum_post::find($request->post_id)->update([
                'description' => $request->u_description,
                'post_img' => $post_filename
            ]);
            return back()->with('success','Post Updated Successfully!');
        }
    }

    public function add_article(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'postTitle' => 'required',
            'description' => 'required',
            'summery' => 'required',
            'article_image' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'postTitle.required' => 'Post Title Field Is Required.',
            'description.required' => 'Description Field Is Required.',
            'summery.required' => 'Summery Field Is Required.',
            'article_image.required' => 'Image Field Is Required.',
            'article_image.image' => 'Image Field Must Be Image.',
            'article_image.mimes' => 'Image Field Must Be jpeg,png,jpg.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidArticalAdd', 'Invalid Update');
        } else {

            $filename = '';
            if ($request->hasFile('article_image')) {

                $file = $request->file('article_image');
                if ($file->isValid()) {
                    $filename = "f_pro_" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('forum/article', $filename);
                }
            }
            forum_post::create([
                'u_doc_id' => auth()->user()->id,
                'post_type' => 2,
                'post_title' => $request->postTitle,
                'post_main' => $request->description,
                'description' => $request->summery,
                'post_img' => $filename
            ]);
            return back();
        }
    }

    public function update_article(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'u_postTitle' => 'required',
            'u_description' => 'required',
            'u_summery' => 'required',
        ], [
            'u_postTitle.required' => 'Post Title Field Is Required.',
            'u_description.required' => 'Description Field Is Required.',
            'u_summery.required' => 'Summery Field Is Required.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidArticalUP', 'Invalid Update');
        } else {

            $post = forum_post::find($request->post_id);
            $post_filename = $post->post_img;

            if ($request->hasFile('u_article_image')) {

                $destination = 'uploads/forum/article/' . $post->post_img;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('u_article_image');
                if ($file->isValid()) {
                    $post_filename = "f_pro_" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('forum/article', $post_filename);
                }
            }
            forum_post::find($request->post_id)->update([
                'post_title' => $request->u_postTitle,
                'post_main' => $request->u_description,
                'description' => $request->u_summery,
                'post_img' => $post_filename
            ]);

            return back();
        }
    }

    public function add_review(Request $request){
        $validator = Validator::make($request->all(), [
            'product_Name' => 'required',
            'description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'product_Name.required' => 'Product Name Field Is Required.',
            'description.required' => 'Description Field Is Required.',
            'product_image.required' => 'Image Field Is Required.',
            'product_image.image' => 'Image Field Must Be Image.',
            'product_image.mimes' => 'Image Field Must Be jpeg,png,jpg.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidReviewAdd', 'Invalid Update');
        } else {

            if ($request->hasFile('product_image'))
            $filename = ''; {

                $file = $request->file('product_image');
                if ($file->isValid()) {
                    $filename = "f_a_" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('forum/product', $filename);
                }
            }
            forum_post::create([
                'u_doc_id' => auth()->user()->id,
                'post_type' => 3,
                'post_title' => $request->product_Name,
                'description' => $request->description,
                'post_img' => $filename
            ]);
            return back();
        }
    }

    public function update_review(Request $request){
        $validator = Validator::make($request->all(), [
            'u_product_Name' => 'required',
            'u_description' => 'required',
        ], [
            'u_product_Name.required' => 'Product Name Field Is Required.',
            'u_description.required' => 'Description Field Is Required.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidReviewUP', 'Invalid Update');
        } else {
            $post = forum_post::find($request->post_id);
            $post_filename = $post->post_img;

            if ($request->hasFile('product_image')){

                $destination = 'uploads/forum/product/' . $post->post_img;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('product_image');
                if ($file->isValid()) {
                    $post_filename = "f_a_" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('forum/product', $post_filename);
                }
            }
            forum_post::find($request->post_id)->update([
                'post_title' => $request->u_product_Name,
                'description' => $request->u_description,
                'post_img' => $post_filename
            ]);
            return back();
        }
    }

    public function add_case_studies(Request $request)
    {
        // dd($request->all());
        $array = [
            'p_id' => $request->patient_id,
            't_id' => $request->treatment_id,
        ];

        $array = implode(',', $array);

        forum_post::create([
            'u_doc_id' => auth()->user()->id,
            'post_type' => 4,
            'post_title' => $request->post_title,
            'post_main' => $array,
            'description' => $request->description,
        ]);

        return redirect()->route('treatments', [auth()->user()->id, $request->patient_id, $request->treatment_id, $request->treatment_name])->with('success', 'Case Studies Posted In Forum Successfully!');
    }

    public function update_case(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'u_post_title_c' => 'required',
            'u_description_c' => 'required',
        ], [
            'u_post_title_c.required' => 'Post Title Field Is Required.',
            'u_description_c.required' => 'Short Description/Summery Field Is Required.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidCaseUP', 'Invalid Update');
        } else {
            forum_post::find($request->post_id)->update([
                'post_title' => $request->u_post_title_c,
                'description' => $request->u_description_c,
            ]);
            return back();
        }
    }

    public function delete_post(Request $request){
        $views = forum_post_view::where('post_id', $request->post_id)->get();
        $likes = forum_post_like::where('post_id', $request->post_id)->get();
        $comments = forum_post_comment::where('post_id', $request->post_id)->get();
        $favPosts = forum_post_favorite::where('post_id', $request->post_id)->get();

        foreach ($views as $view){
            forum_post_view::find($view->id)->delete();
        }
        foreach ($likes as $like){
            forum_post_like::find($like->id)->delete();
        }
        foreach ($comments as $comment){
            forum_post_comment::find($comment->id)->delete();
        }
        foreach ($favPosts as $favPost){
            forum_post_favorite::find($favPost->id)->delete();
        }

        forum_post::find($request->post_id)->delete();

        return redirect()->route('forum');
    }

    public function forum_populerPost_list(Request $request){

        $posts = forum_post::orderBy('view_count', 'desc')->orderBy('created_at', 'desc')->paginate(3);

        // if ($request->ajax()) {
        //     $view = view('forum.layouts.post.forum_postList', compact('posts'))->render();
        //     return response()->json(['html' => $view]);
        // }

        return view('forum.layouts.forum',compact('posts'));
    }

    public function forum_favPost_list(Request $request){
        $fav_posts = forum_post_favorite::where('u_id', auth()->user()->id)->paginate(3);
        // dd($fav_posts);

        // if ($request->ajax()) {
        //     $view = view('forum.layouts.post.forum_favPostList', compact('fav_posts'))->render();
        //     return response()->json(['html' => $view]);
        // }

        return view('forum.layouts.favorite_post',compact('fav_posts'));
    }

    // public function forum_post_view($post_id){

    //     $getPost = forum_post::find($post_id);

    //     $previousViewCount = $getPost->view_count;

    //     $viewCount = $previousViewCount + 1;

    //     $getPost->update([
    //         'view_count' => $viewCount
    //     ]);

    //     return redirect()->route('post_view', $getPost->id);
    // }
    public function viewCount($post_id){
        $getPost = forum_post::find($post_id);

        $checkView = forum_post_view::where('post_id', $post_id)->where('u_id',auth()->user()->id)->doesntExist();
        $checkOwner = forum_post::where('id', $post_id)->where('u_doc_id',auth()->user()->id)->doesntExist();
        if($checkOwner){
            if($checkView){
                forum_post_view::create([
                    'post_id' => $post_id,
                    'u_id' => auth()->user()->id
                ]);

                $viewCount = forum_post_view::where('post_id', $post_id)->count();
                $getPost->update([
                    'view_count' => $viewCount
                ]);
            }
        }

    }

    public function post_view($post_id){
        $this->viewCount($post_id);
        $post = forum_post::find($post_id);
        $comments = forum_post_comment::where('post_id', $post->id)->get();
        // dd($comments);
        return view('forum.layouts.view_post',compact('post', 'comments'));
    }

    public function add_post_comment(Request $request, $post_id){
        // dd($request->all(),$post_id, auth()->user()->id);
        $request->validate([
            'postComment' => 'required'
        ],[
            'postComment.required' => 'Comment Field Is Required.'
        ]);

        forum_post_comment::create([
            'post_id' => $post_id,
            'u_id' => auth()->user()->id,
            'comment' => $request->postComment
        ]);

        $count = forum_post_comment::where('post_id', $post_id)->count();

        forum_post::find($post_id)->update([
            'comments_count' => $count
        ]);

        return redirect()->route('post_view', $post_id. "#comments_all_section");

    }

    public function get_post_comment($comment_id){
        $comment = forum_post_comment::find($comment_id);

        return response()->json([
           'status' => 200,
           'comment' => $comment
        ]);
    }

    public function update_post_comment(Request $request){

        forum_post_comment::find($request->comment_id)->update([
            'comment' => $request->u_comment
        ]);

        return back();
    }


    public function delete_comment(Request $request){

        forum_post_comment::find($request->comment_id)->delete();

        $count = forum_post_comment::where('post_id', $request->post_id)->count();

        forum_post::find($request->post_id)->update([
            'comments_count' => $count
        ]);
        return back();
    }



    public function forum_post_like($post_id,$u_id){
        forum_post_like::create([
            'post_id' => $post_id,
            'u_id' => $u_id
        ]);

        $count = forum_post_like::where('post_id', $post_id)->count();
        // dd($count);

        forum_post::find($post_id)->update([
            'likes_count' => $count
        ]);

        return back();
    }

    public function forum_post_dislike($post_id,$u_id){
        forum_post_like::where('post_id',$post_id)->where('u_id',$u_id)->delete();

        $count = forum_post_like::where('post_id', $post_id)->count();
        // dd($count);

        forum_post::find($post_id)->update([
            'likes_count' => $count
        ]);

        return back();
    }

    public function forum_post_fav($post_id,$u_id){
        forum_post_favorite::create([
            'post_id' => $post_id,
            'u_id' => $u_id
        ]);

        return back();
    }

    public function forum_post_unfav($post_id,$u_id){

        forum_post_favorite::where('post_id',$post_id)->where('u_id',$u_id)->delete();

        return back();
    }

    public function forum_case_studies(){

        $posts = forum_post::orderBy('created_at', 'desc')->where('post_type',4)->paginate(3);

        return view('forum.layouts.caseStudies',compact('posts'));
    }
    public function forum_article(){
        $posts = forum_post::orderBy('created_at', 'desc')->where('post_type',2)->paginate(3);

        return view('forum.layouts.articles',compact('posts'));
    }



    public function forum_product_review(){
        $posts = forum_post::orderBy('created_at', 'desc')->where('post_type', 3)->paginate(3);
        return view('forum.layouts.product_review', compact('posts'));
    }



    public function all_events(){

        $events = forum_event::where('status',1)->orderBy('created_at', 'desc')->paginate(3);
        $tests = forum_event_response::where('u_id',auth()->user()->id)->get();

        return view('forum.layouts.all_events',compact('events','tests'));
    }

    public function add_event(Request $request){
        $validator = Validator::make($request->all(), [
            'eventTitle' => 'required',
            'location' => 'required',
            'eventDate' => 'required',
            'eventTime' => 'required',
            'description' => 'required',
        ], [
            'eventTitle.required' => 'Event Title Field Is Required.',
            'location.required' => 'Location Field Is Required.',
            'eventDate.required' => 'Event Date Field Is Required.',
            'eventTime.required' => 'Event Time Field Is Required.',
            'description.required' => 'Description Field Is Required.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalideventAdd', 'Invalid Update');
        }else{
            if(auth()->user()->role == 0){
                forum_event::create([
                    'u_id'=> auth()->user()->id,
                    'eventTitle' => $request->eventTitle,
                    'location' => $request->location,
                    'eventDate' => $request->eventDate,
                    'eventTime' => $request->eventTime,
                    'description' => $request->description,
                ]);
            }else{
                forum_event::create([
                    'u_id'=> auth()->user()->id,
                    'eventTitle' => $request->eventTitle,
                    'location' => $request->location,
                    'eventDate' => $request->eventDate,
                    'eventTime' => $request->eventTime,
                    'description' => $request->description,
                    'status' => 1
                ]);
            }

            return back()->with('success','Event Added Successfully! Please Wait For Admin Validate.');
        }
    }

    public function viewEvent($event_id)
    {
        $event = forum_event::find($event_id);
        $eventResponses = forum_event_response::where('event_id', $event_id)->get();
        $go = forum_event_response::where('event_id', $event_id)->where('status',1)->count();
        $notgo = forum_event_response::where('event_id', $event_id)->where('status',2)->count();
        $maybe = forum_event_response::where('event_id', $event_id)->where('status',3)->count();

        return view('forum.layouts.event_view', compact('event', 'eventResponses','go','notgo','maybe'));
    }

    public function edit_event(Request $request){
        $validator = Validator::make($request->all(), [
            'u_eventTitle' => 'required',
            'u_location' => 'required',
            'u_eventDate' => 'required',
            'u_eventTime' => 'required',
            'u_description' => 'required',
        ], [
            'u_eventTitle.required' => 'Event Title Field Is Required.',
            'u_location.required' => 'Location Field Is Required.',
            'u_eventDate.required' => 'Event Date Field Is Required.',
            'u_eventTime.required' => 'Event Time Field Is Required.',
            'u_description.required' => 'Description Field Is Required.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalideventUp', 'Invalid Update');
        }else{
            forum_event::find($request->event_id)->update([
                'eventTitle' => $request->u_eventTitle,
                'location' => $request->u_location,
                'eventDate' => $request->u_eventDate,
                'eventTime' => $request->u_eventTime,
                'description' => $request->u_description,
            ]);

            return back()->with('success','Event Update Successfully!');
        }
    }

    public function delete_event(Request $request){

        $responses = forum_event_response::where('event_id', $request->event_id)->get();
        foreach($responses as $response){
            forum_event_response::find($response->id)->delete();
        }
        forum_event::find($request->event_id)->delete();
        return redirect()->route('all_events')->with('success', 'Event Deleted Successfully!');
    }

    public function event_response($event_id,$u_id,$value){

        $check = forum_event_response::where('event_id',$event_id)->where('u_id',$u_id)->exists();

        $event_owner = forum_event::where('id', $event_id)->where('u_id',auth()->user()->id)->doesntExist();

        if($event_owner){
            if($check){
                forum_event_response::where('event_id', $event_id)->where('u_id', $u_id)->update([
                    'status' => $value
                ]);
            }else{
                forum_event_response::create([
                    'event_id' => $event_id,
                    'u_id' => $u_id,
                    'status' => $value
                ]);
            }
        }

        return back();
    }

    public function viewTutorial(){
        $tutorials = tutorial::where('showStatus',1)->orderBy('id','desc')->get();

        return view('forum.layouts.tutorial_view',compact('tutorials'));
    }



}
