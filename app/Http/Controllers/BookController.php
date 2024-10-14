<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Models\Level;
use App\Models\Course;
use App\Models\Category;
use App\Models\Book;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('can:books.create', only: ['create']),
            new Middleware('can:books.store', only: ['books.store']),
            new Middleware('can:books.show', only: ['show']),
            new Middleware('can:books.update', only: ['update']),
            new Middleware('can:books.edit', only: ['edit']),
            new Middleware('can:books.destroy', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sede = auth()->user()->coordina()->first();
        if (is_null($sede)) {
            $message = __('No sede');
            flash()->options([
                'timeout' => 500,
            ])->error($message);
            return redirect()->route('books.index');
        }
        $books = Book::where('sede_id', $sede->id)->get();
        return view('books.index', compact('books', 'sede'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        $book->quantity = 1;
        $book->pages = 1;
        $courses = Course::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $levels = Level::orderBy('name')->get();
        $title = __('create a new book');
        $btn = __('create');
        return view('books.create', compact('title', 'btn', 'courses', 'book', 'categories', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {

        //dd($request->all());
        $course = Course::find($request->input('course_id'));
        $sede = auth()->user()->coordina()->first();

        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'category' => $request->input('category'),
            'isbn' => $request->input('isbn'),
            'editorial' => $request->input('editorial'),
            'quantity' => $request->input('quantity'),
            'pages' => $request->input('pages'),
            'status' => 1,
            'course' => $course->name,
            'level' => $request->input('level'),
            'grado' => $course->grado,
            'grado_id' => $course->grado_id,
            'sede_id' => $sede->id,
        ]);
        $message = __('book added successfully');
        flash()->options([
            'timeout' => 500,
        ])->success($message);
        return redirect()->route('books.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $courses = Course::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $levels = Level::orderBy('name')->get();
        $title = __('modify book');
        $btn = __('modify');
        return view('books.edit', compact('title', 'btn', 'courses', 'book', 'categories', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $course = Course::find($request->input('course_id'));

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->category = $request->input('category');
        $book->isbn = $request->input('isbn');
        $book->editorial = $request->input('editorial');
        $book->quantity = $request->input('quantity');
        $book->pages = $request->input('pages');
        $book->status = 1;
        $book->course = $course->name;
        $book->level = $request->input('level');
        $book->grado = $course->grado;
        $book->grado_id = $course->grado_id;
        $book->save();
        $message = __('book added successfully');
        flash()->options([
            'timeout' => 500,
        ])->success($message);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        $message = __('book added successfully');
        flash()->options([
            'timeout' => 500,
        ])->success($message);
        return redirect()->route('books.index');
    }
}
