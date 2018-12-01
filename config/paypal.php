<?php

return [

/** set your paypal credential **/
'client_id' =>'ASLXqVHTmsPOuqmvmChR46_eI1YWn4bv1OR7PGcNR1MASWNwAS-qnUDr4oKgPOjO2y0ckQFQbYS_NKfy',
'secret' => 'EADl6bLEXc3mVIFLJb_cxPSZD9RV90CATGIxAQifLDJSVJclnMMl3R_p4YSl9YIPnHNxagwn_7iq5GT1',
/**
 * SDK configuration
 */
'settings' => array(
    /**
     * Available option 'sandbox' or 'live'
     */
    'mode' => 'live',
    /**
     * Specify the max request time in seconds
     */
    'http.ConnectionTimeOut' => 2000,
    /**
     * Whether want to log to a file
     */
    'log.LogEnabled' => true,
    /**
     * Specify the file that want to write on
     */
    'log.FileName' => storage_path() . '/logs/paypal.log',
    /**
     * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
     *
     * Logging is most verbose in the 'FINE' level and decreases as you
     * proceed towards ERROR
     */
    'log.LogLevel' => 'FINE'
)
];