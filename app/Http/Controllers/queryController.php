<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Pest\Laravel\get;

class queryController extends Controller
{

    public function index(){

        //various queries

//            $books = DB::table('books')->get();

//            $authors = DB::table('authors')->get();

//            $authors = DB::table('authors')->limit(3)->offset(2)->get();

        //Where clauses

//            $books = DB::table('books')->where('id', 4)->get();

//            $books = DB::table('books')->where('id', "<=", 5)->get();

        //Where with multiple conditions

            /*$books = DB::table('books')->where([

                ['id', "<=", 5],
                ['price', "<=", 14]

            ])->get();*/

        //Where with chained conditions

            /*$books = DB::table('books')
                ->where('id', "<=", 5)
                ->where('price', "<=", 14)
                ->get();*/

        //Where with specific value

            /*$books = DB::table('books')
                ->where('price', 12)
                ->get();*/

            /*$books = DB::table('books')
                ->wherePrice(12)
                ->get();*/

        //WhereBetween values

            /*$books = DB::table('books')
                ->whereBetween('id', [3, 7])
                ->get();*/

        //WhereIn values

            /*$books = DB::table('books')
                ->whereIn('id', [3,7])
                ->get();*/

        //orWhere clause

            /*$books = DB::table('books')
                ->where('id', 3)
                ->orWhere('id', 7)
                ->get();*/

        //WhereNull values

            /*$books = DB::table('books')
                ->whereNull('created_at')
                ->get();*/

        //Maximum price

            /*$max = DB::table('books')->max('price');
            $books = DB::table('books')
                ->where('price', $max)
                ->get();*/

        //OrderBy clause

            /*$books = DB::table('books')
                ->orderBy('title')
                ->get();*/

            /*$books = DB::table('books')
                ->orderBy('price', 'desc')
                ->get();*/

        //maximum prices books

            /*$books = DB::table('books')
                ->orderBy('price', 'desc')
                ->limit(1)
                ->get();*/

            /*$books = DB::table('books')
                ->orderBy('price', 'desc')
                ->first();*/

        //Join with authors

            /*$books = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->select('authors.name as author_name', 'books.author_id', 'books.title','books.id as book_id')
                ->get();*/

        //Find books by author id

            /*$books = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->select('books.title as book_title', 'authors.name as author_name', 'books.author_id', 'books.id as book_id')
                ->where('author_id', "<=", 4)
                ->get();*/

        //Display sql

            /*$books = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->select('books.title as book_title', 'authors.name as author_name', 'books.author_id', 'books.id as book_id')
                ->where('author_id', 4)
                ->toSql();*/

        //Exclude author id

            /*$books = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->select('books.title as book_title', 'authors.name as author_name', 'books.author_id', 'books.id as book_id')
                ->whereNotIn('author_id', [2,4])
                ->get();*/

        //Find max price book and price between 12 and 14

            /*$max = DB::table('books')->max('price');
            $books = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->select('books.title as book_title', 'authors.name', 'books.author_id', 'books.price','books.id as book_id')
                ->wherePrice($max)//where('price', "=", $max)
                ->orWhereBetween('price', [12,14])
                ->get();*/

        //Right joins with authors

            $books = DB::table('books')
                ->rightJoin('authors', 'books.author_id', '=', 'authors.id')
                ->select('books.title', 'authors.name as author_name', 'books.author_id', 'books.id as book_id', 'books.price')
                ->orderBy('price', 'desc')
                ->get();


            return response()->json($books);

    }

    function store(Request $request){

        //Insert a new author

            /*$newAuthorId = DB::table('authors')->insertGetId([

                'name' => 'Jack London',
                'bio' => 'American author and short story writer'

            ]);

            DB::table('books')->insert([

                'title' => 'Alan Quantermain',
                'author_id' => $newAuthorId,
                'price' => 10

            ]);*/

        //Inner join between books and authors table

            /*$books = DB::table('books')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->select('books.title', 'authors.name as author_name', 'books.author_id', 'books.id as book_id', 'books.price')
                ->get();*/

        //Update book price

            /*DB::table('books')
                ->where('id', 10)
                ->update([

                    'price' => 20

                ]);*/

        //Delete books defined by price

            /*DB::table('books')
                ->wherePrice(20)
                ->delete();*/

            return response()->json($books);

    }

}
