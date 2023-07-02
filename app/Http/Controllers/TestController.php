<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        // エロクアントで取得　
        $values = Test::all();
        // dd($values);
        $count = Test::count(); // 数字
        $first = Test::findOrFail(1); // インスタンス
        $whereBBB = Test::where('text', '=', 'bbb'); // Eloquent/Builder
        $whereBBB = Test::where('text', '=', 'bbb')->get(); // Collection
        // dd($values, $count, $first, $whereBBB);

        // クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'bbb')->select('*')->get(); // コレクション型
        dd($queryBuilder);
        return view('tests.test', compact('values'));
    }
}
