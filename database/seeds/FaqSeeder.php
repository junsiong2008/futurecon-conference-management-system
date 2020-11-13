<?php

use App\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'question' => 'How can I register for FutureCon 2020 ?',
                'answer' => 'Registration must be done at FutureCon 2020 website.'
            ],

            [
                'question' => 'When will the conference take place? Where is it located?',
                'answer' => 'The 2020 Future Conference will take place December 10, 2020 at the Kuala Lumpur Convention Center (KLCC).'
            ],
            [
                'question' => 'Will I receive a certificate of attendance?',
                'answer' => 'A certificate of attendance is available upon request by emailing futurecon2020@uniten.edu.my following the conference.'
            ],
            [
                'question' => 'What is the cancellation policy for the conference?',
                'answer' => 'Registration fees are refundable, less a RM 100 processing fee, up until September 14. No refund will be issued for cancellations starting September 15, 2020. Registrations are transferable (within the same membership category) until September 14 with a RM 75 administrative transfer fee. Starting September 14, transfers will not be accepted. All cancellations must be sent in writing via e-mail to the conference registrar. Please e-mail cancellations, if possible, and expect confirmation within two business days. FutureCon2020 is not responsible for problems beyond our control such as weather conditions, campus conditions, travel difficulties, visa problems, health issues, etc. No refunds will be given in these situations if occurring after September 14. Check payments must be received by October 6, 2020. If payment has not been received by this date, the registration will be cancelled.'
            ],

            [
                'question' => 'Am I eligible for the member rate?',
                'answer' => 'All 2019-2020 IEEE members are eligible for Annual Conference member rates.If you have a question about your membership status, please email futurecon2020@uniten.edu.my or call (03) 9543-3355.'
            ]
        ];

        foreach ($faqs as $key => $value) {
            Faq::create($value);
        }
    }
}
