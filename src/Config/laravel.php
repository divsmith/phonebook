<?php

return [

    'tenant' => [
        /**
         * The Eloquent model associated with individual tenants.
         */
        'model' => 'App\Tenant',

        'database' => [

            /**
             * Database column associated with the url identifier.
             */
            'column' => 'slug'
        ]
    ]
];