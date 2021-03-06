<?php

namespace Story\Framework\Frontend\Controllers;

use Story\Framework\Contracts\StoryPostRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * The StoryPostRepository implementation.
     *
     * @var Story\Framework\Contracts\StoryPostRepository
     */
    protected $post;

    /**
     * Create search controller
     *
     * @param StoryPostRepository $post
     */
    public function __construct(StoryPostRepository $post)
    {
        $this->post = $post;
    }

    /**
     * Display search result
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = $this->post->search($request->input('q'));

        return $this->view('search', compact('posts'));
    }
}
