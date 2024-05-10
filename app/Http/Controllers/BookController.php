<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    
    public function bookHome()
    {
        return view('book/bookindex');
    }

    public function bookInner(Request $request)
    {
        $id   = $request->id;
        $name = $request->name;
        $book = $request->bookname;
        $price = $request->price;
        //return $price;

        if(strpos($price,'$') !== false)
            return view('static/intbookpaymnt');

        if ($name == 'payment')
            return view ('book/bookpayment')->with(compact('book','price'));

        if ($id == 'tango')
            return view('includes/books/tangobookinner');

        if ($id == 'tc')
            return view('includes/books/tcbookinner');

        if ($id == 'fc')
            return view('includes/books/fcbookinner');

        if ($id == 'srs')
            return view('includes/books/srsbookinner');

        if ($id == 'syor')
            return view('includes/books/syorbookinner');

        if ($id == 'francast')
            return view('includes/books/francastbookinner');

        if ($id == 'rbc')
            return view('includes/books/rbcbookinner');

        if ($id == 'tfe')
           return view('includes/books/tfebookinner');	

        if ($id == 'iswyb')
           return view('includes/books/iswybbookinner'); 

        if ($id == 'salon2014')
            return view('includes/books/salon2014bookinner');

        if ($id == 'salon2013')
            return view('includes/books/salon2013bookinner');

        if ($id == 'education2013')
            return view('includes/books/education2013bookinner');

        if ($id == 'eretail2013')
            return view('includes/books/eretail2013bookinner');

        if ($id == 'franchise2012')
            return view('includes/books/franchise2012bookinner');

        if ($id == 'salon2012')
            return view('includes/books/salon2012bookinner');

        if ($id == 'restaurant2012')
            return view('includes/books/restaurant2012bookinner');

        if ($id == 'education2012')
            return view('includes/books/educaton2012bookinner');

        if ($id == 'realestate2011')
            return view('includes/books/realestate2011bookinner');

        if ($id == 'education2011')
            return view('includes/books/education2011bookinner');

        if ($id == 'food2011')
            return view('includes/books/food2011bookinner');

        if ($id == 'smallbusiness')
            return view('includes/books/smallbusinessbookinner');

        if ($id == 'fashionlifestyle')
            return view('includes/books/fashionlifestylebookinner');

        if ($id == 'education2009')
            return view('includes/books/educaton2009bookinner');

        if ($id == 'food2009')
            return view('includes/books/food2009bookinner');

        return redirect('book');

    }
}
