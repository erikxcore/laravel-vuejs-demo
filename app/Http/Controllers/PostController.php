<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Issues with HTTPS and Mediacom's firewall
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $res = $client->request('get', 'http://immense-gorge-22729.herokuapp.com/api/posts');
        //echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        //echo $res->getBody();

        //$post=Post::find($id);
        //return view('posts.index');
        //we have JSON!!

        $posts= json_decode($res->getBody());

        return view('posts.index',compact('posts'));

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $client = new Client();
        $res = $client->request('get', 'http://immense-gorge-22729.herokuapp.com/api/posts/' . $id);
        //echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        //echo $res->getBody();

       // return view('posts.show');

        // {"type":"User"...'
        //$post = null;

        //print_r(json_decode($res->getBody()));
        
        $post= json_decode($res->getBody());

        return view('posts.show',compact('post'));
        //return view('posts.show')->with(['post'=>$post]);        
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
