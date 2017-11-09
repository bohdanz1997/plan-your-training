<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Group;
use App\Services\TemplateService;
use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * @var TemplateService
     */
    private $templateService;

    public function __construct(TemplateService $templateService)
    {
        $this->middleware('auth');
        $this->templateService = $templateService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::pluck('title', 'id', 'group_id')->toArray();;
        $exercises = Exercise::pluck('title', 'id')->toArray();

        return view('template.create', compact(
            'groups', 'exercises'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->templateService->save($request->all());

        return redirect()->route('account.index');
    }

    /**
     * @param Template $template
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Template $template)
    {
        $this->templateService->delete($template);

        return redirect()->route('account.index');
    }
}
