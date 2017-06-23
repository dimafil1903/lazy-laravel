<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;

class crootontroller extends Controller {

    public function update(Request $request, Categories $cat) {
        $userid = Auth::id();
        $validator = Validator::make($request->all(), [
                    'newname' => 'required|max:255',
                    'newdescription' => 'required|max:500',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/cat#poup-cat-' . $_POST['id'])
                            ->withInput()
                            ->withErrors($validator);
        }
        $cat->id = filter_input(INPUT_POST, 'id');
        $cat->name = filter_input(INPUT_POST, 'newname');
        $cat->description = filter_input(INPUT_POST, 'newdescription');
        $checkAuthor = DB::table('categories')
                ->select('author_id')
                ->where('id', $cat->id)
                ->first();
        $checkStatus = DB::table('users')
                ->select('roles')
                ->where('id', $userid)
                ->first();
        if ($checkAuthor->author_id == $userid || $checkStatus->roles == 1) {
            DB::table('categories')
                    ->where('id', $cat->id)
                    ->update(array('name' => $cat->name, 'description' => $cat->description,));
            $cat->save();
        }
        return redirect('/admin/cat')->with('categoryUpdateSuccess', 'Категория успешно отредактирована!');
    }

}
