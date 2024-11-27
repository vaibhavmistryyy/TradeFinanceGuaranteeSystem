<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuaranteesTable extends Migration
{
    public function up()
    {
        Schema::create('guarantees', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->string('corporate_reference_number')->unique();  // Unique reference number
            $table->enum('guarantee_type', ['Bank', 'Bid Bond', 'Insurance', 'Surety']);  // Guarantee type
            $table->decimal('nominal_amount', 15, 2);  // Nominal amount
            $table->string('nominal_amount_currency');  // Currency of the nominal amount
            $table->date('expiry_date');  // Expiry date, must be a future date
            $table->string('applicant_name');  // Applicant's name
            $table->text('applicant_address');  // Applicant's address
            $table->string('beneficiary_name');  // Beneficiary's name
            $table->text('beneficiary_address');  // Beneficiary's address
            $table->timestamps();  // Laravel's created_at and updated_at fields
        });
    }

    public function down()
    {
        Schema::dropIfExists('guarantees');
    }
}
