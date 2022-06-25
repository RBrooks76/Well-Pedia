<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\News;

class ServiceController extends Controller
{
    // The First Page
    public function toServiceIndex(){
        $page_title = "Well-Pedia";
        $all = News::orderby('created_at', 'DESC')->paginate(10);
        $notices = News::where('genre', 1)->orderby('created_at', 'DESC')->paginate(10);
        $publications = News::where('genre', 2)->orderby('created_at', 'DESC')->paginate(10);
        return view('well_pedia.service.pages.index', [
                'page_title'    => $page_title,
                'all'           => $all,
                'notices'       => $notices,
                'publications'  => $publications
        ]);
    }

    // The Page for Company
    public function toServiceCompany(){
        $page_title = '会社案内';
        return view('well_pedia.service.pages.company', [
                'page_title'    => $page_title,
        ]);
    }

    // The Page for News
    public function toServiceNews(){
        $page_title = 'お知らせ一覧';
        $all = News::orderby('created_at', 'DESC')->paginate(10);
        $notices = News::where('genre', 1)->orderby('created_at', 'DESC')->paginate(10);
        $publications = News::where('genre', 2)->orderby('created_at', 'DESC')->paginate(10);
        return view('well_pedia.service.pages.news', [
                'page_title'    => $page_title,
                'all'           => $all,
                'notices'       => $notices,
                'publications'  => $publications
        ]);
    }

    public function toServiceNewsDetail(Request $request){
        $page_title = "ニュース";
        $result = News::where('id', $request->id)->first();
        return view('well_pedia.service.pages.detail', [
                'page_title'    =>  $page_title,
                'news'          =>  $result
        ]);
    }

    // The Page for News Detail
    public function toServicewNewsEdit(Request $request){
        $page_title = "お知らせ_詳細ページ";
        $result = News::where('id', $request->id)->first();
        return view('well_pedia.service.pages.detail', [
                'page_title'    => $page_title,
                'news'          => $result
        ]);
    }

    // The Page for Contact
    public function toServiceContact(){
        $page_title = 'お問い合わせ';
        return view('well_pedia.service.pages.contact', [
                'page_title'    => $page_title,
        ]);
    }

    // THe Page for Private Policy
    public function toServicePolicy(){
        $page_title = '個人情報保護方針';
        return view('well_pedia.service.pages.policy', [
                'page_title'    => $page_title,
        ]);
    }


}
