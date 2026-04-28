<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    public function index(Request $request) {

        if (!empty($request->records_per_page)) {

            $request->records_per_page = $request->records_per_page <= env('PAGINATION_MAX_SIZE')
                                            ? $request->records_per_page
                                            : env('PAGINATION_MAX_SIZE');

        } else {

            $request->records_per_page = env("PAGINATION_DEFAULT_SIZE");
        }

        $blogs = Blog::with('section')
                     ->where('title', 'LIKE', "%$request->filter%")
                     ->paginate($request->records_per_page);

        return view('blogs/index', ['blogs' => $blogs, 'data' => $request]);
    }

    public function create() {

        $sections = Section::all();
        return view('blogs/create', ['sections' => $sections]);
    }

    public function edit($id) {

        $blog = Blog::find($id);

        if (empty($blog)) {

            Session::flash('message', [ 'content' => "El blog con id '$id' no existe.", 'type' => 'error' ]);
            return redirect()->back();
        }

        $sections = Section::all();
        return view('blogs/edit', [
            'blog' => $blog,
            'sections' => $sections
        ]);
    }

    public function store(Request $request) {

        Validator::make($request->all(),
        [
            'title' => 'required|max:128',
            'content' => 'required',
            'section_id' => 'required|exists:sections,id'
        ],
        [
            'title.required' => 'El titulo es requerido',
            'title.max' => 'El titulo no puede ser mayor :max letras',

            'content.required' => 'El contenido es requerido',

            'section_id.required' => 'La sección es requerida',
            'section_id.exists' => 'El id dado para la sección no existe.',

        ])->validate();

        try {

            $blog = new Blog();
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->section_id = $request->section_id;
            $blog->save();

            Session::flash('message', [ 'content' => "Blog creado con éxito", 'type' => 'success' ]);
            return redirect()->route('blogs.index');

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', [ 'content' => "Ha ocurrido.", 'type' => 'error' ]);
            return redirect()->back();
        }
    }

    public function update(Request $request) {

        Validator::make($request->all(),
        [
            'blog_id' => 'required|exists:blogs,id',
            'title' => 'required|max:128',
            'content' => 'required',
            'section_id' => 'required|exists:sections,id',
        ],
        [
            'blog_id.required' => 'El blog es requerido',
            'blog_id.exists' => 'El id dado para el blog no existe.',

            'title.required' => 'El titulo es requerido',
            'title.max' => 'El titulo no puede ser mayor :max letras',

            'content.required' => 'El contenido es requerido',

            'section_id.required' => 'La sección es requerida',
            'section_id.exists' => 'El id dado para la sección no existe.',

        ])->validate();

        try {

            $blog = Blog::find($request->blog_id);
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->section_id = $request->section_id;
            $blog->save();

            Session::flash('message', [ 'content' => "Blog actualizado con éxito", 'type' => 'success' ]);
            return redirect()->route('blogs.index');

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', [ 'content' => "Ha ocurrido.", 'type' => 'error' ]);
            return redirect()->back();
        }
    }

    public function delete($id) {

        try {

            $blog = Blog::find($id);

            if (empty($blog)) {

                Session::flash('message', [ 'content' => "El blog con id '$id' no existe.", 'type' => 'error' ]);
                return redirect()->back();
            }

            $blog->delete();

            Session::flash('message', [ 'content' => "Blog eliminado con éxito", 'type' => 'success' ]);
            return redirect()->route('sections.index');

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', [ 'content' => "Ha ocurrido.", 'type' => 'error' ]);
            return redirect()->back();
        }
    }
}
