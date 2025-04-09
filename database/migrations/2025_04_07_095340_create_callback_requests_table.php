
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallbackRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('callback_requests', function (Blueprint $table) {
            $table->id();
            $table->string('email_address')->unique();  // Store email address
            $table->timestamps();  // Store created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('callback_requests');
    }
}
