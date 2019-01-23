<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\News;
use App\Payment;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
   public function __construct()
   {
      // $this->middleware(['auth', 'role']);
   }


   //  public function index()
   //  {
   //    $i = 1;
   //    $ii = 1;
   //    $madc = \App\Madc::all();
   //    $wdc = \App\Wdc::all();
   //    $users = \App\User::all();
   //    // dd($users);
   //    return view('admin.dashboard', compact(['ii', 'i', 'users','madc', 'wdc']));
   // }


   public function index()
   {
      // $users = User::get(['role']);
      // $a = [];
      // foreach ($users as $user) {
      //    $a[] = $user['role'];
      // }
      // dd($a);
      // $user = User::find(2);

      return view('user.admin.dashboard');
   }

   public function madcTeams()
   {
      $madcs = \App\Madc::whereHas('user')->with('user')->paginate(5);
      // dd($madcs);
      return view('user.admin.madc_teams');
   }

   public function madcUsers(Request $request)
   {
      if ($request->ajax()) {
         $madcs = \App\Madc::whereHas('user')->with('user')->get();
         $data = [];
         foreach ($madcs as $madc) {

            $data[] = [
               'id' => $madc->user->id,
               'team_name' => $madc->user->team_name,
               'progress' => $madc->progress
            ];

         }
         return Datatables::of($data)
              ->editColumn('progress', function($data){
              if($data['progress'] == 0){
                   return '<span class="badge badge-danger">XXX</span>';
               }
               elseif($data['progress'] == 1){
                 return '<span class="badge badge-primary">Registered</span>';
              }
               elseif($data['progress'] == 2){
                  return '<span class="badge badge-info">Waiting for Confirm</span>';
               }
               elseif($data['progress'] == 3){
                  return '<span class="badge badge-info">Submitted</span>';
               }
               elseif($data['progress'] == 4){
                  return '<span class="badge badge-warning">confirmed</span>';
               }
               elseif($data['progress'] == 5){
                  return '<span class="badge badge-warning">Waiting for Selection</span>';
               }
               elseif($data['progress'] == 6){
                  return '<span class="badge badge-info">Waiting</span>';
               }
               elseif($data['progress'] == 7){
                  return '<span class="badge badge-success">Lulus Seleksi</span>';
               }
             })
             ->addColumn('action', function ($data){
                   return'
                      <a href="#" class="btn-success btn-sm"><i class="fa fa-check"></i></a>
                      <a href="./view-team.html" class="btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                      <a href="#" class="btn-danger btn-sm" data-toggle="modal" data-target="#deleteTeam"><i class="fa fa-trash" ></i></a>
                   ';
             })
             ->addIndexColumn()
             ->rawColumns(['action', 'progress'])
             ->make(true);
      }
      return redirect('/');

   }

   public function wdcUsers(Request $request)
   {
      if ($request->ajax()) {
         $wdcs = \App\Wdc::whereHas('user')->with('user')->get();
         $data = [];
         foreach ($wdcs as $wdc) {
               $data[] = [
                 'id' => $wdc->user->id,
                 'team_name' => $wdc->user->team_name,
                 'progress' => $wdc->progress
               ];
         }

              return Datatables::of($data)
              ->editColumn('progress', function($data){
              if($data['progress'] == 0){
                  return '<span class="badge badge-danger">XXX</span>';
              }
               elseif($data['progress'] == 1){
                 return '<span class="badge badge-primary">Registered</span>';
              }
               elseif($data['progress'] == 2){
                  return '<span class="badge badge-info">Waiting for Confirm</span>';
               }
               elseif($data['progress'] == 3){
                  return '<span class="badge badge-info">Submitted</span>';
               }
               elseif($data['progress'] == 4){
                  return '<span class="badge badge-warning">confirmed</span>';
               }
               elseif($data['progress'] == 5){
                  return '<span class="badge badge-warning">Waiting for Selection</span>';
               }
               elseif($data['progress'] == 6){
                  return '<span class="badge badge-info">Waiting</span>';
               }
               elseif($data['progress'] == 7){
                  return '<span class="badge badge-success">Lulus Seleksi</span>';
               }

             })
             ->addColumn('action', function ($data){
                   return'
                      <a href="#" class="btn-success btn-sm"><i class="fa fa-check"></i></a>
                      <a href="./view-team.html" class="btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                      <a href="#" class="btn-danger btn-sm" data-toggle="modal" data-target="#deleteTeam"><i class="fa fa-trash" ></i></a>
                   ';
             })
             ->addIndexColumn()
             ->rawColumns(['progress', 'action'])
             ->make(true);
      }

   }

   public function wdcTeams()
   {

      return view('user.admin.wdc_teams', compact(['users', 'i']));
   }

   public function galleries()
   {
      return view('user.admin.galleries');
   }

   public function news()
   {
      return view('user.admin.news');
   }

   /* Get Data From Database */
   public function newsData(Request $request)
    {

        if($request->ajax()){
            $model = News::query();
            return DataTables::of($model)
            ->addColumn('action', function ($model){

               if($model->is_published === 1){
                  $btn_status = '<a href="'.route('homePage').'" class="btn-warning btn-sm publish-btn">Unpublish</a> ';
               }else{
                  $btn_status = '<a href="#" class="btn-success btn-sm publish-btn">Publish</a> ';
               }
               return
               $btn_status.=
                   '<a href="#" class="btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                   <a href="" class="btn-danger btn-sm" data-toggle="modal" data-target="#deleteTeam"><i class="fa fa-trash" ></i></a>
               ';
          })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

        }
        return redirect('');

    }

   // Display form for adding news
   public function addNews()
   {
      return view('user.admin.add_news');
   }

   // Input news data into database
   public function storeNews(Request $request){

      // Checking request submit data
      $publish = $request->submit == 'Terbitkan' ? 1 : 0;

      // instance News Model to model variable
      $model = new News();

      // binding data from request
      $model->title = $request->title;
      $model->content = $request->content;
      $model->is_published = $publish;

      //save into database
      $model->save();
      return redirect()->route('admin.news');
   }

   public function editNews()
   {
      return view('user.admin.edit_news');
   }

   public function payments()
   {
      return view('user.admin.payment');
   }

   public function paymentsGetData()
   {
      $paymentsWdc = Payment::whereHas('user.wdc')->with('user.wdc')->get();
      $paymentsMadc = Payment::whereHas('user.madc')->with('user.madc')->get();
      $data = [];
      $i = 1;
      foreach ($paymentsWdc as $paymentW) {
            $data[] = [
                  'id' => $paymentW->user->id,
                  'i' => $i++,
                  'team_name' => $paymentW->user->team_name,
                  'kompetisi' => "WDC Competition",
                  'payment_path' => $paymentW['payment_path']
               ];
      }
      foreach ($paymentsMadc as $paymentM) {
         $data[] = [
               'id' => $paymentM->user->id,
               'i' => $i++,
               'team_name' => $paymentM->user->team_name,
               'kompetisi' => "MADC Competition",
               'payment_path' => $paymentM['payment_path']
            ];
      }

      return Datatables::of($data)
      ->addColumn('action', function ($data){
           return'
               <a href="#" class="btn-success btn-sm"><i class="fa fa-check"></i></a>
               <a href="./view-team.html" class="btn-primary btn-sm"><i class="fa fa-eye"></i></a>
               <a href="#" class="btn-danger btn-sm" data-toggle="modal" data-target="#deleteTeam"><i class="fa fa-trash" ></i></a>
           ';
      })
      ->make(true);
   }

   public function submissions()
   {
      // dd($data);
      return view('user.admin.submission');
   }

   public function submissionsGetData()
   {
      $submissionWdc = \App\Submission::whereHas('user.wdc')->with('user.wdc')->get();
      $submissionMadc = \App\Submission::whereHas('user.madc')->with('user.madc')->get();
      $data = [];
      $i = 1;
      foreach ($submissionWdc as $subW) {
            $data[] = [
              'id' => $subW->user->id,
              'i' => $i++,
              'team_name' => $subW->user->team_name,
              'kompetisi' => "WDC Competition",
              'progress' => $subW->user->wdc['progress'],
              'submissions_path' => $subW['submissions_path'],
           ];
        }
        foreach ($submissionMadc as $subM) {
           $data[] = [
             'id' => $subM->user->id,
             'i' => $i++,
             'team_name' => $subM->user->team_name,
             'kompetisi' => "MADC Competition",
             'progress' => $subM->user->madc['progress'],
             'submissions_path' => $subM['submissions_path'],
          ];
        }

      return Datatables::of($data)
      ->editColumn('submissions_path', function($data){
         return '<a href="'. $data['submissions_path'] .'" class="btn-success btn-sm">Link</a>';
      })
      ->addColumn('action', function($data){
         return'
             <a href="#" class="btn-success btn-sm"><i class="fa fa-check"></i></a>
             <a href="./view-team.html" class="btn-primary btn-sm"><i class="fa fa-eye"></i></a>
             <a href="#" class="btn-danger btn-sm" data-toggle="modal" data-target="#deleteTeam"><i class="fa fa-trash" ></i></a>
         ';
      })
      ->make(true);
   }


}
