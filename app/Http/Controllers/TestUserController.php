<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestUser;
use App\Http\Requests\TestUserRequest;

class TestUserController extends Controller
{
    /**
     * ブログ一覧を表示する
     * @return view
     */
    public function showList() 
    {
        $users = TestUser::all();

        return view('test.test_view', ['users' =>$users]);    
    }

    /**
     * ブログ詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id) 
    {
        $user = TestUser::find($id);
        
        if (is_null($user)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('tests'));
        }

        return view('test.detail', ['user' =>$user]);    
    }

    /**
     * ブログ登録画面を表示する
     * 
     * @return view
     */

    public function showCreate() 
    {
        return view('test.form');
    }

    /**
     * ブログ登録
     * 
     * @return view
     */

    public function exeStore(TestUserRequest $request) 
    {
        //ブログのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //ブログ登録
            TestUser::create($inputs); 
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }


        \Session::flash('err_msg', 'ブログを登録しました。');
            return redirect(route('tests'));
    }

    /**
     * ブログ編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function showEdit($id) 
    {
        $user = TestUser::find($id);
        
        if (is_null($user)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('tests'));
        }

        return view('test.edit', ['user' =>$user]);    
    }



    /**
     * ブログ更新
     * 
     * @return view
     */

    public function exeUpdate(TestUserRequest $request) 
    {
        //ブログのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //ブログ登録
            $user = TestUser::find($inputs['id']); 
            $user->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
                ]);
            $user->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }


        \Session::flash('err_msg', 'ブログを更新しました。');
            return redirect(route('tests'));
    }

    /**
     * ブログ削除
     * @param int $id
     * @return view
     */
    public function exeDelete($id) 
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('tests'));
        }

        try {
            //ブログ削除
            TestUser::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }

        \Session::flash('err_msg', '削除しました');
        return redirect(route('tests'));   
    }

}