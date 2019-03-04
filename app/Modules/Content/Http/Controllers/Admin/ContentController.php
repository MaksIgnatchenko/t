<?php

namespace App\Modules\Content\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Content\Http\Requests\Admin\UpdateContentRequest;
use App\Modules\Content\Models\Content;
use Laracasts\Flash\Flash;

class ContentController extends Controller
{
    /** @var Content */
    protected $content;

    /**
     * ContentController constructor.
     * @param Content $content
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contents = $this->content->all();

        return view('content.index')
            ->with('contents', $contents);
    }

    /**
     * @param Content $content
     * @param UpdateContentRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Content $content, UpdateContentRequest $request)
    {
        $content->fill($request->all());
        $content->save();

        Flash::success('Content updated successfully.');

        return back();
    }
}
