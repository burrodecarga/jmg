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
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
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

        $course = Course::find($request->input('course_id'));
        $book = Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'category' => $request->input('category'),
            'isbn' => $request->input('isbn'),
            'editorial' => $request->input('editorial'),
            'cuantity' => $request->input('cuantity'),
            'pages' => $request->input('pages'),
            'status' => $request->input('status'),
            'course' => $course->name,
            'level' => $request->input('level'),
            'grado' => $course->grado,
            'extension' => $request->input('extension'),
            'url' => $request->input('url'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
