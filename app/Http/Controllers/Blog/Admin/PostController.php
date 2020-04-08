<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PostController extends BaseController
{
    /*
     * @var BlogPostRepository
     */
    private $blogPostRepository;

    /*
     * @var BlogCategoryRepository
     */
    private $BlogCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->BlogCategoryRepository = app(BlogCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(__METHOD__);
        $paginator = $this->blogPostRepository->getAllWithPaginate();
        return view('blog.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // dd(__METHOD__);
        $categoryList = $this->BlogCategoryRepository->getForComboBox();

        $item = new BlogPost();

        return view('blog.admin.posts.edit',
            compact('item',
                'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BlogPostCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        //dd($request['is_published']);
        //dd(__METHOD__);
        $data = $request->input();

        if($data['is_published'] == 1) {
            $data['published_at'] = Carbon::now();
        }

        $item = (new BlogPost())->create($data);

        if ($item) {
            return redirect()->route('blog.admin.post.edit', [$item->id])
                ->with(['success' => 'успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'ошибка сохранения'])
                ->withInput();
        }
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
        $categoryList = $this->BlogCategoryRepository->getForComboBox();

        $item = $this->blogPostRepository->getEdit($id);
        if(empty($item)){
            abort(404);
        }
        return view('blog.admin.posts.edit',
            compact('item',
                'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogPostUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);
        //dd($request->all());

        if(empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

//        If(empty($data['slug'])) {
//            $data['slug'] = \Str::slug($data['title']);
//        }

//        if(empty($item->published_at) && $data['is_published']) {
//            $data['is_published'] = Carbon::now();
//        }

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.post.edit', $item->id)
                ->with(['success' => 'успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения!"])
                ->withInput();
        }

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
