<?php

/**
 * This file is part of Laravel TestBench by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

return array(

    /*
    |--------------------------------------------------------------------------
    | Trusted Proxies
    |--------------------------------------------------------------------------
    |
    | Set an array of trusted proxies, so Laravel knows to grab the client's
    | IP address via the X-Forwarded-* headers. To trust all proxies, use the
    | value '*', or to trust only specific proxies (recommended), set an array
    | of those proxies' IP addresses.
    |
    | By default, we are trusting CloudFlare only.
    |
    */

    'proxies' => array(

        '204.93.240.0',
        '204.93.177.0',
        '199.27.128.0',
        '173.245.48.0',
        '103.21.244.0',
        '103.22.200.0',
        '103.31.4.0',
        '141.101.64.0',
        '108.162.192.0',
        '190.93.240.0',
        '188.114.96.0',
        '197.234.240.0',
        '198.41.128.0',
        '162.158.0.0',
        '2400:cb00::',
        '2606:4700::',
        '2803:f800::',
        '2405:b500::',
        '2405:8100::'

    )

);
