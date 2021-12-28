<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'user_id' => 2,
            'concept' => 'Pago de servicio',
            'amount' => '100',
            'date_made_payment' => '2020-01-01',
            'payment_registration_date' => '2020-01-01',
            'amount_in_letters' => 'Cien cordobas',
            'observation' => 'Pago de servicio',
            'payment_received' => 'Secretaria Juana',
            'account_is_payment' => 'Cuenta de servicios',
            'identification' => '123456789',
            'exchange_rate' => '35.50',
            'currency' => 'Cordobas',
            'receipt_number' => '123456789',
            'pay_time' => '2020-01-01',
            'cashier' => 'Juan',
            'cashier_identification' => '123456789'
        ]);

        Payment::create([
            'user_id' => 2,
            'concept' => 'Pago de servicio',
            'amount' => '2000',
            'date_made_payment' => '2020-03-02',
            'payment_registration_date' => '2020-03-02',
            'amount_in_letters' => 'Dos mil cordobas',
            'observation' => 'Pago de servicio',
            'payment_received' => 'Secretaria Juana',
            'account_is_payment' => 'Cuenta de servicios',
            'identification' => '123456789',
            'exchange_rate' => '35.50',
            'currency' => 'Cordobas',
            'receipt_number' => '123456789',
            'pay_time' => '2020-03-02',
            'cashier' => 'Pepe',
            'cashier_identification' => '987654321'
        ]);

        Payment::create([
            'user_id' => 3,
            'concept' => 'Pago de servicio',
            'amount' => '2000',
            'date_made_payment' => '2020-03-02',
            'payment_registration_date' => '2020-03-02',
            'amount_in_letters' => 'Dos mil cordobas',
            'observation' => 'Pago de servicio',
            'payment_received' => 'Secretaria Juana',
            'account_is_payment' => 'Cuenta de servicios',
            'identification' => '123456789',
            'exchange_rate' => '35.50',
            'currency' => 'Cordobas',
            'receipt_number' => '123456789',
            'pay_time' => '2020-03-02',
            'cashier' => 'Pepe',
            'cashier_identification' => '987654321'
        ]);

        Payment::create([
            'user_id' => 4,
            'concept' => 'Pago de servicio',
            'amount' => '2000',
            'date_made_payment' => '2020-03-02',
            'payment_registration_date' => '2020-03-02',
            'amount_in_letters' => 'Dos mil cordobas',
            'observation' => 'Pago de servicio',
            'payment_received' => 'Secretaria Juana',
            'account_is_payment' => 'Cuenta de servicios',
            'identification' => '123456789',
            'exchange_rate' => '35.50',
            'currency' => 'Cordobas',
            'receipt_number' => '123456789',
            'pay_time' => '2020-03-02',
            'cashier' => 'Pepe',
            'cashier_identification' => '987654321'
        ]);

        Payment::create([
            'user_id' => 4,
            'concept' => 'Pago de servicio',
            'amount' => '2000',
            'date_made_payment' => '2020-03-02',
            'payment_registration_date' => '2020-03-02',
            'amount_in_letters' => 'Dos mil cordobas',
            'observation' => 'Pago de servicio',
            'payment_received' => 'Secretaria Juana',
            'account_is_payment' => 'Cuenta de servicios',
            'identification' => '123456789',
            'exchange_rate' => '35.50',
            'currency' => 'Cordobas',
            'receipt_number' => '123456789',
            'pay_time' => '2020-03-02',
            'cashier' => 'Pepe',
            'cashier_identification' => '987654321'
        ]);

        Payment::create([
            'user_id' => 4,
            'concept' => 'Pago de servicio',
            'amount' => '2000',
            'date_made_payment' => '2020-03-02',
            'payment_registration_date' => '2020-03-02',
            'amount_in_letters' => 'Dos mil cordobas',
            'observation' => 'Pago de servicio',
            'payment_received' => 'Secretaria Juana',
            'account_is_payment' => 'Cuenta de servicios',
            'identification' => '123456789',
            'exchange_rate' => '35.50',
            'currency' => 'Cordobas',
            'receipt_number' => '123456789',
            'pay_time' => '2020-03-02',
            'cashier' => 'Pepe',
            'cashier_identification' => '987654321'
        ]);

        Payment::create([
            'user_id' => 7,
            'concept' => 'Pago de servicio',
            'amount' => '2000',
            'date_made_payment' => '2020-03-02',
            'payment_registration_date' => '2020-03-02',
            'amount_in_letters' => 'Dos mil cordobas',
            'observation' => 'Pago de servicio',
            'payment_received' => 'Secretaria Juana',
            'account_is_payment' => 'Cuenta de servicios',
            'identification' => '123456789',
            'exchange_rate' => '35.50',
            'currency' => 'Cordobas',
            'receipt_number' => '123456789',
            'pay_time' => '2020-03-02',
            'cashier' => 'Pepe',
            'cashier_identification' => '987654321'
        ]);
    }
}
