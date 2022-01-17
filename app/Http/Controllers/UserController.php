<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserPassrequest;
use App\Http\Requests\UserNoPassRequest;
use App\Http\Requests\UserImgRequest;
use App\Models\Users;

class UserController extends Controller
{
    public function submit(UserRequest $req){
        $user = new Users();
        $user ->name = $req->input('name');
        $user ->phone = $req->input('phone');
        $user ->email = $req->input('email');
        $user ->password = bcrypt($req->input('password'));
        $user ->role = $req->input('role');
        $user->save();
        return redirect()->route('user')->with('success','Пользователь был добавлен');
    }
    public function allData(){
        $user = new Users;
        return view('manager.user',['data' => $user->orderBy('id','desc')->where('role','<>','Null')->take(10)->get()]);
    }
    public function allDataClient(){
        $user = new Users;
        return view('manager.user-client',['data' => $user->orderBy('id','desc')->where('role','===','Null')->take(10)->get()]);
    }
    public function updateUser($id){
        $user = new Users;
        return view('manager.user-update',['data' => $user->find($id)]);
    }
    public function updateUserPassSubmit($id, UserPassrequest $req)
    {
        $user = Users::find($id);
        $user ->password = bcrypt($req->input('password'));
        $user->save();
        return redirect()->route('user', $id)->with('success','Данные пользователя были обновленны');
    }
    public function updateUserImgSubmit($id, UserImgRequest $req)
    {
        // Проверка, хотя можно обойтись и без нее
//        $this->validate($req, [
//            'image' => 'image|nullable|max:1999',
//        ]);
        // Если есть файл
        if( $req->hasFile('image')){
            // Имя и расширение файла
            $filenameWithExt = $req->file('image')->getClientOriginalName();
            // Только оригинальное имя файла
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Расширение
            $extention = $req->file('image')->getClientOriginalExtension();
            $fileNameToNew = "profile_".time().".".$extention;
            // Путь для сохранения
            $fileNameToStore = "image_profile/".$fileNameToNew;

            // Сохраняем файл
            $path = $req->file('image')->storeAs('public/', $fileNameToStore);
        }
        $user = Users::find($id);
        $user ->img = $fileNameToNew;
        $user->save();
        return redirect()->route('user', $id)->with('success','Данные пользователя были обновленны');
    }

    public function updateUserSubmit($id, UserNoPassRequest $req){
        $user = Users::find($id);
        $user ->name = $req->input('name');
        $user ->phone = $req->input('phone');
        $user ->email = $req->input('email');
        $user ->city = $req->input('city');
        $user ->role = $req->input('role');
        $user->save();
        return redirect()->route('user', $id)->with('success','Данные пользователя были обновленны');
    }
    public function deliteUser($id){
        $userName = Users::find($id);
        $userName->name;
        $userName->delete();
        return redirect()->route('user')->with('success','Пользователь '.$userName->name.' был удален');
    }
}
