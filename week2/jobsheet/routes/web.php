<?php     //menandakan awal dari file PHP


//mengimpor Route untuk mendefinisikan rute, data ItemController agar bisa digunakan dalam routing
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;


Route::get('/hello', function () { 
return 'Hello World'; 
});

Route::get('/world', function () { 
    return 'World'; 
    }); 

    Route::get('/Selamat Datang', function () {
        return 'Selamat Datang';
     });

     Route::get('/about', function () {
        return 'Nim 2341760016 Nama Arimbi Putri Hapsari';
     });

    
     Route::get('/user/{name}', function ($name) {
        return 'Nama saya '.$name;
        });

        
        Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
            return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
        });

        
        Route::get('/articles/{articles}/comments/{comment}', function ($postId, $commentId) {
            return 'Halaman Artikel'.$postId." ID 5-: ".$commentId;
         });

        Route::get('/user/{name?}', function ($name=null) {
            return 'Nama Saya '.$name;
            });

        Route::get('/user/{name?}', function ($name='John') {
                return 'Nama Saya '.$name;
                });


        Route::get('/user/{name}', function ($name) { 
             return 'Nama saya '.$name; 
              });

              Route::get('/hello', [WelcomeController::class,'hello']);
              Route::get('/', [PageController::class, 'index']);
              Route::get('/about', [PageController::class, 'about']);
              Route::get('/articles/{id}', [PageController::class, 'articles']);


              Route::resource('photos', PhotoController::class);

              Route::resource('photos', PhotoController::class)->only([
                'index', 'show'
            ]);
            
            Route::resource('photos', PhotoController::class)->except([
                'create', 'store', 'update', 'destroy'
            ]);

            Route::get('/greeting', function () {
                return view('blog.hello', ['name' => 'Arimbi', 'occupation' => 'Astronaut']);
                
            });
            
            
            
            


    
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//komentar yang menjelaskan bahwa file digunakan untuk mendefinisikan rute web dalam aplikasi laravel

Route::get('/', function () {   //mendefinisikan rute untuk URL utama(/)
    return view('welcome');    //saat diakses akan menampilkan halaman welcome
});

Route::resource('items', ItemController::class);   //membuat rute otomatis untuk items dengan menggunakan ItemController
 
 
