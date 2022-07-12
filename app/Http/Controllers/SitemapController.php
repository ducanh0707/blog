<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Model\M_post;
use DB;
use Auth;
use Session;

class SitemapController extends Controller
{
   public function index()
   {
         $articles = M_post::all()->first();
         return response()->view('sitemap.index', [
             'articles' => $articles,
         ])->header('Content-Type', 'text/xml');
   }
   public function articles()
   {
         $articles = M_post::all();
         return response()->view('sitemap.articles', [
               'articles' => $articles,
         ])->header('Content-Type', 'text/xml');
   }
}