<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ZmcmsWebsiteForums extends Migration{
	public function up(){
		$tblNamePrefix=(Config('database.prefix')??'');
		
		$tblName=$tblNamePrefix.'website_forums';
		Schema::create($tblName, function($table){$table->string('token', 70);});
		Schema::table($tblName, function($table){$table->string('access', 70)->default('*');}); // Info, które grupy użytkowników mają dostęp do danego forum
		Schema::table($tblName, function($table){$table->string('active', 1);}); //Aktywny - 1, Nieaktywny -0. Aktywny się wyświetla, nieaktywny nie.
		Schema::table($tblName, function($table){$table->string('obj_type', 70);});
		Schema::table($tblName, function($table){$table->string('obj_token', 70);});
		Schema::table($tblName, function($table){$table->primary(['token',], 'zmcmswfwnkey0');});
		Schema::table($tblName, function($table){$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));});//Imię
		Schema::table($tblName, function($table){$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));});//Imię


		$tblName=$tblNamePrefix.'website_forums_names'; // Nazwy forum
		Schema::create($tblName, function($table){$table->string('token', 70);});
		Schema::table($tblName, function($table){$table->string('langs_id', 5);}); // 
		Schema::table($tblName, function($table){$table->string('name', 150);}); // 
		Schema::table($tblName, function($table){$table->string('slug', 150)->unique();}); // 
		Schema::table($tblName, function($table){$table->text('intro');}); // 
		Schema::table($tblName, function($table){$table->primary(['token', 'langs_id'], 'zmcmswfwnkey1');});
		Schema::table($tblName, function($table){$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));});//Imię
		Schema::table($tblName, function($table){$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));});
		Schema::table($tblName, function($table) use ($tblNamePrefix){$table->foreign('token')->references('token')->on($tblNamePrefix.'website_forums')->onUpdate('cascade')->onDelete('cascade');});

		$tblName=$tblNamePrefix.'website_forums_comments';
		Schema::create($tblName, function($table){$table->string('token', 70);}); // Identyfikator rekordu 
		Schema::table($tblName, function($table){$table->string('token_reply', 70)->nullable();}); // Gdy odpowiadamy na jakiś komentarz, ustawiamy tutaj identyfikator jego rekordu
		Schema::table($tblName, function($table){$table->string('forum_token', 70);});
		Schema::table($tblName, function($table){$table->string('langs_id', 5);});
		Schema::table($tblName, function($table){$table->string('active', 1);});
		Schema::table($tblName, function($table){$table->string('activation_token', 70)->nullable();}); // Null, jeśli komentarz zweryfikowany, wtedy active = 1. Losowa wartość, gdy trzeba zweryfikować.
		Schema::table($tblName, function($table){$table->string('email', 50);});
		Schema::table($tblName, function($table){$table->string('show_email', 1);}); //Użytkownik może zdecydować, czy pokazać swój mail, czy nie
		Schema::table($tblName, function($table){$table->string('nick', 50);});
		Schema::table($tblName, function($table){$table->text('comment');});
		Schema::table($tblName, function($table){$table->primary(['token',], 'zmcmswfwnkey2');});
		Schema::table($tblName, function($table){$table->index('email', 50);});
		Schema::table($tblName, function($table){$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));});//Imię
		Schema::table($tblName, function($table){$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));});
		Schema::table($tblName, function($table) use ($tblNamePrefix){$table->foreign('forum_token')->references('token')->on($tblNamePrefix.'website_forums')->onUpdate('cascade')->onDelete('cascade');});


	}
	public function down(){
	}
}
