@extends('frontend.layouts.competition_page')

@section('title','Mobile Apps Development Competition')

@section('competition_name')
    <span>Web Design</span><br/>Competition
@endsection

@section('competition_description')
    Web Design Competition merupakan rangkaian acara pertama dari VOCOMFEST 2019, WDC merupakan kompetisi membuat design Website.

    WDC ditujukan untuk siswa SMA/SMK/MA sederajat yang sudah bisa maupun masih belajar dalam mengembangkan website. Peserta berkompetisi dalam tim yang beranggotakan maksimal 3 orang. WDC ini dilaksanakan dalam 2 babak, yaitu babak penyisihan design dan babak final.
@endsection

@section('rulebook_btn')
    <button class="btn btn-green">Download Rulebook</button>
@endsection
@section('competition_logo')
    <img class="logo" src="{{asset('assets/img/wdc.png')}}" alt="Mobile Apps Development Competition">
@endsection


