<?php

/*
 * This file is part of the Laravel Paystack package.
 *
 * (c) Prosper Otemuyiwa <prosperotemuyiwa@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /**
     * Public Key From Paystack Dashboard
     *
     */
    'api_key' => getenv('WIREDBANKING_API_KEY_LIVE', "00oj6ifj4CbVy9TQolHsQxN8zGThpoj0"),

    /**
     * Paystack Payment URL
     *
     */
    'base_url' => getenv('WIREDBANKING_BASE_URL', 'https://safe.wbalite.com/')
];
