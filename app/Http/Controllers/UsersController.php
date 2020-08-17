<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use PDF;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $number = 1;
      $users = User::paginate(5);
      return view('user.index', compact('users', 'number'));
    }

    /**
     * Export PDF.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF($id)
    {
      $user = USER::find($id);
      $view = \View::make('user.pdf',compact('user'));
      $html = $view->render();
      $pdf = new PDF();
      $pdf::SetTitle('Export User to PDF');
      $pdf::AddPage();
      $pdf::SetFont('freeserif');
      $pdf::WriteHTML($html,true,false,true,false);
      $pdf::output('report.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['fname' => 'required' , 'lname' => ' required'] );

        $user = new User(
          [
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname')
          ]
        );
        $user->save();
        return redirect()->route('user.index')->with('success', 'Save data success.');
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
        $user = User::find($id);
        return view('user.edit', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
          [
            'fname' => 'required' ,
            'lname' => ' required'
          ]
        );

        $user = User::find($id);
        $user->fname = $request->get('fname');
        $user->lname = $request->get('lname');
        $user->save();
        return redirect()->route('user.index')->with('success', 'Save data success.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Delete data success.');
    }
}
