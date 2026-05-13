<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

    /* حل المشروع الاول تمرير البينات من المتحكم الى الواجهة والعكس */
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
        '4' => 'Fourth Year'
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
