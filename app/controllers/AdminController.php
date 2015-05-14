<?php

class AdminController extends BaseController
{
	protected $layout = "admin.tpl.main";

	public function getRegister()
	{
	    return View::make('admin.create');
	}

	public function getLogin()
	{
		if (Auth::check()) :
			$this->layout->content = View::make('admin.dashboard');
		else :
			$this->layout->content = View::make('admin.login');
		endif;
	}

	public function getDashboard()
	{		
		if (Auth::check()) :
			 return View::make('admin.dashboard');
		else :
			return Redirect::to('admin/login')->with('error', 'You need to log in to view this page.');
		endif;
	}
	public function getView()
	{

		// With Specific Field $students = Students::all(array('firstname','lastname'));
		// With Condition $students = Students::where('id','=',29)->get();
		/* Manual Adding of Records
			$students = new Students;
			$students->firstname = 'Bernardo';
			$students->save();
		*/
		/* Manual Updating of Records
			$students = Students::find(29);
			$students->firstname = 'Yeng';
			$students->save();
		*/
		// Deleting of Records $students = Students::find(31)->delete();
		// Get softdeleted with condition $students = Students::withTrashed()->where('id','=',2)->get();
		// Restore Soft deletes $students = Students::onlyTrashed()->restore();
		// Completely delete $students = Students::where('id','<',29)->forceDelete();
		// Condition using Scope $students = Students::Id()->get();
		// Condition using Scope accepting User input (Parameter)$students = Students::IdPara(30)->get();
		// One to One $user = User::find(3)->phone;
		// One to Many with condition $user = User::find(2)->phone()->where('mobile_no','=','09097729640')->first();
		// With Relationship $user = User::has('phone')->get();

		$students = Students::all();


		 if (Auth::check()) :
				 return View::make('admin.view')->with('students',$students);
		else :
			return Redirect::to('admin/login')->with('error', 'You need to log in to view this page.');
		endif;


	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('admin/login')->with('error', 'Your have been logged out to the application.');
	}	

	public function postRegister() {

			$rules = array(
			'first_name'	=>'required',
			'last_name'		=>'required',
			'email'			=>'required|email|unique:users',
			'password'		=>'required|alpha_num|between:8,12'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) :
			$user = User::create(array(
				'firstname' => Input::get('first_name'),
				'lastname'  => Input::get('last_name'),
				'email' 	=> Input::get('email'),
				'password' 	=> Hash::make(Input::get('password'))
			));
			return Redirect::to('admin/login')->with('success', 'Thanks for registering! Please log-in now.');
		else :
			return Redirect::to('admin/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		endif;
	}

	public function postLogin()
	{
		
		$userdata = array(
		    'email'      => Input::get('email'),
		    'password'   => Input::get('password') 
		);		

		if (Auth::attempt($userdata)) :
			return Redirect::intended('admin/dashboard')->with('message', 'You are now logged in!');			
		endif;

		return Redirect::to('admin/login')->with('error', 'Your email/password combination is incorrect. Please try again.')->withInput();


		
	}
	public function postAdd()
	{

		$rules = array(
			'firstname'	=>'required|string|min:3',
			'last_name'	=>'required|string|min:3',
			'email'		=>'required|unique:students',
			'birthday'	=>'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) :
			$students = Students::create(array(
				'firstname' => Input::get('firstname'),
				'lastname'  => Input::get('lastname'),
				'email' 	=> Input::get('email'),
				'birthday' 	=> Input::get('birthday')
			));
			Session::flash('message','Successfully added student!');
			return Redirect::to('admin/dashboard');
		else :
			return Redirect::to('admin/dashboard')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		endif;

	}
	public function getStud($studentid)
	{
		
		$student = Students::find($studentid);
		return View::make('admin.show')
				->with('student',$student);
	}

	public function getEdit($studentid)
	{
		$student = Students::where('id',$studentid)->first();
		return View::make('admin.edit')
				->with('student',$student);
	}
	public function postUpdate($studentid)
	{

		$rules = array(
			'firstname'			=>'required|string|min:3',
			'lastname'			=>'required|string|min:3',
			'email'				=> 'required|email',
			'birthday'			=> 'required'
		);

		$validator = Validator::make(Input::all(),$rules);

		if ($validator->fails()){
				return Redirect::to('admin/edit/'.$studentid)->withErrors($validator)->withInput(Input::except('password'));

		}else{

			$student = Students::find($studentid);
			$student->firstname 		= Input::get('firstname');
			$student->lastname 			= Input::get('lastname');
			$student->email 			= Input::get('email');
			$student->birthday 			= Input::get('birthday');
			$student->save();
			Session::flash('message','Successfully updated student!');
			return Redirect::to('admin/view');
		}
		
	}

	public function getDelete($studentid)
	{	
		$student = Students::find($studentid);
		if ($student) {
			$student->delete();
			$message = 'Successfully deleted student!';
		}else{
			$message = 'Student not existing!';
		}

		return Redirect::to('admin/view')->with('message',$message);
	}

	public function orm()
	{
		

		/*
		foreach (Books::with('author')->get() as $book)
		{
    		echo $book->author->name;
    	}
  		*/
    	/*
 		 $book = Books::whereHas('author',function($q)
 		 	{
 		 		$q->where('id','=',10);
 		 	})->get();
		*/
		
		$author = Authors::find(10);

		$books = $author->books;
		foreach ($books as $book) {
			var_dump($author->name .'-'.$book->name);
		}
		die();
		 return View::make('admin.orm')
		 ->with('books',$books);
		


	}


}