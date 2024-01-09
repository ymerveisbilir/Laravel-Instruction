<?php

namespace App\Http\Controllers;
use App\Http\Requests\BookStoreRequest;
use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



class BookController extends Controller
{
    public function index(){
        //$books=Book::where('is_deleted',0)->get(); //1.yol --> Silinmeyen verileri getirme.
        $user= auth()->user(); //User modelinde book classı ile ilişki kurduğumuz için artık kitapları user'dan getirebiliriz.(Sadece oturumu açılmış kişinin kaydettiği kitaplar listelenir.)
        $books= $user->books()->notDeleteds()->get(); //2.yol --> Silinmeyen verileri getirme. Modele scope olarak tanımlanmalıdır.
        return view("admin/list" , compact('books'));
    }

    public function create(){
        $categories = Categories::get();
        return view("admin/create" , compact('categories'));
    }

    public function store(BookStoreRequest $request){
        $book = new Book();
        $book->name = $request->name; //formdan gelen değerlere eşliyoruz.
        $book->price = $request->price;
        $book->info = $request->info;
        //Resim Yükleme      
        if($request->hasFile('image')){ //resim geldi mi ?
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images'),$filename);
            $book->image = $image->getClientOriginalName();
        }
        //
        $book->category_id = $request->categories;
        $book->user_id = auth()->id();
        $book->save();

        return redirect()->back(); //işlem bittiğinde tekrar forma dönsün.
    }

    public function edit($id){
        //Bağlı olduğu kategoriyi getirmesi için relationship kullanıldı.

        //$book = Book::with('category')->notDeleteds()->findOrFail($id); //URL'den silinmeyen kayıtlara ulaşılıp üzerinde düzenleme yapılamamalı. --> Burada farklı adminler tarafından eklenen kayıtlara url'den ulaşılabilir !!!
        $user = auth()->user();
        $book = $user->books()->with('category')->notDeleteds()->findOrFail($id); //Başka kullanıcıdan eklenmiş kayıtlara url üzerinden ulaşıp edit yapılamasın diye kitaplar user üzerinden çekildii.
        $categories = Categories::get();
        return view("admin.edit" , compact('book' , 'categories'));
    }

    public function update(Request $request,$id){
        //$book = Book::notDeleteds()->findOrFail($id); //URL'den silinmeyen kayıtlara ulaşılıp üzerinde düzenleme yapılamamalı.

        $user = auth()->user();
        $book = $user->books()->notDeleteds()->findOrFail($id); //Formdan başka kullanıcıdan eklenmiş kayıta post atılamasın diye kitaplar user üzerinden çekildii.
        
        $book->name = $request->name; //formdan gelen değerlere eşliyoruz.
        $book->price = $request->price;
        $book->info = $request->info;
        $book->price = $request->price;
        //resim yükleme
        if($request->hasFile('image')){ //resim geldi mi ?
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('images'),$filename);
            $book->image = $image->getClientOriginalName();
        }else{
            if($book->image != ''){
                $book->image = $book->image; //Yeni bir resim yüklenmedi ise eski olanı tekrar kaydettir.
            }
        }
        $book->category_id = $request->categories;
        $book->save();

        return redirect()->back(); //işlem bittiğinde tekrar forma dönsün.

    }

    public function delete($id){
        // $book = Book::findOrFail($id)->delete(); -> hard delete

        //1.yol -> Yapabilmek için Book modelinde protected olarak 'is_deleted sütunu tanımlanmalıdır.'
        $book = Book::findOrFail($id)->update(['is_deleted' => 1]); 

        /*2.yol
        $book = Book::findOrFail($id); 
        $book->is_deleted = 1; //soft delete işlemi.
        $book->save();
        */
        return redirect()->back(); //işlem bittiğinde tekrar forma dönsün.

    }

    public function kategoriKitaplari($kategoriAdi){

     $kitaplar = DB::table('books')
    ->select('books.name' , 'books.image' , 'books.info')
    ->join('categories', 'categories.id', '=', 'books.category_id')
    ->where('categories.slug', $kategoriAdi)
    ->get();

     $kategori = Categories::where('slug' , $kategoriAdi)->get();
     $categories = Categories::activeCategories()->get();


    return view('site.kategoriListeleme', compact('kitaplar', 'kategoriAdi','categories','kategori'));
    }
}
