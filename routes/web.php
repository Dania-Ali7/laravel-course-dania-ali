<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

Route::get('/', function () {
    return view('welcome');
});

    /* حل المشروع الاول تمرير البيانات من المتحكم الى الواجهة والعكس */
Route::get(uri: '/about', action: function (){
    $name = 'Dania Ali';
    $phone ='0597298094';
    $email = 'daniaali472003@gmail.com';

    /*
       هذه الطريقة الاولى التي تعلمناها لتمرير البيانات الى الواجهة (طريقة المصفوفات))
    return view('about', [
        'name' => $name,
        'phone' => $phone,
        'email' => $email
    ]);
    */

    /*
       باستخدام الدالة compact الطريقة الثانية
    return view('about', compact('name', 'phone', 'email'));
    */

    //  الطريقة التالتة باستخدام الميثود  with، وهي فقط تأخد براميترين لذلك وضعت داخلها مصفوفة
    return view('about') ->with([
        'name' => $name,
        'phone' => $phone,
        'email' => $email
    ]);
});

/* الان طريقة ارسال البيانات والمصفوفات من الواجهة الى المتحكم */
Route::get('/register', function () {
    $title = "New Student Registration";
    $levels = [
        '1' => 'First Year',
        '2' => 'Second Year',
        '3' => 'Third Year',
        '4' => 'Fourth Year',
        '5' => 'Fifth Year'
    ];

    return view('register_student', compact('title', 'levels'));
});

Route::post('/register', function () {
    $studentName = $_POST['student_name'];
    $title = "Registration Received for: " . $studentName;
    $levels = [
        '1' => 'First Year',
        '2' => 'Second Year',
        '3' => 'Third Year',
        '4' => 'Fourth Year',
        '5' => 'Fifth'
    ];

    return view('register_student', compact('title', 'levels'));
});


//  2.  حل المشروع التاني التعامل مع قواعد البيانات في لارافل
Route::get('courses', function () {
    return view('courses');
});

Route::post('/store', function () {
    $courseName = $_POST['name'];

    DB::table('courses')->insert(values: ['name' => $courseName]);

    return view ('courses');
});


// 3. حل المشروع الثالث التعامل مع قواعد البيانات في لارافل(الجزء الثالث+ الرابع + الخامس)
Route::get('courses', function () {
    $courses =  DB::table('courses')->get();

    return view(view: 'courses', data: compact(var_name: 'courses'));
});

Route::post(uri: 'store', action: function (){
    $course_name = $_POST['name'];
    DB::table(table: 'courses')->insert(values: ['name' => $course_name]);

    return redirect()->back();
});


Route::post(uri: 'courses/delete/{id}', action: function ($id) {
    DB::table(table: 'courses')->where(column: 'id', operator: '=', value: $id)->delete();

    return redirect()->back();
});


Route::post('courses/edit/{id}', function ($id) {
    $course = DB::table(table: 'courses')->where(column: 'id', operator: '=', value: $id)->first();
    $courses = DB::table(table: 'courses')->get();

    return view(view: 'courses', data: compact('course', 'courses'));
});

Route::post(uri: 'courses/update', action: function () {
    $id = $_POST['id'];
    $update_course_name = $_POST['name'];

    DB::table(table: 'courses')->where(column: 'id', operator: '=', value: $id)->update(['name' => $update_course_name]);

    return redirect(to: 'courses');
});
