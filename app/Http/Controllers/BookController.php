<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::all();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $datas = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'desc' => 'required',
            'price' => 'required'
        ]);
        // dd($datas);
        $data = Book::create($datas);
        return response()->json([
            'status' => 'sucess',
            'data' => $data
        ]);
    }


    /**
     * Display the specified resource.
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($bookid)
    {
        $checkBook = Book::find($bookid);
        if($checkBook){
            return response()->json([
                'status' => 'success',
                'data' => $checkBook
            ]);
        }
        return response()->json([
            'status' => 'error',
            'data' => 'No Book Found with this id'
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$bookid)
    {
        $datas = $request->all();
        $checkBook = Book::find($bookid);
        // dd($checkBook);
        if($checkBook){
            $update = $checkBook->update($datas);
            return response()->json([
                'status' => 'success',
                'data' => $update
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookid)
    {
        $bookId = Book::where('id', $bookid);
        if($bookId){
            $bookId->delete();
            return response()->json([
            'status' => 'success',
            'message'=> 'deleted'
            ]);
        }
    }


    public function borrowBook(Request $request, $bookid)
    {

        $data = $request->all();
        // $data['status'] = 1;
        $checkBook = Book::find($bookid);
        if($checkBook){
// dd($checkBook);
            $bookstatus = $checkBook->status === 0 ? "Available" : "Borrowed";
            $bookBorrow = $checkBook->update($data);
            return response()->json([
                'bookstatus' => $bookstatus,
                'data' => $bookBorrow
            ]);

            }
    }
}
