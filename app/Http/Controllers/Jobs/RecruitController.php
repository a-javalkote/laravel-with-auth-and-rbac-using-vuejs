<?php
namespace App\Http\Controllers\Jobs;
use App\Http\Controllers\Controller;
use App\Models\JobPosts;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
class RecruitController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:recruit list', ['only' => ['index', 'show']]);
        $this->middleware('can:recruit create', ['only' => ['create', 'store']]);
        $this->middleware('can:recruit upload', ['only' => ['create']]);
        $this->middleware('can:recruit edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:recruit delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JobPosts = (new JobPosts)->newQuery();
        $JobPosts->latest();
        $JobPosts = $JobPosts->paginate(100)->onEachSide(2)->appends(request()->query());
        return Inertia::render('Jobs/Recruit/Index', [
            'jobposts' => $JobPosts,
            'can' => [
                'create' => Auth::user()->can('recruit create'),
                'edit' => Auth::user()->can('recruit edit'),
                'delete' => Auth::user()->can('recruit delete'),
                'upload' => Auth::user()->can('recruit upload')
            ]
        ]);
    }
}
